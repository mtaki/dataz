<?php

/**
 * This is the model class for table "log".
 *
 * The followings are the available columns in table 'log':
 * @property string $id
 * @property string @username
 * @property string $entity_type
 * @property string $entity_id
 * @property string $time
 * @property string $action
 * @property string $day
 * @property string $remarks
 * @property string $status
 * @property string $team
 * @property string $stage
 * 
 */
class Log extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Log the static model class
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
		return 'log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('time', 'required'),
			array('entity_id', 'length', 'max'=>20),
			array('entity_type, action, status, stage,username', 'length', 'max'=>50),
			array('remarks', 'length', 'max'=>4000),
			array('team', 'length', 'max'=>400),
			array('day', 'safe'),
			array('day', 'type', 'type' => 'date', 'message' => '{attribute}: is not a valid date!', 'dateFormat' => 'dd-MM-yyyy'),
			array('time', 'type', 'type'=>'datetime', 'datetimeFormat'=>Yii::app()->locale->dateFormat.' '.Yii::app()->locale->timeFormat, 'message' => '{attribute}: is not a valid time!',),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id,username,  entity_type, entity_id, time, action, day, remarks, status, team, stage', 'safe', 'on'=>'search'),
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

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'username' => 'User',
			'entity_type' => 'Entity Type',
			'entity_id' => 'Entity',
			'time' => 'Time',
			'action' => 'Action',
			'day' => 'Day',
			'remarks' => 'Remarks',
			'status' => 'Status',
			'team' => 'Team',
			'stage' => 'Stage',
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

		$criteria->compare('id',$this->id,true);


		$criteria->compare('entity_type',$this->entity_type,true);

		$criteria->compare('entity_id',$this->entity_id,true);

		$criteria->compare('time',$this->time,true);

		$criteria->compare('action',$this->action,true);

		$criteria->compare('day',$this->day,true);

		$criteria->compare('remarks',$this->remarks,true);

		$criteria->compare('status',$this->status,true);

		$criteria->compare('team',$this->team,true);

		$criteria->compare('stage',$this->stage,true);

		return new CActiveDataProvider('Log', array(
			'criteria'=>$criteria,
		));
	}
	public function behaviors()
	{
    return array('datetimeI18NBehavior' => array('class' => 'application.extensions.DateTimeI18NBehavior')); 
	}
}
