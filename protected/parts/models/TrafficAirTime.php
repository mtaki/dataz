<?php

/**
 * This is the model class for table "traffic_air_time".
 *
 * The followings are the available columns in table 'traffic_air_time':
 * @property string $id
 * @property string $air_time_destination_id
 * @property string $air_time_movement_id
 * @property string $operator_subscription_id
 * @property string $num
 */
class TrafficAirTime extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TrafficAirTime the static model class
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
		return 'traffic_air_time';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('air_time_destination_id, air_time_movement_id, operator_subscription_id', 'length', 'max'=>20),
			array('num', 'length', 'max'=>38),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, air_time_destination_id, air_time_movement_id, operator_subscription_id, num', 'safe', 'on'=>'search'),
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
			'air_time_destination_id' => 'Air Time Destination',
			'air_time_movement_id' => 'Air Time Movement',
			'operator_subscription_id' => 'Operator Subscription',
			'num' => 'Num',
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

		$criteria->compare('air_time_destination_id',$this->air_time_destination_id,true);

		$criteria->compare('air_time_movement_id',$this->air_time_movement_id,true);

		$criteria->compare('operator_subscription_id',$this->operator_subscription_id,true);

		$criteria->compare('num',$this->num,true);

		return new CActiveDataProvider('TrafficAirTime', array(
			'criteria'=>$criteria,
		));
	}
}