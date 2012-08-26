<?php

/**
 * This is the model class for table "roll_out_plan".
 *
 * The followings are the available columns in table 'roll_out_plan':
 * @property string $id
 * @property string $licence_application_id
 * @property string $service_type
 * @property string $status
 * @property string $capacity
 * @property string $time_frame
 * @property string $area
 */
class RollOutPlan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return RollOutPlan the static model class
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
		return 'roll_out_plan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('licence_application_id, service_type, status, capacity, time_frame, area', 'required'),
			array('licence_application_id', 'length', 'max'=>20),
			array('service_type, status, time_frame', 'length', 'max'=>50),
			array('capacity, area', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, licence_application_id, service_type, status, capacity, time_frame, area', 'safe', 'on'=>'search'),
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
			'licence_application_id' => 'Licence Application',
			'service_type' => 'Service Type',
			'status' => 'Status',
			'capacity' => 'Capacity',
			'time_frame' => 'Time Frame',
			'area' => 'Area',
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

		$criteria->compare('licence_application_id',$this->licence_application_id,true);

		$criteria->compare('service_type',$this->service_type,true);

		$criteria->compare('status',$this->status,true);

		$criteria->compare('capacity',$this->capacity,true);

		$criteria->compare('time_frame',$this->time_frame,true);

		$criteria->compare('area',$this->area,true);

		return new CActiveDataProvider('RollOutPlan', array(
			'criteria'=>$criteria,
		));
	}
	public function behaviors()
	{
	    return array(
	        // Classname => path to Class
	        'ActiveRecordLogableBehavior'=>'application.behaviors.ActiveRecordLogableBehavior',
	    );
	}
}