<?php

/**
 * This is the model class for table "frequency_application_link".
 *
 * The followings are the available columns in table 'frequency_application_link':
 * @property string $id
 * @property string $frequency_application_id
 * @property string $station_a_name
 * @property string $station_b_name
 * @property double $station_a_longitude
 * @property double $station_a_latitude
 * @property double $station_b_longitude
 * @property double $station_b_latitude
 * @property double $station_a_antenna_size
 * @property double $station_b_antenna_size
 * @property double $station_a_agl
 * @property double $station_b_agl
 * @property double $station_a_asl
 * @property double $station_b_asl
 * @property double $length
 * @property string $station_a_antenna_type
 * @property string $station_b_antenna_type
 * @property string $station_a_antenna_gain
 * @property string $station_b_antenna_gain
 * @property double $station_a_power
 * @property double $station_b_power
 * @property double $station_a_effective_power
 * @property double $station_b_effective_power
 * @property double $station_a_beam_width
 * @property double $station_b_beam_width
 * @property string $station_a_polarization
 * @property string $station_b_polarization
 * @property double $station_a_azimuth
 * @property double $station_b_azimuth
 * @property double $station_a_channel_spacing
 * @property double $station_b_channel_spacing
 * @property double $station_a_tr_separation
 * @property double $station_b_tr_separation
 * @property double $station_a_tr_capacity
 * @property double $station_b_tr_capacity
 * @property integer $station_a_channels
 * @property integer $station_b_channels
 */
class FrequencyApplicationLink extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FrequencyApplicationLink the static model class
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
		return 'frequency_application_link';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('frequency_application_id, station_a_name, station_b_name, station_a_longitude, station_a_latitude, station_b_longitude, station_b_latitude, station_a_antenna_size, station_b_antenna_size, station_a_agl, station_b_agl, station_a_asl, station_b_asl, length, station_a_antenna_type, station_b_antenna_type, station_a_antenna_gain, station_b_antenna_gain, station_a_power, station_b_power, station_a_effective_power, station_b_effective_power, station_a_beam_width, station_b_beam_width, station_a_polarization, station_b_polarization, station_a_azimuth, station_b_azimuth, station_a_channel_spacing, station_b_channel_spacing, station_a_tr_separation, station_b_tr_separation, station_a_tr_capacity, station_b_tr_capacity, station_a_channels, station_b_channels', 'required'),
			array('station_a_channels, station_b_channels', 'numerical', 'integerOnly'=>true),
			array('station_a_longitude, station_a_latitude, station_b_longitude, station_b_latitude, station_a_antenna_size, station_b_antenna_size, station_a_agl, station_b_agl, station_a_asl, station_b_asl, length, station_a_power, station_b_power, station_a_effective_power, station_b_effective_power, station_a_beam_width, station_b_beam_width, station_a_azimuth, station_b_azimuth, station_a_channel_spacing, station_b_channel_spacing, station_a_tr_separation, station_b_tr_separation, station_a_tr_capacity, station_b_tr_capacity', 'numerical'),
			array('frequency_application_id', 'length', 'max'=>20),
			array('station_a_name, station_b_name, station_a_antenna_type, station_b_antenna_type', 'length', 'max'=>50),
			array('station_a_antenna_gain, station_b_antenna_gain, station_a_polarization, station_b_polarization', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, frequency_application_id, station_a_name, station_b_name, station_a_longitude, station_a_latitude, station_b_longitude, station_b_latitude, station_a_antenna_size, station_b_antenna_size, station_a_agl, station_b_agl, station_a_asl, station_b_asl, length, station_a_antenna_type, station_b_antenna_type, station_a_antenna_gain, station_b_antenna_gain, station_a_power, station_b_power, station_a_effective_power, station_b_effective_power, station_a_beam_width, station_b_beam_width, station_a_polarization, station_b_polarization, station_a_azimuth, station_b_azimuth, station_a_channel_spacing, station_b_channel_spacing, station_a_tr_separation, station_b_tr_separation, station_a_tr_capacity, station_b_tr_capacity, station_a_channels, station_b_channels', 'safe', 'on'=>'search'),
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
         'frequencyApplication'=>array(self::BELONGS_TO, 'FrequencyApplication', 'frequency_application_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'frequency_application_id' => 'Frequency Application',
			'station_a_name' => 'Station A Name',
			'station_b_name' => 'Station B Name',
			'station_a_longitude' => 'Station A Longitude',
			'station_a_latitude' => 'Station A Latitude',
			'station_b_longitude' => 'Station B Longitude',
			'station_b_latitude' => 'Station B Latitude',
			'station_a_antenna_size' => 'Station A Antenna Size',
			'station_b_antenna_size' => 'Station B Antenna Size',
			'station_a_agl' => 'Station A Agl',
			'station_b_agl' => 'Station B Agl',
			'station_a_asl' => 'Station A Asl',
			'station_b_asl' => 'Station B Asl',
			'length' => 'Length',
			'station_a_antenna_type' => 'Station A Antenna Type',
			'station_b_antenna_type' => 'Station B Antenna Type',
			'station_a_antenna_gain' => 'Station A Antenna Gain',
			'station_b_antenna_gain' => 'Station B Antenna Gain',
			'station_a_power' => 'Station A Power',
			'station_b_power' => 'Station B Power',
			'station_a_effective_power' => 'Station A Effective Power',
			'station_b_effective_power' => 'Station B Effective Power',
			'station_a_beam_width' => 'Station A Beam Width',
			'station_b_beam_width' => 'Station B Beam Width',
			'station_a_polarization' => 'Station A Polarization',
			'station_b_polarization' => 'Station B Polarization',
			'station_a_azimuth' => 'Station A Azimuth',
			'station_b_azimuth' => 'Station B Azimuth',
			'station_a_channel_spacing' => 'Station A Channel Spacing',
			'station_b_channel_spacing' => 'Station B Channel Spacing',
			'station_a_tr_separation' => 'Station A Tr Separation',
			'station_b_tr_separation' => 'Station B Tr Separation',
			'station_a_tr_capacity' => 'Station A Tr Capacity',
			'station_b_tr_capacity' => 'Station B Tr Capacity',
			'station_a_channels' => 'Station A Channels',
			'station_b_channels' => 'Station B Channels',
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

		$criteria->compare('frequency_application_id',$this->frequency_application_id,true);

		$criteria->compare('station_a_name',$this->station_a_name,true);

		$criteria->compare('station_b_name',$this->station_b_name,true);

		$criteria->compare('station_a_longitude',$this->station_a_longitude);

		$criteria->compare('station_a_latitude',$this->station_a_latitude);

		$criteria->compare('station_b_longitude',$this->station_b_longitude);

		$criteria->compare('station_b_latitude',$this->station_b_latitude);

		$criteria->compare('station_a_antenna_size',$this->station_a_antenna_size);

		$criteria->compare('station_b_antenna_size',$this->station_b_antenna_size);

		$criteria->compare('station_a_agl',$this->station_a_agl);

		$criteria->compare('station_b_agl',$this->station_b_agl);

		$criteria->compare('station_a_asl',$this->station_a_asl);

		$criteria->compare('station_b_asl',$this->station_b_asl);

		$criteria->compare('length',$this->length);

		$criteria->compare('station_a_antenna_type',$this->station_a_antenna_type,true);

		$criteria->compare('station_b_antenna_type',$this->station_b_antenna_type,true);

		$criteria->compare('station_a_antenna_gain',$this->station_a_antenna_gain,true);

		$criteria->compare('station_b_antenna_gain',$this->station_b_antenna_gain,true);

		$criteria->compare('station_a_power',$this->station_a_power);

		$criteria->compare('station_b_power',$this->station_b_power);

		$criteria->compare('station_a_effective_power',$this->station_a_effective_power);

		$criteria->compare('station_b_effective_power',$this->station_b_effective_power);

		$criteria->compare('station_a_beam_width',$this->station_a_beam_width);

		$criteria->compare('station_b_beam_width',$this->station_b_beam_width);

		$criteria->compare('station_a_polarization',$this->station_a_polarization,true);

		$criteria->compare('station_b_polarization',$this->station_b_polarization,true);

		$criteria->compare('station_a_azimuth',$this->station_a_azimuth);

		$criteria->compare('station_b_azimuth',$this->station_b_azimuth);

		$criteria->compare('station_a_channel_spacing',$this->station_a_channel_spacing);

		$criteria->compare('station_b_channel_spacing',$this->station_b_channel_spacing);

		$criteria->compare('station_a_tr_separation',$this->station_a_tr_separation);

		$criteria->compare('station_b_tr_separation',$this->station_b_tr_separation);

		$criteria->compare('station_a_tr_capacity',$this->station_a_tr_capacity);

		$criteria->compare('station_b_tr_capacity',$this->station_b_tr_capacity);

		$criteria->compare('station_a_channels',$this->station_a_channels);

		$criteria->compare('station_b_channels',$this->station_b_channels);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}