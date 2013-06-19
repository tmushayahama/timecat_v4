<?php

/**
 * This is the model class for table "{{tasks}}".
 *
 * The followings are the available columns in table '{{tasks}}':
 * @property integer $id
 * @property string $name
 * @property integer $category_id
 * @property string $definition
 *
 * The followings are the available model relations:
 * @property ObservationTasks[] $observationTasks
 * @property Types $category
 */
class Tasks extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tasks the static model class
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
		return '{{tasks}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, category_id, definition', 'required'),
			array('category_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('definition', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, category_id, definition', 'safe', 'on'=>'search'),
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
			'observationTasks' => array(self::HAS_MANY, 'ObservationTasks', 'task_id'),
			'category' => array(self::BELONGS_TO, 'Types', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'category_id' => 'Category',
			'definition' => 'Definition',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('definition',$this->definition,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}