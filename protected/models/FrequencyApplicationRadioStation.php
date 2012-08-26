<?php

/**
 * This is the model class for table "frequency_application_radio_station".
 *
 * The followings are the available columns in table 'frequency_application_radio_station':
 * @property string $id
 * @property string $application_id
 * @property string $index
 * @property string $exact_antenna_site
 * @property string $location
 * @property string $make
 * @property string $call_sign
 * @property string $antenna_type
 * @property double $longitude
 * @property double $latitude
 */
class FrequencyApplicationRadioStation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FrequencyApplicationRadioStation the static model class
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
		return 'frequency_application_radio_station';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('application_id, index, exact_antenna_site, location, make, call_sign, antenna_type', 'required'),
			array('longitude, latitude', 'numerical'),
			array('application_id, index', 'length', 'max'=>20),
			array('exact_antenna_site, make', 'length', 'max'=>50),
			array('location, call_sign, antenna_type', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, application_id, index, exact_antenna_site, location, make, call_sign, antenna_type, longitude, latitude', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'application_id' => 'Application',
			'index' => 'Index',
			'exact_antenna_site' => 'Exact Antenna Site',
			'location' => 'Location',
			'make' => 'Make',
			'call_sign' => 'Call Sign',
			'antenna_type' => 'Antenna Type',
			'longitude' => 'Longitude',
			'latitude' => 'Latitude',
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

		$criteria->compare('application_id',$this->application_id,true);

		$criteria->compare('index',$this->index,true);

		$criteria->compare('exact_antenna_site',$this->exact_antenna_site,true);

		$criteria->compare('location',$this->location,true);

		$criteria->compare('make',$this->make,true);

		$criteria->compare('call_sign',$this->call_sign,true);

		$criteria->compare('antenna_type',$this->antenna_type,true);

		$criteria->compare('longitude',$this->longitude);

		$criteria->compare('latitude',$this->latitude);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}