<?php

/**
 * RegistrationForm class.
 * RegistrationForm is the data structure for keeping
 * user registration form data. It is used by the 'registration' action of 'UserController'.
 */
class RegistrationForm extends User {

	public $verifyPassword;
	public $agreement;

	protected function afterValidate() {
		parent::afterValidate();
		//$this->username = $this->email;
	}

	public function rules() {
		$rules = array(
				array('password, verifyPassword, email', 'required'),
				//array('username', 'length', 'max'=>20, 'min' => 3,'message' => UserModule::t("Incorrect username (length between 3 and 20 characters).")),
				array('agreement', 'required', 'requiredValue' => 1, 'message' => 'Please accept Terms and Conditions.'),
				array('password', 'length', 'max' => 128, 'min' => 4, 'message' => UserModule::t("Incorrect password (minimal length 4 symbols).")),
				array('email', 'email'),
				array('email', 'unique', 'message' => UserModule::t("This user's email address already exists.")),
						//array('verifyPassword', 'compare', 'compareAttribute'=>'password', 'message' => UserModule::t("Retype Password is incorrect.")),
						//array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => UserModule::t("Incorrect symbols (A-z0-9).")),
		);
	/*	if (!(isset($_POST['ajax']) && $_POST['ajax'] === 'registration-form')) {
			array_push($rules, array('verifyCode', 'captcha', 'allowEmpty' => !UserModule::doCaptcha('registration')));
		}*/

		array_push($rules, array('verifyPassword', 'compare', 'compareAttribute' => 'password', 'message' => UserModule::t("Retype Password is incorrect.")));
		return $rules;
	}

}