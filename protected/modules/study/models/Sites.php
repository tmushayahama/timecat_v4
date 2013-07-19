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

    public static $timezoneMap = array(
        '' => "Select",
        'Pacific/Midway' => "(GMT-11:00) Midway Island, Samoa",
        'America/Adak' => "(GMT-10:00) Hawaii-Aleutian",
        'Etc/GMT+10' => "(GMT-10:00) Hawaii",
        'Pacific/Marquesas' => "(GMT-09:30) Marquesas Islands",
        'Pacific/Gambier' => "(GMT-09:00) Gambier Islands",
        'America/Anchorage' => "(GMT-09:00) Alaska",
        'America/Ensenada' => "(GMT-08:00) Tijuana, Baja California",
        'Etc/GMT+8' => "(GMT-08:00) Pitcairn Islands",
        'America/Los_Angeles' => "(GMT-08:00) Pacific Time (US &amp; Canada)",
        'America/Denver' => "(GMT-07:00) Mountain Time (US &amp; Canada)",
        'America/Chihuahua' => "(GMT-07:00) Chihuahua, La Paz, Mazatlan",
        'America/Dawson_Creek' => "(GMT-07:00) Arizona",
        'America/Belize' => "(GMT-06:00) Saskatchewan, Central America",
        'America/Cancun' => "(GMT-06:00) Guadalajara, Mexico City, Monterrey",
        'Chile/EasterIsland' => "(GMT-06:00) Easter Island",
        'America/Chicago' => "(GMT-06:00) Central Time (US &amp; Canada)",
        'America/New_York' => "(GMT-05:00) Eastern Time (US &amp; Canada)",
        'America/Havana' => "(GMT-05:00) Cuba",
        'America/Bogota' => "(GMT-05:00) Bogota, Lima, Quito, Rio Branco",
        'America/Caracas' => "(GMT-04:30) Caracas",
        'America/Santiago' => "(GMT-04:00) Santiago",
        'America/La_Paz' => "(GMT-04:00) La Paz",
        'Atlantic/Stanley' => "(GMT-04:00) Falkland Islands",
        'America/Campo_Grande' => "(GMT-04:00) Brazil",
        'America/Goose_Bay' => "(GMT-04:00) Atlantic Time (Goose Bay)",
        'America/Glace_Bay' => "(GMT-04:00) Atlantic Time (Canada)",
        'America/St_Johns' => "(GMT-03:30) Newfoundland",
        'America/Araguaina' => "(GMT-03:00) UTC-3",
        'America/Montevideo' => "(GMT-03:00) Montevideo",
        'America/Miquelon' => "(GMT-03:00) Miquelon, St. Pierre",
        'America/Godthab' => "(GMT-03:00) Greenland",
        'America/Argentina/Buenos_Aires' => "(GMT-03:00) Buenos Aires",
        'America/Sao_Paulo' => "(GMT-03:00) Brasilia",
        'America/Noronha' => "(GMT-02:00) Mid-Atlantic",
        'Atlantic/Cape_Verde' => "(GMT-01:00) Cape Verde Is.",
        'Atlantic/Azores' => "(GMT-01:00) Azores",
        'Europe/Belfast' => "(GMT) Greenwich Mean Time : Belfast",
        'Europe/Dublin' => "(GMT) Greenwich Mean Time : Dublin",
        'Europe/Lisbon' => "(GMT) Greenwich Mean Time : Lisbon",
        'Europe/London' => "(GMT) Greenwich Mean Time : London",
        'Africa/Abidjan' => "(GMT) Monrovia, Reykjavik",
        'Europe/Amsterdam' => "(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna",
        'Europe/Belgrade' => "(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague",
        'Europe/Brussels' => "(GMT+01:00) Brussels, Copenhagen, Madrid, Paris",
        'Africa/Algiers' => "(GMT+01:00) West Central Africa",
        'Africa/Windhoek' => "(GMT+01:00) Windhoek",
        'Asia/Beirut' => "(GMT+02:00) Beirut",
        'Africa/Cairo' => "(GMT+02:00) Cairo",
        'Asia/Gaza' => "(GMT+02:00) Gaza",
        'Africa/Blantyre' => "(GMT+02:00) Harare, Pretoria",
        'Asia/Jerusalem' => "(GMT+02:00) Jerusalem",
        'Europe/Minsk' => "(GMT+02:00) Minsk",
        'Asia/Damascus' => "(GMT+02:00) Syria",
        'Europe/Moscow' => "(GMT+03:00) Moscow, St. Petersburg, Volgograd",
        'Africa/Addis_Ababa' => "(GMT+03:00) Nairobi",
        'Asia/Tehran' => "(GMT+03:30) Tehran",
        'Asia/Dubai' => "(GMT+04:00) Abu Dhabi, Muscat",
        'Asia/Yerevan' => "(GMT+04:00) Yerevan",
        'Asia/Kabul' => "(GMT+04:30) Kabul",
        'Asia/Yekaterinburg' => "(GMT+05:00) Yekaterinburg",
        'Asia/Tashkent' => "(GMT+05:00) Tashkent",
        'Asia/Kolkata' => "(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi",
        'Asia/Katmandu' => "(GMT+05:45) Kathmandu",
        'Asia/Dhaka' => "(GMT+06:00) Astana, Dhaka",
        'Asia/Novosibirsk' => "(GMT+06:00) Novosibirsk",
        'Asia/Rangoon' => "(GMT+06:30) Yangon (Rangoon)",
        'Asia/Bangkok' => "(GMT+07:00) Bangkok, Hanoi, Jakarta",
        'Asia/Krasnoyarsk' => "(GMT+07:00) Krasnoyarsk",
        'Asia/Hong_Kong' => "(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi",
        'Asia/Irkutsk' => "(GMT+08:00) Irkutsk, Ulaanbataar",
        'Australia/Perth' => "(GMT+08:00) Perth",
        'Australia/Eucla' => "(GMT+08:45) Eucla",
        'Asia/Tokyo' => "(GMT+09:00) Osaka, Sapporo, Tokyo",
        'Asia/Seoul' => "(GMT+09:00) Seoul",
        'Asia/Yakutsk' => "(GMT+09:00) Yakutsk",
        'Australia/Adelaide' => "(GMT+09:30) Adelaide",
        'Australia/Darwin' => "(GMT+09:30) Darwin",
        'Australia/Brisbane' => "(GMT+10:00) Brisbane",
        'Australia/Hobart' => "(GMT+10:00) Hobart",
        'Asia/Vladivostok' => "(GMT+10:00) Vladivostok",
        'Australia/Lord_Howe' => "(GMT+10:30) Lord Howe Island",
        'Etc/GMT-11' => "(GMT+11:00) Solomon Is., New Caledonia",
        'Asia/Magadan' => "(GMT+11:00) Magadan",
        'Pacific/Norfolk' => "(GMT+11:30) Norfolk Island",
        'Asia/Anadyr' => "(GMT+12:00) Anadyr, Kamchatka",
        'Pacific/Auckland' => "(GMT+12:00) Auckland, Wellington",
        'Etc/GMT-12' => "(GMT+12:00) Fiji, Kamchatka, Marshall Is.",
        'Pacific/Chatham' => "(GMT+12:45) Chatham Islands",
        'Pacific/Tongatapu' => "(GMT+13:00) Nuku'alofa",
        'Pacific/Kiritimati' => "(GMT+14:00) Kiritimati",
    );

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
//        foreach (DateTimeZone::listIdentifiers() as $tz) {
//            $current_tz = new DateTimeZone($tz);
//            if (array_key_exists($tz, Sites::$timezoneMap)) {
//                $timezones[] = array(
//                    'value' => $current_tz->getName(),
//                    'name' => Sites::$timezoneMap[$current_tz->getName()],
//                        //'zone_id' => trim($city),
//                        // 'city_name' => str_replace('_', ' ', $city_name),
//                );
//            }
//        }
//        asort($timezones);
        
        foreach (array_keys(Sites::$timezoneMap) as $tz) {
            $timezones[] = array(
                'value' => $tz,
                'name'=>  Sites::$timezoneMap[$tz],
            );
        }
        return $timezones;
    }

    public function createSitesTimezone($sitelist, $timezonelist, $studyid) {
        for ($i = 0; $i < count($sitelist); $i++) {
            $site = new Sites;
            $site->name = $sitelist[$i];
            $site->timezone = $timezonelist[$i];
            $site->study_id = $studyid;
            $site->save();
        }
    }

}