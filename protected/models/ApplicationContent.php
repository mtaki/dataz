<?php

/**
 * This is the model class for table "application_content".
 *
 * The followings are the available columns in table 'application_content':
 * @property string $id
 * @property integer $service_id
 * @property string $other_service
 * @property string $make_type
 * @property string $manufacture_name_address
 * @property integer $station_type
 * @property string $coverage_area
 * @property integer $use_tvro
 * @property string $tvro_satellite
 * @property string $cable_television
 * @property string $free_to_air
 * @property string $studio_site
 * @property string $antenna_site
 * @property string $leased_facility
 * @property string $owner_property
 * @property string $name_lessor
 * @property string $lessor_address_contact
 * @property string $antenna_gain
 * @property string $polarization
 * @property string $elevation
 * @property string $height
 * @property string $antenna_coordinates
 * @property string $frequency_band
 * @property string $frequency_channel
 * @property string $nominal_band_width
 * @property string $modulation_type
 * @property string $emission_class
 * @property string $transmitter_power
 * @property string $azimuth
 * @property string $angular_width
 * @property string $operation_hours
 * @property string $stl_equipment_make
 * @property string $stl_equipment_manufacturer
 * @property string $stl_antenna
 * @property string $stl_operating_power
 * @property string $stl_remarks
 * @property string $antenna_contractor_name
 * @property string $antenna_contractor_address
 * @property string $antenna_contracor_phone
 * @property string $antenna_contracor_fax
 * @property string $antenna_contractor_email
 * @property string $crb_number
 * @property string $crb_category
 * @property string $content_source
 * @property string $content_import
 * @property string $content_type_program
 * @property string $content_time_hours
 * @property string $content_intended_charges
 * @property string $content_date_commencement
 * @property string $content_future_plans
 * @property string $content_other_info
 * @property string $declaration_name
 * @property string $declaration_place
 * @property string $declaration_date
 * 
 * @author Mohamed Manja <mohamedmanja@gmail.com>
 */
class ApplicationContent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ApplicationContent the static model class
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
		return 'application_content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('service_id, station_type, use_tvro', 'numerical', 'integerOnly'=>true),
			array('transmitter_power, operation_hours', 'numerical'),
			array('id', 'length', 'max'=>20),
			array('azimuth', 'numerical', 'max'=>360,'min'=>0),
			array('angular_width', 'numerical', 'max'=>90,'min'=>0),
			array('other_service, make_type, lessor_address_contact, content_source', 'length', 'max'=>100),
			array('manufacture_name_address, coverage_area, tvro_satellite, cable_television, free_to_air, studio_site, antenna_site, content_import, content_type_program, content_time_hours, content_intended_charges, content_future_plans, content_other_info', 'length', 'max'=>200),
			array('leased_facility, owner_property, name_lessor, polarization, elevation, height, antenna_coordinates, frequency_band, frequency_channel, nominal_band_width, modulation_type, emission_class, transmitter_power, stl_equipment_make, stl_equipment_manufacturer, stl_antenna, stl_operating_power, stl_remarks, antenna_contractor_name, antenna_contractor_address, antenna_contracor_phone, antenna_contracor_fax, antenna_contractor_email, crb_number, crb_category, declaration_name, declaration_place', 'length', 'max'=>50),
			array('antenna_gain, azimuth, angular_width, operation_hours', 'length', 'max'=>10),
			array('content_date_commencement, declaration_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('antenna_gain, azimuth, angular_width, operation_hours','safe'),
			array('id, service_id, other_service, make_type, manufacture_name_address, station_type, coverage_area, use_tvro, tvro_satellite, cable_television, free_to_air, studio_site, antenna_site, leased_facility, owner_property, name_lessor, lessor_address_contact, antenna_gain, polarization, elevation, height, antenna_coordinates, frequency_band, frequency_channel, nominal_band_width, modulation_type, emission_class, transmitter_power, azimuth, angular_width, operation_hours, stl_equipment_make, stl_equipment_manufacturer, stl_antenna, stl_operating_power, stl_remarks, antenna_contractor_name, antenna_contractor_address, antenna_contracor_phone, antenna_contracor_fax, antenna_contractor_email, crb_number, crb_category, content_source, content_import, content_type_program, content_time_hours, content_intended_charges, content_date_commencement, content_future_plans, content_other_info, declaration_name, declaration_place, declaration_date', 'safe', 'on'=>'search'),
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
			'service_id' => 'Service',
			'other_service' => 'Other Service',
			'make_type' => 'Make Type',
			'manufacture_name_address' => 'Manufacture Name Address',
			'station_type' => 'Station Type',
			'coverage_area' => 'Coverage Area',
			'use_tvro' => 'Use Tvro',
			'tvro_satellite' => 'Tvro Satellite',
			'cable_television' => 'Cable Television',
			'free_to_air' => 'Free To Air',
			'studio_site' => 'Studio Site',
			'antenna_site' => 'Antenna Site',
			'leased_facility' => 'Leased Facility',
			'owner_property' => 'Owner Property',
			'name_lessor' => 'Name Lessor',
			'lessor_address_contact' => 'Lessor Address Contact',
			'antenna_gain' => 'Antenna Gain',
			'polarization' => 'Polarization',
			'elevation' => 'Elevation',
			'height' => 'Height',
			'antenna_coordinates' => 'Antenna Coordinates',
			'frequency_band' => 'Frequency Band',
			'frequency_channel' => 'Frequency Channel',
			'nominal_band_width' => 'Nominal Band Width',
			'modulation_type' => 'Modulation Type',
			'emission_class' => 'Emission Class',
			'transmitter_power' => 'Transmitter Power',
			'azimuth' => 'Azimuth',
			'angular_width' => 'Angular Width',
			'operation_hours' => 'Operation Hours',
			'stl_equipment_make' => 'Stl Equipment Make',
			'stl_equipment_manufacturer' => 'Stl Equipment Manufacturer',
			'stl_antenna' => 'Stl Antenna',
			'stl_operating_power' => 'Stl Operating Power',
			'stl_remarks' => 'Stl Remarks',
			'antenna_contractor_name' => 'Antenna Contractor Name',
			'antenna_contractor_address' => 'Antenna Contractor Address',
			'antenna_contracor_phone' => 'Antenna Contracor Phone',
			'antenna_contracor_fax' => 'Antenna Contracor Fax',
			'antenna_contractor_email' => 'Antenna Contractor Email',
			'crb_number' => 'Crb Number',
			'crb_category' => 'Crb Category',
			'content_source' => 'Content Source',
			'content_import' => 'Content Import',
			'content_type_program' => 'Content Type Program',
			'content_time_hours' => 'Content Time Hours',
			'content_intended_charges' => 'Content Intended Charges',
			'content_date_commencement' => 'Content Date Commencement',
			'content_future_plans' => 'Content Future Plans',
			'content_other_info' => 'Content Other Info',
			'declaration_name' => 'Declaration Name',
			'declaration_place' => 'Declaration Place',
			'declaration_date' => 'Declaration Date',
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

		$criteria->compare('service_id',$this->service_id);

		$criteria->compare('other_service',$this->other_service,true);

		$criteria->compare('make_type',$this->make_type,true);

		$criteria->compare('manufacture_name_address',$this->manufacture_name_address,true);

		$criteria->compare('station_type',$this->station_type);

		$criteria->compare('coverage_area',$this->coverage_area,true);

		$criteria->compare('use_tvro',$this->use_tvro);

		$criteria->compare('tvro_satellite',$this->tvro_satellite,true);

		$criteria->compare('cable_television',$this->cable_television,true);

		$criteria->compare('free_to_air',$this->free_to_air,true);

		$criteria->compare('studio_site',$this->studio_site,true);

		$criteria->compare('antenna_site',$this->antenna_site,true);

		$criteria->compare('leased_facility',$this->leased_facility,true);

		$criteria->compare('owner_property',$this->owner_property,true);

		$criteria->compare('name_lessor',$this->name_lessor,true);

		$criteria->compare('lessor_address_contact',$this->lessor_address_contact,true);

		$criteria->compare('antenna_gain',$this->antenna_gain,true);

		$criteria->compare('polarization',$this->polarization,true);

		$criteria->compare('elevation',$this->elevation,true);

		$criteria->compare('height',$this->height,true);

		$criteria->compare('antenna_coordinates',$this->antenna_coordinates,true);

		$criteria->compare('frequency_band',$this->frequency_band,true);

		$criteria->compare('frequency_channel',$this->frequency_channel,true);

		$criteria->compare('nominal_band_width',$this->nominal_band_width,true);

		$criteria->compare('modulation_type',$this->modulation_type,true);

		$criteria->compare('emission_class',$this->emission_class,true);

		$criteria->compare('transmitter_power',$this->transmitter_power,true);

		$criteria->compare('azimuth',$this->azimuth,true);

		$criteria->compare('angular_width',$this->angular_width,true);

		$criteria->compare('operation_hours',$this->operation_hours,true);

		$criteria->compare('stl_equipment_make',$this->stl_equipment_make,true);

		$criteria->compare('stl_equipment_manufacturer',$this->stl_equipment_manufacturer,true);

		$criteria->compare('stl_antenna',$this->stl_antenna,true);

		$criteria->compare('stl_operating_power',$this->stl_operating_power,true);

		$criteria->compare('stl_remarks',$this->stl_remarks,true);

		$criteria->compare('antenna_contractor_name',$this->antenna_contractor_name,true);

		$criteria->compare('antenna_contractor_address',$this->antenna_contractor_address,true);

		$criteria->compare('antenna_contracor_phone',$this->antenna_contracor_phone,true);

		$criteria->compare('antenna_contracor_fax',$this->antenna_contracor_fax,true);

		$criteria->compare('antenna_contractor_email',$this->antenna_contractor_email,true);

		$criteria->compare('crb_number',$this->crb_number,true);

		$criteria->compare('crb_category',$this->crb_category,true);

		$criteria->compare('content_source',$this->content_source,true);

		$criteria->compare('content_import',$this->content_import,true);

		$criteria->compare('content_type_program',$this->content_type_program,true);

		$criteria->compare('content_time_hours',$this->content_time_hours,true);

		$criteria->compare('content_intended_charges',$this->content_intended_charges,true);

		$criteria->compare('content_date_commencement',$this->content_date_commencement,true);

		$criteria->compare('content_future_plans',$this->content_future_plans,true);

		$criteria->compare('content_other_info',$this->content_other_info,true);

		$criteria->compare('declaration_name',$this->declaration_name,true);

		$criteria->compare('declaration_place',$this->declaration_place,true);

		$criteria->compare('declaration_date',$this->declaration_date,true);

		return new CActiveDataProvider('ApplicationContent', array(
			'criteria'=>$criteria,
		));
	}
	public function behaviors()
	{
	    return array(
	    'datetimeI18NBehavior' => array('class' => 'application.extensions.DateTimeI18NBehavior'),
	    'ActiveRecordLogableBehavior'=> array('class' => 'application.behaviors.ActiveRecordLogableBehavior'),
	    ); 
	}
	
}
