<?php

class StudyController extends Controller {

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

	/*	 * This is the main of the study
	 * 
	 */

	public function actionDashboard($studyId) {
		$this->populateStudyNav($studyId);
		//$model = new Study;
		$this->study_name = $this->loadModel($studyId)->name;
		$this->render('dashboard', array(
				'model' => $this->loadModel($studyId),
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
		$model = new Study;
		$user_studies = new UserStudies;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Study'])) {
			$model->attributes = $_POST['Study'];
			$model->created = date('Y-m-d');
			if ($model->save()) {
				$sites = new Sites;
				$sites->createSitesTimezone($_POST['sitelist'], $_POST['timezonelist'], $model->id);
				$user_studies->user_id = Yii::app()->user->id;
				$user_studies->study_id = $model->id;
				$user_studies->role_id = 5; //temp value for the creator
				if ($user_studies->save(false)) {
					$this->redirect(array('dashboard', 'studyId' => $model->id));
				}
			}
		}
		$studyTypesCriteria = new CDbCriteria();
		$studyTypesCriteria->condition = "category='study types'";

		$this->render('create', array(
				'model' => $model,
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

}
