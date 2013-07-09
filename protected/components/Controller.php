<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends RController
{
	public $study_name = "";
	public $study_role = "";
	public function fullName() {
		$profile = Profile::Model()->find('user_id='.Yii::app()->user->id);
		return $profile->firstname." ".$profile->lastname;
	}
	public function populateStudyNav($studyId) {
		$this->study_name = Study::model()->findByPk($studyId)->name;
		$this->study_role = UserStudies::Model()->find('user_id='.Yii::app()->user->id.' AND study_id='.$studyId)->role->type_entry;
	}	
	public function Avatar() {
		$profile = Profile::model()->find('user_id='.Yii::app()->user->id);
		if ($profile->avatar_url == null) {
			return "timecat_avatar.gif";
		} else {
			return $profile->avatar_url;
		}
	}
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	//public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
}