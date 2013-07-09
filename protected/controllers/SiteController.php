<?php

class SiteController extends Controller {

	private $_model;
	public $avatar;

	public function studySitesCount($studyId) {
		return Sites::model()->count("study_id =".$studyId);
	}
	public function studyObserversCount($studyId) {
		return UserStudies::model()->count("study_id =".$studyId);
	}
	public function studyTasksCount($studyId) {
		return StudyTasks::model()->count("study_id =".$studyId);
	}
	public function studyObservationsCount($studyId) {
		return Observations::model()->count("study_id =".$studyId);
	}
	
	/**
	 * Declares class-based actions.
	 */
	public function actions() {
		return array(
				// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha' => array(
						'class' => 'CCaptchaAction',
						'backColor' => 0xFFFFFF,
				),
				// page action renders "static" pages stored under 'protected/views/site/pages'
				// They can be accessed via: index.php?r=site/page&view=FileName
				'page' => array(
						'class' => 'CViewAction',
				),
		);
	}
	/**This is to get all the role types
	 * 
	 *
	public function getRoleType(){
		$ 
	}*/
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex() {
		$model = $this->loadUser();
		$this->avatar = $model->profile->avatar_url;
		$userStudiesCriteria = new CDbCriteria();
		$userStudiesCriteria->condition="t1.user_id=".Yii::app()->user->id;
		$userStudiesCriteria->with = array(
				"role" => array('select' => 'type_entry'),
				"study" => array('select' => array('name', 'created')),
				"user.profile" => array('select' => 'firstname'));
		$userStudiesCriteria->alias='t1';

		if ($this->avatar == null) {
			$this->avatar = "timecat_avatar.gif";
		}
		$this->render('home', array(
				'model' => $model,
				'studies' => UserStudies::model()->findAll($userStudiesCriteria),
				'profile' => $model->profile,
		));
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//$this->render($this->redirect(Yii::app()->user->loginUrl));
	}

	public function actionDeleteStudy($studyId) {
		$userStudiesCriteria = new CDbCriteria();
		$userId=Yii::app()->user->id;
		$userStudiesCriteria->condition = "user_id=$userId AND study_id=$studyId";
		$userStudies = UserStudies::Model()->find($userStudiesCriteria);
		$userStudies->delete();
		$this->actionIndex();
		//$this->render('view', array(
		//		'model' => $this->loadModel($id),
		//));
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError() {
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact() {
		$model = new ContactForm;
		if (isset($_POST['ContactForm'])) {
			$model->attributes = $_POST['ContactForm'];
			if ($model->validate()) {
				$name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
				$subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
				$headers = "From: $name <{$model->email}>\r\n" .
								"Reply-To: {$model->email}\r\n" .
								"MIME-Version: 1.0\r\n" .
								"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
				Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact', array('model' => $model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin() {
		$model = new LoginForm;

		// if it is ajax validation request
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if ($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login', array('model' => $model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout() {
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function loadUser() {
		if ($this->_model === null) {
			if (Yii::app()->user->id)
			//$this->_model = new User;//Yii::app()->controller->module->user();
				$this->_model = Yii::app()->getModule('user')->user();
			if ($this->_model === null)
				$this->redirect(Yii::app()->controller->module->loginUrl);
		}
		return $this->_model;
	}

}