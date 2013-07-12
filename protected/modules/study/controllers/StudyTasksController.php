<?php

class StudyTasksController extends Controller {
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

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
						'actions' => array('index', 'view'),
						'users' => array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions' => array('create', 'update', 'dashboard'),
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
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionDashboard($studyId) {
		$this->populateStudyNav($studyId);

		$tasksCriteria = new CDbCriteria();
		$tasksCriteria->alias = 't1';
		$tasksCriteria->condition = "t1.study_id=" . $studyId;
		$tasksCriteria->with = array(
				'category' => array('select' => array('type_entry')));

		$taskTypesCriteria = new CDbCriteria();
		$taskTypesCriteria->condition = "study_id=" . $studyId;

		$defaultTaskTypesCriteria = new CDbCriteria();
		$defaultTaskTypesCriteria->condition = "category='study_types'";

		$studyTasksModel = new StudyTasks;

		if (isset($_POST['StudyTasks'])) {
			$studyTasksModel->attributes = $_POST['StudyTasks'];
			$studyTasksModel->study_id = $studyId;
			$studyTasksModel->status = 0;
			//$studyTasksModel->category_id = 4;
			$studyTasksModel->save();
		}
		$taskTypes = StudyTasks::Model()->findAll($taskTypesCriteria);
		$this->render('tasks_dashboard', array(
				'tasks_model' => $studyTasksModel,
				'study_tasks' => StudyTasks::model()->findAll($tasksCriteria),
				'task_types' => $this->taskDropDownList($studyId),
				'categorized_tasks' => $this->findTabs($studyId),
				'studyId' => $studyId,
				'study_type_id' => Study::Model()->findByPk($studyId)->type_id,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new StudyTasks('search');
		$model->unsetAttributes(); // clear any default values
		if (isset($_GET['StudyTasks']))
			$model->attributes = $_GET['StudyTasks'];

		$this->render('admin', array(
				'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return StudyTasks the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = StudyTasks::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	protected function findTabs($studyId) {
		switch (Study::Model()->findByPk($studyId)->type_id) {
			case Study::$LINEAR_TYPE_ID:
				return array(Types::Model()->findByPk(StudyTasks::$LINEAR_TASK_TYPE_ID)->type_entry => StudyTasks::Model()->findAll('category_id=' . StudyTasks::$LINEAR_TASK_TYPE_ID . ' AND study_id=' . $studyId));
			case Study::$MULTITASK_TYPE_ID:
				return array(Types::Model()->findByPk(StudyTasks::$COMMUNICATION_TASK_TYPE_ID)->type_entry => StudyTasks::Model()->findAll('category_id=' . StudyTasks::$COMMUNICATION_TASK_TYPE_ID . ' AND study_id=' . $studyId),
						Types::Model()->findByPk(StudyTasks::$SIMPLE_TASK_TYPE_ID)->type_entry => StudyTasks::Model()->findAll('category_id=' . StudyTasks::$SIMPLE_TASK_TYPE_ID . ' AND study_id=' . $studyId),
						Types::Model()->findByPk(StudyTasks::$LOCATION_TASK_TYPE_ID)->type_entry => StudyTasks::Model()->findAll('category_id=' . StudyTasks::$LOCATION_TASK_TYPE_ID . ' AND study_id=' . $studyId));
		}
	}

	protected function taskDropDownList($studyId) {
		
		$typesCriteria = new CDbCriteria;
		$typesCriteria->addInCondition('type_entry', array_keys($this->findTabs($studyId)));
		// (array_keys($categorizedTasks) as $task) {
			
	//	}
		return Types::Model()->findAll($typesCriteria);
	}

	/**
	 * Performs the AJAX validation.
	 * @param StudyTasks $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'study-tasks-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}