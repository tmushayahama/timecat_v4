<?php

/* * Study Controller extends the Controller Class
 * 
 * 
 */

class StudyController extends Controller {

	public static $STUDY_CREATOR_ID = 5;

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = 'home_layouts/study_layouts/study_nav';


//public $avatar = "";


	/**
	 * @return array action filters
	 */
	public function filters() {
		return array(
				'accessControl', // perform access control for CRUD operations
				'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() {
		return array(
				array('allow', // allow all users to perform 'index' and 'view' actions
						'actions' => array('index'),
						'users' => array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions' => array('create', 'dashboard', 'observers', 'update', 'join', 'site'),
						'users' => array('@'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions' => array('admin', 'delete'),
						'users' => array('admin'),
				),
				array('deny', // deny all users
						'users' => array('*'),
				),
		);
	}

	/**
	 *  This is the main of the study
	 * @param integer $studyId specifies the currently selected studyId
	 */

	public function actionDashboard($studyId) {
		$this->populateStudyNav($studyId);
		$this->study_name = Study::model()->findByPk($studyId)->name;

		$sitesCriteria = new CDbCriteria();
		$sitesCriteria->alias = 't1';
		$sitesCriteria->condition = "t1.study_id=" . $studyId;

		$observationsCriteria = new CDbCriteria();
		$observationsCriteria->alias = 't1';
		$observationsCriteria->condition = "t1.study_id=" . $studyId;
		$observationsCriteria->with = array(
				"subject" => array('select' => 'description'),
				"site" => array('select' => array('name', 'timezone')),
				"type" => array('select' => 'type_entry'));

		$observationsModel = new Observations;
		if (isset($_POST['Observations'])) {
			$subjectModel = new Subjects;
			$observationsModel->attributes = $_POST['Observations'];
			$subjectModel->study_id = $studyId;
			$subjectModel->description = $observationsModel->subjectDescription;
			$subjectModel->save();
			$startTime = new DateTime('now', new DateTimeZone($observationsModel->site->timezone));
			$observationsModel->start_time = $startTime->getTimestamp();
			$observationsModel->study_id = $studyId;
			$observationsModel->user_id = Yii::app()->user->id;
			$observationsModel->subject_id = $subjectModel->id;
			if ($observationsModel->save()) {
				$this->redirect(array('observations/capture', 'studyId' => $studyId, 'observationId'=>$observationsModel->id));
			}
		}

		$this->render('dashboard', array(
				'study_model' => $this->loadModel($studyId),
				'observations_model' => $observationsModel,
				'study_observations' => Observations::Model()->findAll($observationsCriteria),
				'observation_sites' => Sites::Model()->findAll($sitesCriteria),
				'observation_types' => Types::getAllTypes("observation type"),
				'resume_observation' => Observations::Model()->find("duration=0 AND study_id=".$studyId),
		));
	}

	public function actionJoin($studyId) {
		$userStudiesCriteria = new CDbCriteria();
		$userId = Yii::app()->user->id;
		$userStudiesCriteria->condition = "user_id=$userId AND study_id=$studyId";
		$userStudies = UserStudies::Model()->find($userStudiesCriteria);
		$userStudies->status = 0;
		$userStudies->save(false);
		$this->actionDashboard($studyId);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$studyModel = new Study;
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

		if (isset($_POST['Study'])) {
			$studyModel->attributes = $_POST['Study'];
			$studyModel->created = date('Y-m-d');
			if ($studyModel->save()) {
				$userStudiesModel = new UserStudies;
				$sites = new Sites;
				$sites->createSitesTimezone($_POST['sitelist'], $_POST['timezonelist'], $studyModel->id);
				$userStudiesModel->user_id = Yii::app()->user->id;
				$userStudiesModel->study_id = $studyModel->id;
				$userStudiesModel->role_id = self::$STUDY_CREATOR_ID;

				if ($userStudiesModel->save(false)) {
					$this->initializeStudyDimensions($studyModel->id);
					$this->redirect(array('dashboard', 'studyId' => $studyModel->id));
				}
			}
		}
		$studyTypesCriteria = new CDbCriteria();
		$studyTypesCriteria->condition = "category='study types'";

		$this->render('create', array(
				'model' => $studyModel,
				'study_types' => Types::Model()->findAll($studyTypesCriteria),
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Study');
		$this->render('index', array(
				'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new Study('search');
		$model->unsetAttributes(); // clear any default values
		if (isset($_GET['Study']))
			$model->attributes = $_GET['Study'];

		$this->render('admin', array(
				'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Study the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = Study::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Study $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'study-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function initializeStudyDimensions($studyId) {
		$taskDimensionArray;
		switch (Study::Model()->findByPk($studyId)->type_id) {
			case Study::$LINEAR_TYPE_ID:
				$taskDimensionArray = StudyDimensions::LINEAR_DIMENSION();
				break;
			case Study::$MULTITASK_TYPE_ID:
				$taskDimensionArray = StudyDimensions::MULTITASK_DIMENSION();
				break;
			case Study::$MULTIACTOR_TYPE_ID:
				$taskDimensionArray = StudyDimensions::MULTIACTOR_DIMENSION();
				break;
		}
		foreach ($taskDimensionArray as $dimension) {
			$studyDimensions = new StudyDimensions;
			$studyDimensions->study_id = $studyId;
			$studyDimensions->dimension = $dimension;
			$studyDimensions->save();
		}
	}
}

