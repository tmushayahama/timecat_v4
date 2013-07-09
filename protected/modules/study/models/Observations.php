<?php

/**
 * This is the model class for table "{{observations}}".
 *
 * The followings are the available columns in table '{{observations}}':
 * @property integer $id
 * @property string $start_time
 * @property string $duration
 * @property integer $user_id
 * @property integer $subject_id
 * @property integer $site_id
 * @property integer $type_id
 * @property integer $valid
 *
 * The followings are the available model relations:
 * @property Notes[] $notes
 * @property ObservationTasks[] $observationTasks
 * @property Types $type
 * @property Sites $site
 * @property Subjects $subject
 * @property Users $user
 */
class Observations extends CActiveRecord {

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Observations the static model class
	 */
	public $subjectDescription;
	public $observer;
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return '{{observations}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('subjectDescription, site_id', 'required'),
				//array('user_id, site_id, type_id, valid', 'numerical', 'integerOnly' => true),
				array('start_time, duration', 'length', 'max' => 11),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, start_time, duration, user_id, subject_id, site_id, type_id, valid', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'notes' => array(self::HAS_MANY, 'Notes', 'observation_id'),
				'observationTasks' => array(self::HAS_MANY, 'ObservationTasks', 'observation_id'),
				'type' => array(self::BELONGS_TO, 'Types', 'type_id'),
				'site' => array(self::BELONGS_TO, 'Sites', 'site_id'),
				'subject' => array(self::BELONGS_TO, 'Subjects', 'subject_id'),
				'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
				'study' => array(self::BELONGS_TO, 'Studies', 'study_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
				'id' => 'ID',
				'start_time' => 'Start Time',
				'duration' => 'Duration',
				'observer' => 'Observer',
				'subjectDescription' => 'Subject',
				'site_id' => 'Site',
				'type_id' => 'Type',
				'valid' => 'Valid',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search() {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('start_time', $this->start_time, true);
		$criteria->compare('duration', $this->duration, true);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('subject_id', $this->subject_id);
		$criteria->compare('site_id', $this->site_id);
		$criteria->compare('type_id', $this->type_id);
		$criteria->compare('valid', $this->valid);

		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
		));
	}

}