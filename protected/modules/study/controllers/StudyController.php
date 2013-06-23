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
						'actions' => array('index', 'view'),
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

	public function actionDashboard($studyid) {
		//$model = new Study;
		$this->study_name = $this->loadModel($studyid)->name;
		$this->render('dashboard', array(
				'model' => $this->loadModel($studyid),
		));
	}

	/*	 * This is the main of the study
	 * 
	 */

	public function actionObservers($studyid) {
		$observer = new ObserverForm;
		if (isset($_POST['ObserverForm'])) {
			$observer->attributes = $_POST['ObserverForm'];
			//$model->sendRequest();
			/* $userCriteria = new CDbCriteria();
			  $userCriteria->alias = 't1';
			  $userCriteria->condition = "t1.email=".$observer->email;
			  $userCriteria->with = array(
			  "userStudies" => array('select' => 'type_entry'),
			  "study" => array('select' => array('name', 'created')),
			  "user.profile" => array('select' => 'firstname'));
			 */
			$user = User::Model()->find("email='" . $observer->email . "'");
			if ($user !== null) {
				//$taskCriteria = new CDbCriteria();
				// $taskCriteria->condition = "category='roles' AND type_entry='".$observer->email;
				$userStudies = new UserStudies;
				$userStudies->user_id = $user->id;
				$userStudies->study_id = $studyid;
				$userStudies->role_id = Types::Model()->findByPk(6)->id;
				$userStudies->pending_request = 1;
				$userStudies->save();
			}
		}
		$this->render('observers', array(
				'observer' => $observer,
						//'model' => $this->loadModel($id),
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

	public function actionJoin($studyid) {
		$userStudiesCriteria = new CDbCriteria();
		$userId=Yii::app()->user->id;
		$userStudiesCriteria->condition = "user_id=$userId AND study_id=$studyid";
		$userStudies = UserStudies::Model()->find($userStudiesCriteria);
		$userStudies->pending_request=0;
		$userStudies->save();
		$this->actionDashboard($studyid);
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
				$user_studies->user_id = Yii::app()->user->id;
				$user_studies->study_id = $model->id;
				$user_studies->role_id = 5; //temp value for the creator
				$user_studies->save();
				$this->redirect(array('dashboard', 'studyid' => $model->id));
			}
		}
		$studyTypesCriteria = new CDbCriteria();
		$studyTypesCriteria->condition = "category='study types'";

		$this->render('create', array(
				'model' => $model,
				'roles' => Types::Model()->findAll($studyTypesCriteria),
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

		if (isset($_POST['Study'])) {
			$model->attributes = $_POST['Study'];
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
