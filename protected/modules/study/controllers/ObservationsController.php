<?php

class ObservationsController extends Controller {

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
						'actions' => array('create', 'update', 'capture', 'recordtask'),
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

	public function actionCapture($studyId, $observationId) {
		$studyDimensionCriteria = new CDbCriteria();
		$studyDimensionCriteria->condition = "study_id=" . $studyId;

		$this->render('capture', array(
				'study_tasks' => StudyTasks::Model()->findAll("study_id=" . $studyId),
				'categorized_tasks' => $this->categorizeTasks(StudyDimensions::Model()->findAll($studyDimensionCriteria)),
				'categorized_observation_tasks' => $this->categorizeObservationTasks(StudyDimensions::Model()->findAll($studyDimensionCriteria), $observationId),
				'study_id' => $studyId,
				'observation_id' => $observationId,
				'site_timezone' => Observations::Model()->findByPk($observationId)->site->timezone,
				'current_tasks' => $this->getCurrentTasks(StudyDimensions::Model()->findAll($studyDimensionCriteria), $observationId),
		));
	}

	public function actionRecordTask() {
		if (Yii::app()->request->isAjaxRequest) {
			$taskId = Yii::app()->request->getParam('task_id');
			$observationId = Yii::app()->request->getParam('observation_id');
			$taskStartTime = new DateTime('now', new DateTimeZone(Observations::Model()->findByPk($observationId)->site->timezone));

			$observationModel = new ObservationTasks;
			$observationModel->observation_id = $observationId;
			$observationModel->study_task_id = $taskId;
			$observationModel->start_time = strtotime($taskStartTime->format("Y-m-d h:i:s"));
			if ($observationModel->save()) {
				
			}
			Yii::app()->end();
		}
	}

	public function actionDashboard($studyId) {
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
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);


		if (isset($_POST['Observations'])) {
			$subjectModel = new Subjects;
			$observationsModel->attributes = $_POST['Observations'];
			$subjectModel->study_id = $studyId;
			$subjectModel->description = $observationsModel->subjectDescription;
			$subjectModel->save();
			$observationsModel->study_id = $studyId;
			$observationsModel->user_id = Yii::app()->user->id;
			$observationsModel->subject_id = $subjectModel->id; //Subjects::model()->find("description='".$subjectModel->description."'");
			if ($observationsModel->save()) {
				//$this->redirect(array('view', 'id' => $model->id));
			}
		}
		$this->render('observations_dashboard', array(
				'observations_model' => $observationsModel,
				'study_observations' => Observations::Model()->findAll($observationsCriteria),
				'observations_sites' => Sites::Model()->findAll($sitesCriteria),
		));
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id) {
		$this->render('view', array(
				'model' => $this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model = new Observations;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Observations'])) {
			$model->attributes = $_POST['Observations'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->id));
		}

		$this->render('create', array(
				'model' => $model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id) {
		$model = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Observations'])) {
			$model->attributes = $_POST['Observations'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->id));
		}

		$this->render('update', array(
				'model' => $model,
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
		$dataProvider = new CActiveDataProvider('Observations');
		$this->render('index', array(
				'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new Observations('search');
		$model->unsetAttributes(); // clear any default values
		if (isset($_GET['Observations']))
			$model->attributes = $_GET['Observations'];

		$this->render('admin', array(
				'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Observations the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = Observations::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	protected function getCurrentTasks($studyDimensions, $observationId) {
		$categorizeTask = array();
		foreach ($studyDimensions as $studyDimension) {
			$observationTasksCriteria = new CDbCriteria();
			$observationTasksCriteria->alias = 't1';
			$observationTasksCriteria->condition = "t1.observation_id=" . $observationId . ' AND t1.status =' . 1;
			$observationTasksCriteria->with = array('studyTask');
			$observationTasksCriteria->addCondition("studyTask.dimension_id=" . $studyDimension->id);
			$categorizeTask += array($studyDimension->dimension => ObservationTasks::Model()->find($observationTasksCriteria));
		}
		return $categorizeTask;
	}

	protected function categorizeObservationTasks($studyDimensions, $observationId) {
		$categorizeTask = array();
		foreach ($studyDimensions as $studyDimension) {
			$observationTasksCriteria = new CDbCriteria();
			$observationTasksCriteria->alias = 't1';
			//$observationTasksCriteria->join = 'RIGHT JOIN tc_study_tasks ON dimension_id=' . $studyDimension->id;
			$observationTasksCriteria->condition = "t1.observation_id=" . $observationId;
			$observationTasksCriteria->with = array('studyTask');
			$observationTasksCriteria->addCondition("studyTask.dimension_id=" . $studyDimension->id);
			
			$categorizeTask += array($studyDimension->dimension => ObservationTasks::Model()->findAll($observationTasksCriteria));
		}
		return $categorizeTask;
	}

	protected function categorizeTasks($studyDimensions) {
		$categorizeTask = array();
		foreach ($studyDimensions as $studyDimension) {
			$categorizeTask += array($studyDimension->dimension => StudyTasks::Model()->findAll('dimension_id=' . $studyDimension->id));
		}
		return $categorizeTask;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Observations $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'observations-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}

