<?php

class UserStudiesController extends Controller {

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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionDashboard($studyId) {
		$this->populateStudyNav($studyId);
		$userStudies = new UserStudies;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$observerCriteria = new CDbCriteria;
		$observerCriteria->alias = "t1";
		$observerCriteria->condition = "t1.study_id = " . $studyId;
		$observerCriteria->with = array(
				"user.profile" => array('select' => 'avatar_url', 'firstname', 'lastname'),
				"user" => array('select' => array('email')));

		if (isset($_POST['UserStudies'])) {
			$userStudies->attributes = $_POST['UserStudies'];
			$user = User::Model()->find("email='" . $userStudies->email . "'");
			if ($user !== null) {
				$userStudies->user_id = $user->id;
				$userStudies->study_id = $studyId;
				if ($userStudies->admin == 0) {
					$userStudies->role_id = Types::model()->find("category='roles' AND type_entry='observer'")->id;
				} else {
					$userStudies->role_id = Types::model()->find("category='roles' AND type_entry='administrator'")->id;
				}
				$userStudies->status = 1;
			}
			$userStudies->save();
		}

		$this->render('dashboard', array(
				'model' => $userStudies,
				'observers' => UserStudies::Model()->findAll($observerCriteria),
		));
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new UserStudies('search');
		$model->unsetAttributes(); // clear any default values
		if (isset($_GET['UserStudies']))
			$model->attributes = $_GET['UserStudies'];

		$this->render('admin', array(
				'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return UserStudies the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = UserStudies::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param UserStudies $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-studies-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
