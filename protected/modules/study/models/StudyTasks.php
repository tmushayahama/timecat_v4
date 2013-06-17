<?php

/**
 * This is the model class for table "{{study_tasks}}".
 *
 * The followings are the available columns in table '{{study_tasks}}':
 * @property integer $id
 * @property integer $study_id
 * @property integer $task_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property ObservationTasks[] $observationTasks
 * @property Tasks $task
 * @property Studies $study
 */
class StudyTasks extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudyTasks the static model class
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
		return '{{study_tasks}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('study_id, task_id', 'required'),
			array('study_id, task_id, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, study_id, task_id, status', 'safe', 'on'=>'search'),
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
			'observationTasks' => array(self::HAS_MANY, 'ObservationTasks', 'study_task_id'),
			'task' => array(self::BELONGS_TO, 'Tasks', 'task_id'),
			'study' => array(self::BELONGS_TO, 'Studies', 'study_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'study_id' => 'Study',
			'task_id' => 'Task',
			'status' => 'Status',
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
		$criteria->compare('study_id',$this->study_id);
		$criteria->compare('task_id',$this->task_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}