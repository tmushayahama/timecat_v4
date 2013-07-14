<?php

/**
 * This is the model class for table "{{study_tasks}}".
 *
 * The followings are the available columns in table '{{study_tasks}}':
 * @property integer $id
 * @property string $name
 * @property integer $study_id
 * @property integer $category_id
 * @property string $start_action
 * @property string $end_action
 * @property string $definition
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property ObservationTasks[] $observationTasks
 * @property Studies $study
 * @property Types $category
 * @property TaskHierarchy[] $taskHierarchies
 * @property TaskHierarchy[] $taskHierarchies1
 */
class StudyTasks extends CActiveRecord {


	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudyTasks the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return '{{study_tasks}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('name, definition, dimension_id', 'required'),
				array('study_id, dimension_id, status', 'numerical', 'integerOnly' => true),
				array('name', 'length', 'max' => 50),
				array('start_action, end_action, definition', 'length', 'max' => 255),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, name, study_id, dimension_id, start_action, end_action, definition, status', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'observationTasks' => array(self::HAS_MANY, 'ObservationTasks', 'study_task_id'),
				'study' => array(self::BELONGS_TO, 'Studies', 'study_id'),
				'dimension' => array(self::BELONGS_TO, 'StudyDimensions', 'dimension_id'),
				'taskHierarchies' => array(self::HAS_MANY, 'TaskHierarchy', 'taskee_id'),
				'taskHierarchies1' => array(self::HAS_MANY, 'TaskHierarchy', 'tasker_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
				'id' => 'ID',
				'name' => 'Name',
				'study_id' => 'Study',
				'dimension_id' => 'Dimension',
				'start_action' => 'Start',
				'end_action' => 'End',
				'definition' => 'Definition',
				'status' => 'Status',
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
		$criteria->compare('name', $this->name, true);
		$criteria->compare('study_id', $this->study_id);
		$criteria->compare('dimension_id', $this->category_id);
		$criteria->compare('start_action', $this->start_action, true);
		$criteria->compare('end_action', $this->end_action, true);
		$criteria->compare('definition', $this->definition, true);
		$criteria->compare('status', $this->status);

		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
		));
	}

}