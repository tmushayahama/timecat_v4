<?php

/**
 * A controller to capture all the activities of data capture. 
 * 
 * An observation can be a new one or a resumed one. Most of the events are ajax 
 * requests. Current time depends on the site of the observation.
 */
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
	 * 
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() {
		return array(
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

	/** The default action when rendering the Capture view.
	 * 
	 * This rendering can be an observation which is newly made or a resumed one.
	 * @param type $studyId The study associated with observation
	 * @param type $observationId The current observation id which is being recorded
	 */
	public function actionCapture($studyId, $observationId) {
		$this->render('capture', array(
				'dimensions' => StudyDimensions::getDimensionsNameIdMap($studyId),
				'study_tasks' => StudyTasks::Model()->findAll("study_id=" . $studyId),
				'site_timezone' => Observations::Model()->findByPk($observationId)->site->timezone,
				'categorized_tasks' => ObservationTasks::getCategorizedTasks($studyId),
				'categorized_observation_tasks' => ObservationTasks::getCategorizedObservationTasks($studyId, $observationId),
				'study_id' => $studyId,
				'observation_id' => $observationId,
				'current_time' => Observations::getCurrentTime($observationId),
				'current_tasks' => ObservationTasks::getCurrentTasks($studyId, $observationId),
				'observation_duration' => $this->calculateDuration($observationId),
		));
	}

	/**
	 * Ajax call for recording a task.
	 * 
	 * When a task button is clicked, an ajax call is triggered which records
	 * the current time of the observation site.
	 * 
	 */
	public function actionRecordTask() {
		if (Yii::app()->request->isAjaxRequest) {
			$currentTaskId = Yii::app()->request->getParam('current_task_id');
			$observationId = Yii::app()->request->getParam('observation_id');
			$previousObservationTaskId = Yii::app()->request->getParam('previous_observation_task_id');
			$previousObservationTask = ObservationTasks::Model()->findByPk($previousObservationTaskId);
			$taskStartTime = Observations::getCurrentTime($observationId); //new DateTime('now', new DateTimeZone(Observations::Model()->findByPk($observationId)->site->timezone));

			$observationModel = new ObservationTasks;
			$observationModel->observation_id = $observationId;
			$observationModel->study_task_id = $currentTaskId;
			$observationModel->start_time = $taskStartTime->getTimestamp();
			$observationModel->status = 1;
			if ($observationModel->save()) {
				if ($previousObservationTask != null) {
					$previousObservationTask->status = 0;
					$previousObservationTask->save();
				}
				$unix_time = $taskStartTime->getTimestamp();
				$task_start_time = new DateTime('@' . $unix_time);
				$task_start_time->setTimeZone(new DateTimeZone(Observations::Model()->findByPk($observationId)->site->timezone));
				$taskStartTime->setTimeZone(new DateTimeZone(Observations::Model()->findByPk($observationId)->site->timezone));

				echo CJSON::encode(array(
						'current_observation_task_id' => $observationModel->id,
						'taskname' => $observationModel->studyTask->name,
						'dimension_id' => $observationModel->studyTask->dimension_id,
						'start_time' => $taskStartTime->format("H:i:s"),
						'unix_time' => strtotime($taskStartTime->format("Y-m-d H:i:s")),
						'after_unix_time' => $task_start_time->format("H:i:s"),
						'recorded_task_row' => $this->renderPartial('_recorded_task_row', array(
								'task' => $previousObservationTask,
								'site_timezone' => Observations::Model()->findByPk($observationId)->site->timezone
										)
										, true)));
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

	

	

	

	public function findDimensionId($studyId, $dimensionName) {
		$dimension = StudyDimensions::Model()->find("study_id=" . $studyId . " AND dimension = '" . $dimensionName . "'");
		if ($dimension == null)
			return null;
		return $dimension->id;
	}

	/*	 * Calculates the duration given the start time. The current time is the 
	 * "now" +- the offset of the study particular site timezone.
	 * 
	 * @param type $startTime - the start time of the 
	 */

	public function calculateDuration($observationId) {
		$currentTime = Observations::getCurrentTime($observationId);
		$observationStartTime = new DateTime("@" . Observations::Model()->findByPk($observationId)->start_time);
		$observationStartTime->setTimeZone(new DateTimeZone(Observations::Model()->findByPk($observationId)->site->timezone));
		return $currentTime->diff($observationStartTime);
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

