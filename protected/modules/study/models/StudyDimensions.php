<?php

/**
 * This is the model class for table "{{study_dimensions}}".
 *
 * The followings are the available columns in table '{{study_dimensions}}':
 * @property integer $id
 * @property integer $study_id
 * @property string $dimension
 *
 * The followings are the available model relations:
 * @property Studies $study
 * @property StudyTasks[] $studyTasks
 */
class StudyDimensions extends CActiveRecord {

	public static $LINEAR_TASK_TYPE = 'Linear';
	public static $COMMUNICATION_TASK_TYPE = 'Communication';
	public static $LOCATION_TASK_TYPE = 'Location';
	public static $SIMPLE_TASK_TYPE = 'Task';
	public static $FOCUS_1_TASK_TYPE = 'Focus 1';
	public static $FOCUS_2_TASK_TYPE = 'Focus 2';

	public static function LINEAR_DIMENSION() {
		return array(
				StudyDimensions::$LINEAR_TYPE
		);
	}
	public static function MULTITASK_DIMENSION() {
		return array(
				StudyDimensions::$COMMUNICATION_TASK_TYPE,
				StudyDimensions::$LOCATION_TASK_TYPE,
				StudyDimensions::$SIMPLE_TASK_TYPE
		);
	}
	public static function MULTIACTOR_DIMENSION() {
		return array(
				StudyDimensions::$FOCUS_1_TASK_TYPE,
				StudyDimensions::$FOCUS_2_TASK_TYPE
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudyDimensions the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return '{{study_dimensions}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
// NOTE: you should only define rules for those attributes that
// will receive user inputs.
		return array(
				array('study_id, dimension', 'required'),
				array('study_id', 'numerical', 'integerOnly' => true),
				array('dimension', 'length', 'max' => 50),
				// The following rule is used by search().
// Please remove those attributes that should not be searched.
				array('id, study_id, dimension', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
// NOTE: you may need to adjust the relation name and the related
// class name for the relations automatically generated below.
		return array(
				'study' => array(self::BELONGS_TO, 'Studies', 'study_id'),
				'studyTasks' => array(self::HAS_MANY, 'StudyTasks', 'dimension_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
				'id' => 'ID',
				'study_id' => 'Study',
				'dimension' => 'Dimension',
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
		$criteria->compare('study_id', $this->study_id);
		$criteria->compare('dimension', $this->dimension, true);

		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
		));
	}

}