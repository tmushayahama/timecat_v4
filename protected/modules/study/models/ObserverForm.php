<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ObserverForm extends CFormModel {

	public $email;

	/**
	 * Declares the validation rules.
	 * The rules state that email and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules() {
		return array(
				// email and password are required
				array('email', 'email'),
				array('email', 'required'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels() {
		return array(
				'email' => "email",
		);
	}
	public function sendRequest() {
		
	}
}

