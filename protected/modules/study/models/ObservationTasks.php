<?php

/**
 * This is the model class for table "{{observation_tasks}}".
 *
 * The followings are the available columns in table '{{observation_tasks}}':
 * @property integer $id
 * @property integer $observation_id
 * @property integer $study_task_id
 * @property string $start_time
 * @property string $duration
 *
 * The followings are the available model relations:
 * @property Notes[] $notes
 * @property Observations $observation
 * @property StudyTasks $studyTask
 */
class ObservationTasks extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ObservationTasks the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{observation_tasks}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('observation_id, study_task_id', 'numerical', 'integerOnly'=>true),
			array('start_time, duration', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, observation_id, study_task_id, start_time, duration', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'notes' => array(self::HAS_MANY, 'Notes', 'observation_task_id'),
			'observation' => array(self::BELONGS_TO, 'Observations', 'observation_id'),
			'studyTask' => array(self::BELONGS_TO, 'StudyTasks', 'study_task_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'observation_id' => 'Observation',
			'study_task_id' => 'Study Task',
			'start_time' => 'Start Time',
			'duration' => 'Duration',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('observation_id',$this->observation_id);
		$criteria->compare('study_task_id',$this->study_task_id);
		$criteria->compare('start_time',$this->start_time,true);
		$criteria->compare('duration',$this->duration,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}