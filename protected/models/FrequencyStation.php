<?php

/**
 * This is the model class for table "frequency_station".
 *
 * The followings are the available columns in table 'frequency_station':
 * @property string $id
 * @property string $region_id
 * @property string $district_id
 * @property string $station_type_id
 * @property string $operator_id
 * @property string $licence_date
 * @property string $call_sign
 * @property integer $amateur_type_id
 * @property string $status
 */
class FrequencyStation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FrequencyStation the static model class
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
		return 'frequency_station';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('station_type_id, operator_id', 'required'),
			array('amateur_type_id', 'numerical', 'integerOnly'=>true),
			array('region_id, district_id, station_type_id, operator_id', 'length', 'max'=>20),
			array('call_sign', 'length', 'max'=>50),
			array('status', 'length', 'max'=>30),
			array('licence_date', 'safe'),
			array('licence_date', 'type', 'type' => 'date', 'message' => '{attribute}: is not a valid date!', 'dateFormat' => 'dd-MM-yyyy'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, region_id, district_id, station_type_id, operator_id, licence_date, call_sign, amateur_type_id, status', 'safe', 'on'=>'search'),
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
			'frequencyStationtype'=>array(self::BELONGS_TO, 'FrequencyStationType', 'station_type_id','joinType'=>'INNER JOIN'),
			'operator'=>array(self::BELONGS_TO, 'Operator', 'operator_id','joinType'=>'INNER JOIN'),
			'frequencyStationEquipments'=>array(self::HAS_MANY, 'FrequencyStationEquipment', 'station_id'),	
			'frequencyStationFrequencies'=>array(self::HAS_MANY, 'FrequencyStationFrequency', 'station_id'),	
		
		
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'region_id' => 'Region',
			'district_id' => 'District',
			'station_type_id' => 'Station Type',
			'operator_id' => 'Operator',
			'licence_date' => 'Licence Date',
			'call_sign' => 'Call Sign',
			'amateur_type_id' => 'Amateur Type',
			'status' => 'Status',
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

		$criteria->compare('region_id',$this->region_id,true);

		$criteria->compare('district_id',$this->district_id,true);

		$criteria->compare('station_type_id',$this->station_type_id,true);

		$criteria->compare('operator_id',$this->operator_id,true);

		$criteria->compare('licence_date',$this->licence_date,true);

		$criteria->compare('call_sign',$this->call_sign,true);

		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function behaviors()
	{
    	return array('datetimeI18NBehavior' => array('class' => 'application.extensions.DateTimeI18NBehavior'),
    	'ActiveRecordLogableBehavior'=>'application.behaviors.ActiveRecordLogableBehavior',); 
	}
}