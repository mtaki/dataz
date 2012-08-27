<?php

/**
 * This is the model class for table "vsat_site_data".
 *
 * The followings are the available columns in table 'vsat_site_data':
 * @property string $site_number
 * @property string $site_name
 * @property string $location_place_name
 * @property string $log_deg
 * @property string $log_min
 * @property string $log_secs
 * @property string $lat_deg
 * @property string $lat_min
 * @property string $lat_secs
 * @property string $region
 * @property string $site_elevation
 * @property string $remark
 * @property string $application_vsat_id
 */
class VsatSiteData extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return VsatSiteData the static model class
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
		return 'vsat_site_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('application_vsat_id', 'required'),
			array('site_number, site_name, location_place_name, log_deg, log_min, log_secs, lat_deg, lat_min, lat_secs, region, site_elevation', 'length', 'max'=>45),
			array('application_vsat_id', 'length', 'max'=>20),
			array('remark', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('site_number, site_name, location_place_name, log_deg, log_min, log_secs, lat_deg, lat_min, lat_secs, region, site_elevation, remark, application_vsat_id', 'safe', 'on'=>'search'),
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
			'applicationVsat' => array(self::BELONGS_TO, 'ApplicationVsat', 'application_vsat_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'site_number' => 'Site Number',
			'site_name' => 'Site Name',
			'location_place_name' => 'Location Place Name',
			'log_deg' => 'Log Deg',
			'log_min' => 'Log Min',
			'log_secs' => 'Log Secs',
			'lat_deg' => 'Lat Deg',
			'lat_min' => 'Lat Min',
			'lat_secs' => 'Lat Secs',
			'region' => 'Region',
			'site_elevation' => 'Site Elevation',
			'remark' => 'Remark',
			'application_vsat_id' => 'Application Vsat',
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

		$criteria->compare('site_number',$this->site_number,true);

		$criteria->compare('site_name',$this->site_name,true);

		$criteria->compare('location_place_name',$this->location_place_name,true);

		$criteria->compare('log_deg',$this->log_deg,true);

		$criteria->compare('log_min',$this->log_min,true);

		$criteria->compare('log_secs',$this->log_secs,true);

		$criteria->compare('lat_deg',$this->lat_deg,true);

		$criteria->compare('lat_min',$this->lat_min,true);

		$criteria->compare('lat_secs',$this->lat_secs,true);

		$criteria->compare('region',$this->region,true);

		$criteria->compare('site_elevation',$this->site_elevation,true);

		$criteria->compare('remark',$this->remark,true);

		$criteria->compare('application_vsat_id',$this->application_vsat_id,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}