<?php

/**
 * This is the model class for table "{{sites}}".
 *
 * The followings are the available columns in table '{{sites}}':
 * @property integer $id
 * @property string $name
 * @property integer $study_id
 * @property string $timezone
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Observations[] $observations
 * @property Studies $study
 */
class Sites extends CActiveRecord {

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Sites the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return '{{sites}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('name, study_id', 'required'),
				array('study_id', 'numerical', 'integerOnly' => true),
				array('name', 'length', 'max' => 128),
				array('timezone', 'length', 'max' => 50),
				array('description', 'length', 'max' => 255),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, name, study_id, timezone, description', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'observations' => array(self::HAS_MANY, 'Observations', 'site_id'),
				'study' => array(self::BELONGS_TO, 'Studies', 'study_id'),
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
				'timezone' => 'Timezone',
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
		$criteria->compare('study_id', $this->study_id);
		$criteria->compare('timezone', $this->timezone, true);
		$criteria->compare('description', $this->description, true);

		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
		));
	}

	public function getTimezones() {
		$timezones = array();
		foreach (DateTimeZone::listIdentifiers() as $tz) {
			$current_tz = new DateTimeZone($tz);
			$timezones[] = array(
					'name' => $current_tz->getName(),
							//'zone_id' => trim($city),
							// 'city_name' => str_replace('_', ' ', $city_name),
			);
		}
		return $timezones;
	}
	public function createSitesTimezone($sitelist, $timezonelist, $studyId) {
		for ($i = 0; $i < count($sitelist); $i++) {
			$site = new Sites;
			$site->name = $sitelist[$i];
			$site->timezone = $timezonelist[$i];
			$site->study_id = $studyId;
			$site->save();
		}
	}
}