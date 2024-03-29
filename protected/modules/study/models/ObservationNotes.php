<?php

/**
 * This is the model class for table "{{observation_notes}}".
 *
 * The followings are the available columns in table '{{observation_notes}}':
 * @property integer $id
 * @property integer $observation_id
 * @property integer $observation_task_id
 * @property string $note
 * @property string $time_taken
 *
 * The followings are the available model relations:
 * @property ObservationTasks $observationTask
 * @property Observations $observation
 */
class ObservationNotes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ObservationNotes the static model class
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
		return '{{observation_notes}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('observation_id', 'required'),
			array('observation_id, observation_task_id', 'numerical', 'integerOnly'=>true),
			array('note', 'length', 'max'=>255),
			array('time_taken', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, observation_id, observation_task_id, note, time_taken', 'safe', 'on'=>'search'),
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
			'observationTask' => array(self::BELONGS_TO, 'ObservationTasks', 'observation_task_id'),
			'observation' => array(self::BELONGS_TO, 'Observations', 'observation_id'),
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
			'observation_task_id' => 'Observation Task',
			'note' => 'Note',
			'time_taken' => 'Time Taken',
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
		$criteria->compare('observation_task_id',$this->observation_task_id);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('time_taken',$this->time_taken,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}