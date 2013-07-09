<?php

/**
 * This is the model class for table "{{user_messages}}".
 *
 * The followings are the available columns in table '{{user_messages}}':
 * @property integer $id
 * @property integer $message_id
 * @property integer $sender_id
 * @property integer $recipient_id
 * @property integer $study_id
 * @property string $send_date
 * @property integer $received
 * @property integer $deleted
 *
 * The followings are the available model relations:
 * @property Studies $study
 * @property Messages $message
 * @property Users $recipient
 * @property Users $sender
 */
class UserMessages extends CActiveRecord
{
    
    public $email;
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserMessages the static model class
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
		return '{{user_messages}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('message_id, sender_id, recipient_id, study_id, send_date, email', 'required'),
			array('message_id, sender_id, recipient_id, study_id, received, deleted', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, message_id, sender_id, recipient_id, study_id, send_date, received, deleted, email', 'safe', 'on'=>'search'),
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
			'study' => array(self::BELONGS_TO, 'Study', 'study_id'),
			'message' => array(self::BELONGS_TO, 'Messages', 'message_id'),
			'recipient' => array(self::BELONGS_TO, 'Users', 'recipient_id'),
			'sender' => array(self::BELONGS_TO, 'Users', 'sender_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'message_id' => 'Message',
			'sender_id' => 'Sender',
			'recipient_id' => 'Recipient',
			'study_id' => 'Study',
			'send_date' => 'Send Date',
			'received' => 'Received',
			'deleted' => 'Deleted',
                        'email' => 'Email',
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
		$criteria->compare('message_id',$this->message_id);
		$criteria->compare('sender_id',$this->sender_id);
		$criteria->compare('recipient_id',$this->recipient_id);
		$criteria->compare('study_id',$this->study_id);
		$criteria->compare('send_date',$this->send_date,true);
		$criteria->compare('received',$this->received);
		$criteria->compare('deleted',$this->deleted);
                $criteria->compare('email',$this->email);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}