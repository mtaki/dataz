<?php

/**
 * This is the model class for table "application_courier".
 *
 * The followings are the available columns in table 'application_courier':
 * @property string $id
 * @property string $projection
 * @property string $insurance_policy
 * @property string $track_trace
 * @property integer $trade_licence
 * @property integer $tra_registered
 * @property integer $business_name_registration
 * @property string $counters
 * @property string $storage
 * @property string $ventilation
 * @property string $monitoring
 * @property string $human_resources
 * @property string $sector
 * @property integer $business_plan
 */
class ApplicationCourier extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ApplicationCourier the static model class
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
		return 'application_courier';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('trade_licence, tra_registered, business_name_registration, business_plan', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>20),
			array('projection, insurance_policy, track_trace, counters, storage, ventilation, monitoring, human_resources', 'length', 'max'=>50),
			array('sector', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, projection, insurance_policy, track_trace, trade_licence, tra_registered, business_name_registration, counters, storage, ventilation, monitoring, human_resources, sector, business_plan', 'safe', 'on'=>'search'),
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
			'licenceApplication'=>array(self::BELONGS_TO, 'LicenceApplication', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'projection' => 'Projection',
			'insurance_policy' => 'Insurance Policy',
			'track_trace' => 'Track Trace',
			'trade_licence' => 'Trade Licence',
			'tra_registered' => 'Tra Registered',
			'business_name_registration' => 'Business Name Registration',
			'counters' => 'Counters',
			'storage' => 'Storage',
			'ventilation' => 'Ventilation',
			'monitoring' => 'Monitoring',
			'human_resources' => 'Human Resources',
			'sector' => 'Sector',
			'business_plan' => 'Business Plan',
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

		$criteria->compare('projection',$this->projection,true);

		$criteria->compare('insurance_policy',$this->insurance_policy,true);

		$criteria->compare('track_trace',$this->track_trace,true);

		$criteria->compare('trade_licence',$this->trade_licence);

		$criteria->compare('tra_registered',$this->tra_registered);

		$criteria->compare('business_name_registration',$this->business_name_registration);

		$criteria->compare('counters',$this->counters,true);

		$criteria->compare('storage',$this->storage,true);

		$criteria->compare('ventilation',$this->ventilation,true);

		$criteria->compare('monitoring',$this->monitoring,true);

		$criteria->compare('human_resources',$this->human_resources,true);

		$criteria->compare('sector',$this->sector,true);

		$criteria->compare('business_plan',$this->business_plan);

		return new CActiveDataProvider('ApplicationCourier', array(
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
