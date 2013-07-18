<?php

/**
 * This is the model class for table "{{types}}".
 *
 * The followings are the available columns in table '{{types}}':
 * @property integer $id
 * @property string $category
 * @property string $type_entry
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Studies[] $studies
 * @property UserStudies[] $userStudies
 */
class Types extends CActiveRecord {
	/*	 * Function to get a list of all category in the types
	 * 
	 */

	public static function getAllTypes($category) {
		return Types::Model()->findAll("category='".$category."'");
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Types the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return '{{types}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('category, type_entry', 'required'),
				array('category, type_entry', 'length', 'max' => 50),
				array('description', 'length', 'max' => 255),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, category, type_entry, description', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'studies' => array(self::HAS_MANY, 'Studies', 'type_id'),
				'userStudies' => array(self::HAS_MANY, 'UserStudies', 'role_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
				'id' => 'ID',
				'category' => 'Category',
				'type_entry' => 'Type Entry',
				'description' => 'Description',
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
		$criteria->compare('category', $this->category, true);
		$criteria->compare('type_entry', $this->type_entry, true);
		$criteria->compare('description', $this->description, true);

		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
		));
	}

}