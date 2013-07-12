<?php

/**
 * This is the model class for table "{{studies}}".
 *
 * The followings are the available columns in table '{{studies}}':
 * @property integer $id
 * @property string $name
 * @property integer $type_id
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Types $type
 * @property UserStudies[] $userStudies
 */
class Study extends CActiveRecord {

public static $LINEAR_TYPE_ID = 8;
public static $MULTITASK_TYPE_ID = 9;
public static $MULTIACTOR_TYPE_ID= 10;
public static $MULTIOBSEVER_TYPE_ID= 11;
/**
 * Returns the static model of the specified AR class.
 * @param string $className active record class name.
 * @return Study the static model class
 */
//public $studySites;
public static function model($className = __CLASS__) {
return parent::model($className);
}

/**
 * @return string the associated database table name
 */
public function tableName() {
return '{{studies}}';
}

/**
 * @return array validation rules for model attributes.
 */
public function rules() {
// NOTE: you should only define rules for those attributes that
// will receive user inputs.
return array(
array('name, type_id, description', 'required'),
 array('type_id', 'numerical', 'integerOnly' => true),
 array('name', 'length', 'max' => 50),
 array('description', 'length', 'max' => 255),
 // The following rule is used by search().
// Please remove those attributes that should not be searched.
array('id, name, type_id, description, created', 'safe', 'on' => 'search'),
);
}

/**
 * @return array relational rules.
 */
public function relations() {
// NOTE: you may need to adjust the relation name and the related
// class name for the relations automatically generated below.
return array(
'type' => array(self::BELONGS_TO, 'Types', 'type_id'),
 'userStudies' => array(self::HAS_MANY, 'UserStudies', 'study_id'),
);
}

/**
 * @return array customized attribute labels (name=>label)
 */
public function attributeLabels() {
return array(
'id' => 'ID',
 'name' => 'Name',
 'type_id' => 'Type',
 'created' => 'Create Date',
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
$criteria->compare('name', $this->name, true);
$criteria->compare('type_id', $this->type_id);
$criteria->compare('created', $this->created, true);
$criteria->compare('description', $this->description, true);
return new CActiveDataProvider($this, array(
'criteria' => $criteria,
));
}

}