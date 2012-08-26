<?php

/**
 * This is the model class for table "frequency_application".
 *
 * The followings are the available columns in table 'frequency_application':
 * @property string $id
 * @property string $application_date
 * @property string $declaration_date
 * @property string $declaration_signatory
 * @property string $declaration_designation
 * @property string $operator_id
 * @property string $purpose
 * @property string $ship_owner
 * @property string $ship_name
  * @property string $ship_type
 * @property string $ship_registration_number
 * @property integer $ship_certificate_issued
 * @property integer $ship_certificate_done
 * @property integer $amateur_type_id
 * @property string $amateur_nationality
 * @property string $amateur_passport_number
 * @property string $amateur_date_birth
 * @property integer $amateur_possess_licence
 * @property string $amateur_call_sign
 * @property string $amateur_issuing_authority
 * @property string $amateur_guardian_name
 * @property string $amateur_guardian_nationality
 * @property string $amateur_guardian_passport_number
 * @property string $amateur_guardian_town
 * @property string $amateur_guardian_street
 * @property string $amateur_guardian_address
 * @property string $amateur_referee_1_name
 * @property string $amateur_referee_1_address
 * @property string $amateur_referee_1_town
 * @property string $amateur_referee_1_telephone
 * @property string $amateur_referee_1_email
 * @property string $amateur_guardian_telephone
 * @property string $amateur_guardian_email
 * @property string $amateur_guardian_fax
 * @property string $amateur_referee_2_name
 * @property string $amateur_referee_2_address
 * @property string $amateur_referee_2_town
 * @property string $amateur_referee_2_telephone
 * @property string $amateur_referee_2_email
 * @property string $amateur_equipment_made
 * @property string $amateur_equipment_model
 * @property string $amateur_equipment_frequency_range
 * @property double $amateur_equipment_power
 * @property string $amateur_equipment_antenna_make
 * @property string $amateur_equipment_antenna_gain
 * @property integer $amateur_pass_morse_test
 * @property string $amateur_guardian_sign_date
 * @property string $amateur_guardian_sign_name
 * @property string $aircraft_owner
 * @property string $aircraft_type
 * @property string $aircraft_registration_number
 * @property integer $aircraft_certificate_issued
 * @property integer $aircraft_inspection_done
 * @property string $link_type_licence
 * @property string $link_equipment_make
 * @property double $link_equipment_frequency_band
 * @property double $link_equipment_frequency_from
 * @property double $link_equipment_frequency_to
 * @property double $link_equipment_channel_capacity
 * @property string $link_equipment_modulation_scheme
 * @property string $link_equipment_frequency_stability
 * @property double $link_equipment_power
 * @property string $link_equipment_emission
 * @property string $link_equipment_receiver_sensitivity
 * @property string $link_equipment_adjacent_channel_selectivity
 * @property integer $link_equipment_frequency_channels
 * @property string $link_equipment_channelization_plan
 * @property integer $link_antenna_make
 * @property double $link_antenna_receiving_gain
 * @property string $link_supplier_name_address
 * @property string $link_supplier_postal_address
 * @property string $link_supplier_telephone
 * @property string $link_supplier_fax
 * @property string $link_supplier_email
 * @property string $link_supplier_physical_address
 * @property string $link_supplier_street
 * @property string $link_supplier_plot
 * @property integer $link_channels
 * @property double $link_bandwidth
 * @property double $link_separation
 * @property double $link_transmission_capacity
 * @property string $link_channelization_plan
 * @property string $link_proposed_date
 * @property string $link_remarks
 * @property string $radio_equipment_make
 * @property string $radio_equipment_seller_name_address
 * @property double $radio_equipment_fixed_from
 * @property double $radio_equipment_fixed_to
 * @property double $radio_equipment_portable_from
 * @property double $radio_equipment_portable_to
 * @property integer $radio_equipment_fixed_unit
 * @property integer $radio_equipment_portable_unit
 * @property integer $radio_equipment_fixed_channels
 * @property integer $radio_equipment_portable_channels
 * @property integer $radio_equipment_type_id
 * @property double $radio_transmitter_power_fixed
 * @property double $radio_transmitter_power_portable
 * @property string $radio_transmitter_stability_fixed
 * @property string $radio_transmitter_stability_portable
 * @property double $radio_transmitter_nominal_bandwidth_fixed
 * @property double $radio_transmitter_nominal_bandwidth_portable
 * @property string $radio_transmitter_modulation_fixed
 * @property string $radio_transmitter_modulation_portable
 * @property string $radio_transmitter_emission_fixed
 * @property string $radio_transmitter_emission_portable
 * @property string $radio_transmitter_harmonics_fixed
 * @property string $radio_transmitter_harmonics_portable
 * @property string $radio_receiver_sensitivity_fixed
 * @property string $radio_receiver_sensitivity_portable
 * @property string $radio_receiver_selectivity_fixed
 * @property string $radio_receiver_selectivity_portable
 * @property string $radio_receiver_intermediation_fixed
 * @property string $radio_receiver_intermediation_portable
 * @property string $radio_receiver_rejection_fixed
 * @property string $radio_receiver_rejection_portable
 * @property string $radio_antenna_type
 * @property string $radio_antenna_gain
 * @property string $radio_antenna_polarization
 * @property double $radio_antenna_azimuth
 * @property double $radio_antenna_angular
 * @property double $radio_antenna_height
 * @property double $radio_antenna_site_elevation
 * @property integer $radio_number_fixed
 * @property integer $radio_number_repeater
 * @property integer $radio_number_mobile
 * @property integer $radio_number_portable
 * @property double $radio_length
 * @property string $radio_area
 * @property string $radio_exact_antenna_site
 * @property string $radio_location_antenna
 * @property integer $radio_hours_from
 * @property integer $radio_hours_to
 * @property string $radio_other_remarks
 * @property integer $frequency_application_type_id
 * @property string $status
 */
class FrequencyApplication extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FrequencyApplication the static model class
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
		return 'frequency_application';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('application_date, declaration_date, declaration_signatory, declaration_designation, operator_id, frequency_application_type_id, status', 'required'),
			array('application_date,declaration_date', 'type', 'type' => 'date', 'message' => '{attribute}: is not a valid date!', 'dateFormat' => Yii::app()->locale->dateFormat),
			array('ship_certificate_issued, ship_certificate_done, amateur_type_id, amateur_possess_licence, amateur_pass_morse_test, aircraft_certificate_issued, aircraft_inspection_done, link_equipment_frequency_channels, link_antenna_make, link_channels, radio_equipment_fixed_unit, radio_equipment_portable_unit, radio_equipment_fixed_channels, radio_equipment_portable_channels, radio_equipment_type_id, radio_number_fixed, radio_number_repeater, radio_number_mobile, radio_number_portable, radio_hours_from, radio_hours_to, frequency_application_type_id', 'numerical', 'integerOnly'=>true),
			array('amateur_equipment_power, link_equipment_frequency_band, link_equipment_frequency_from, link_equipment_frequency_to, link_equipment_channel_capacity, link_equipment_power, link_antenna_receiving_gain, link_bandwidth, link_separation, link_transmission_capacity, radio_equipment_fixed_from, radio_equipment_fixed_to, radio_equipment_portable_from, radio_equipment_portable_to, radio_transmitter_power_fixed, radio_transmitter_power_portable, radio_transmitter_nominal_bandwidth_fixed, radio_transmitter_nominal_bandwidth_portable, radio_antenna_azimuth, radio_antenna_angular, radio_antenna_height, radio_antenna_site_elevation, radio_length', 'numerical'),
			array('declaration_signatory, purpose, ship_owner, ship_name, ship_registration_number, amateur_nationality, amateur_call_sign, amateur_issuing_authority, amateur_guardian_name, amateur_guardian_nationality, amateur_guardian_town, amateur_guardian_street, amateur_guardian_address, amateur_referee_1_name, amateur_referee_1_address, amateur_referee_1_town, amateur_referee_1_email, amateur_guardian_email, amateur_referee_2_name, amateur_referee_2_address, amateur_referee_2_town, amateur_referee_2_email, amateur_equipment_made, amateur_equipment_model, amateur_equipment_frequency_range, amateur_equipment_antenna_make, amateur_equipment_antenna_gain, amateur_guardian_sign_name, link_equipment_modulation_scheme, link_equipment_channelization_plan, link_supplier_email, link_channelization_plan, radio_equipment_make, radio_equipment_seller_name_address, radio_area,ship_type', 'length', 'max'=>50),
			array('declaration_designation, operator_id, amateur_passport_number, amateur_guardian_passport_number, amateur_referee_1_telephone, amateur_guardian_telephone, amateur_guardian_fax, amateur_referee_2_telephone, aircraft_type, link_supplier_telephone, link_supplier_fax, link_supplier_plot, radio_transmitter_stability_fixed, radio_transmitter_stability_portable', 'length', 'max'=>20),
			array('aircraft_owner, link_supplier_name_address, link_supplier_postal_address, link_supplier_physical_address, radio_exact_antenna_site, radio_other_remarks', 'length', 'max'=>100),
			array('aircraft_registration_number, link_type_licence, link_equipment_make, link_equipment_frequency_stability, link_equipment_emission, link_equipment_receiver_sensitivity, link_equipment_adjacent_channel_selectivity, link_supplier_street, radio_transmitter_modulation_fixed, radio_transmitter_modulation_portable, radio_transmitter_emission_fixed, radio_transmitter_emission_portable, radio_transmitter_harmonics_fixed, radio_transmitter_harmonics_portable, radio_receiver_sensitivity_fixed, radio_receiver_sensitivity_portable, radio_receiver_selectivity_fixed, radio_receiver_selectivity_portable, radio_receiver_intermediation_fixed, radio_receiver_intermediation_portable, radio_receiver_rejection_fixed, radio_receiver_rejection_portable, radio_antenna_type, radio_antenna_gain, radio_antenna_polarization, radio_location_antenna,status', 'length', 'max'=>30),
			array('link_remarks', 'length', 'max'=>200),
			array('amateur_date_birth, amateur_guardian_sign_date, link_proposed_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, application_date, declaration_date, declaration_signatory, declaration_designation, operator_id, purpose, ship_owner, ship_name, ship_registration_number, ship_certificate_issued, ship_certificate_done, amateur_type_id, amateur_nationality, amateur_passport_number, amateur_date_birth, amateur_possess_licence, amateur_call_sign, amateur_issuing_authority, amateur_guardian_name, amateur_guardian_nationality, amateur_guardian_passport_number, amateur_guardian_town, amateur_guardian_street, amateur_guardian_address, amateur_referee_1_name, amateur_referee_1_address, amateur_referee_1_town, amateur_referee_1_telephone, amateur_referee_1_email, amateur_guardian_telephone, amateur_guardian_email, amateur_guardian_fax, amateur_referee_2_name, amateur_referee_2_address, amateur_referee_2_town, amateur_referee_2_telephone, amateur_referee_2_email, amateur_equipment_made, amateur_equipment_model, amateur_equipment_frequency_range, amateur_equipment_power, amateur_equipment_antenna_make, amateur_equipment_antenna_gain, amateur_pass_morse_test, amateur_guardian_sign_date, amateur_guardian_sign_name, aircraft_owner, aircraft_type, aircraft_registration_number, aircraft_certificate_issued, aircraft_inspection_done, link_type_licence, link_equipment_make, link_equipment_frequency_band, link_equipment_frequency_from, link_equipment_frequency_to, link_equipment_channel_capacity, link_equipment_modulation_scheme, link_equipment_frequency_stability, link_equipment_power, link_equipment_emission, link_equipment_receiver_sensitivity, link_equipment_adjacent_channel_selectivity, link_equipment_frequency_channels, link_equipment_channelization_plan, link_antenna_make, link_antenna_receiving_gain, link_supplier_name_address, link_supplier_postal_address, link_supplier_telephone, link_supplier_fax, link_supplier_email, link_supplier_physical_address, link_supplier_street, link_supplier_plot, link_channels, link_bandwidth, link_separation, link_transmission_capacity, link_channelization_plan, link_proposed_date, link_remarks, radio_equipment_make, radio_equipment_seller_name_address, radio_equipment_fixed_from, radio_equipment_fixed_to, radio_equipment_portable_from, radio_equipment_portable_to, radio_equipment_fixed_unit, radio_equipment_portable_unit, radio_equipment_fixed_channels, radio_equipment_portable_channels, radio_equipment_type_id, radio_transmitter_power_fixed, radio_transmitter_power_portable, radio_transmitter_stability_fixed, radio_transmitter_stability_portable, radio_transmitter_nominal_bandwidth_fixed, radio_transmitter_nominal_bandwidth_portable, radio_transmitter_modulation_fixed, radio_transmitter_modulation_portable, radio_transmitter_emission_fixed, radio_transmitter_emission_portable, radio_transmitter_harmonics_fixed, radio_transmitter_harmonics_portable, radio_receiver_sensitivity_fixed, radio_receiver_sensitivity_portable, radio_receiver_selectivity_fixed, radio_receiver_selectivity_portable, radio_receiver_intermediation_fixed, radio_receiver_intermediation_portable, radio_receiver_rejection_fixed, radio_receiver_rejection_portable, radio_antenna_type, radio_antenna_gain, radio_antenna_polarization, radio_antenna_azimuth, radio_antenna_angular, radio_antenna_height, radio_antenna_site_elevation, radio_number_fixed, radio_number_repeater, radio_number_mobile, radio_number_portable, radio_length, radio_area, radio_exact_antenna_site, radio_location_antenna, radio_hours_from, radio_hours_to, radio_other_remarks, frequency_application_type_id', 'safe', 'on'=>'search'),
		);
	}
	public function behaviors()
	{
	    return array(
	    	'datetimeI18NBehavior' => array('class' => 'application.extensions.DateTimeI18NBehavior'),
	    	'ActiveRecordLogableBehavior'=>'application.behaviors.ActiveRecordLogableBehavior',
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
			'applicant'=>array(self::BELONGS_TO, 'Operator', 'operator_id','joinType'=>'INNER JOIN'),
			'amateurType'=>array(self::BELONGS_TO, 'AmateurType', 'amateur_type_id','joinType'=>'INNER JOIN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'application_date' => 'Application Date',
			'declaration_date' => 'Declaration Date',
			'declaration_signatory' => 'Declaration Signatory',
			'declaration_designation' => 'Declaration Designation',
			'operator_id' => 'Operator',
			'purpose' => 'Purpose',
			'ship_owner' => 'Ship Owner',
			'ship_name' => 'Ship Name',
			'ship_registration_number' => 'Ship Registration Number',
			'ship_certificate_issued' => 'Ship Certificate Issued',
			'ship_certificate_done' => 'Ship Certificate Done',
			'amateur_type_id' => 'Amateur Type',
			'amateur_nationality' => 'Amateur Nationality',
			'amateur_passport_number' => 'Amateur Passport Number',
			'amateur_date_birth' => 'Amateur Date Birth',
			'amateur_possess_licence' => 'Amateur Possess Licence',
			'amateur_call_sign' => 'Amateur Call Sign',
			'amateur_issuing_authority' => 'Amateur Issuing Authority',
			'amateur_guardian_name' => 'Amateur Guardian Name',
			'amateur_guardian_nationality' => 'Amateur Guardian Nationality',
			'amateur_guardian_passport_number' => 'Amateur Guardian Passport Number',
			'amateur_guardian_town' => 'Amateur Guardian Town',
			'amateur_guardian_street' => 'Amateur Guardian Street',
			'amateur_guardian_address' => 'Amateur Guardian Address',
			'amateur_referee_1_name' => 'Amateur Referee 1 Name',
			'amateur_referee_1_address' => 'Amateur Referee 1 Address',
			'amateur_referee_1_town' => 'Amateur Referee 1 Town',
			'amateur_referee_1_telephone' => 'Amateur Referee 1 Telephone',
			'amateur_referee_1_email' => 'Amateur Referee 1 Email',
			'amateur_guardian_telephone' => 'Amateur Guardian Telephone',
			'amateur_guardian_email' => 'Amateur Guardian Email',
			'amateur_guardian_fax' => 'Amateur Guardian Fax',
			'amateur_referee_2_name' => 'Amateur Referee 2 Name',
			'amateur_referee_2_address' => 'Amateur Referee 2 Address',
			'amateur_referee_2_town' => 'Amateur Referee 2 Town',
			'amateur_referee_2_telephone' => 'Amateur Referee 2 Telephone',
			'amateur_referee_2_email' => 'Amateur Referee 2 Email',
			'amateur_equipment_made' => 'Amateur Equipment Made',
			'amateur_equipment_model' => 'Amateur Equipment Model',
			'amateur_equipment_frequency_range' => 'Amateur Equipment Frequency Range',
			'amateur_equipment_power' => 'Amateur Equipment Power',
			'amateur_equipment_antenna_make' => 'Amateur Equipment Antenna Make',
			'amateur_equipment_antenna_gain' => 'Amateur Equipment Antenna Gain',
			'amateur_pass_morse_test' => 'Amateur Pass Morse Test',
			'amateur_guardian_sign_date' => 'Amateur Guardian Sign Date',
			'amateur_guardian_sign_name' => 'Amateur Guardian Sign Name',
			'aircraft_owner' => 'Aircraft Owner',
			'aircraft_type' => 'Aircraft Type',
			'aircraft_registration_number' => 'Aircraft Registration Number',
			'aircraft_certificate_issued' => 'Aircraft Certificate Issued',
			'aircraft_inspection_done' => 'Aircraft Inspection Done',
			'link_type_licence' => 'Link Type Licence',
			'link_equipment_make' => 'Link Equipment Make',
			'link_equipment_frequency_band' => 'Link Equipment Frequency Band',
			'link_equipment_frequency_from' => 'Link Equipment Frequency From',
			'link_equipment_frequency_to' => 'Link Equipment Frequency To',
			'link_equipment_channel_capacity' => 'Link Equipment Channel Capacity',
			'link_equipment_modulation_scheme' => 'Link Equipment Modulation Scheme',
			'link_equipment_frequency_stability' => 'Link Equipment Frequency Stability',
			'link_equipment_power' => 'Link Equipment Power',
			'link_equipment_emission' => 'Link Equipment Emission',
			'link_equipment_receiver_sensitivity' => 'Link Equipment Receiver Sensitivity',
			'link_equipment_adjacent_channel_selectivity' => 'Link Equipment Adjacent Channel Selectivity',
			'link_equipment_frequency_channels' => 'Link Equipment Frequency Channels',
			'link_equipment_channelization_plan' => 'Link Equipment Channelization Plan',
			'link_antenna_make' => 'Link Antenna Make',
			'link_antenna_receiving_gain' => 'Link Antenna Receiving Gain',
			'link_supplier_name_address' => 'Link Supplier Name Address',
			'link_supplier_postal_address' => 'Link Supplier Postal Address',
			'link_supplier_telephone' => 'Link Supplier Telephone',
			'link_supplier_fax' => 'Link Supplier Fax',
			'link_supplier_email' => 'Link Supplier Email',
			'link_supplier_physical_address' => 'Link Supplier Physical Address',
			'link_supplier_street' => 'Link Supplier Street',
			'link_supplier_plot' => 'Link Supplier Plot',
			'link_channels' => 'Link Channels',
			'link_bandwidth' => 'Link Bandwidth',
			'link_separation' => 'Link Separation',
			'link_transmission_capacity' => 'Link Transmission Capacity',
			'link_channelization_plan' => 'Link Channelization Plan',
			'link_proposed_date' => 'Link Proposed Date',
			'link_remarks' => 'Link Remarks',
			'radio_equipment_make' => 'Radio Equipment Make',
			'radio_equipment_seller_name_address' => 'Radio Equipment Seller Name Address',
			'radio_equipment_fixed_from' => 'Radio Equipment Fixed From',
			'radio_equipment_fixed_to' => 'Radio Equipment Fixed To',
			'radio_equipment_portable_from' => 'Radio Equipment Portable From',
			'radio_equipment_portable_to' => 'Radio Equipment Portable To',
			'radio_equipment_fixed_unit' => 'Radio Equipment Fixed Unit',
			'radio_equipment_portable_unit' => 'Radio Equipment Portable Unit',
			'radio_equipment_fixed_channels' => 'Radio Equipment Fixed Channels',
			'radio_equipment_portable_channels' => 'Radio Equipment Portable Channels',
			'radio_equipment_type_id' => 'Radio Equipment Type',
			'radio_transmitter_power_fixed' => 'Radio Transmitter Power Fixed',
			'radio_transmitter_power_portable' => 'Radio Transmitter Power Portable',
			'radio_transmitter_stability_fixed' => 'Radio Transmitter Stability Fixed',
			'radio_transmitter_stability_portable' => 'Radio Transmitter Stability Portable',
			'radio_transmitter_nominal_bandwidth_fixed' => 'Radio Transmitter Nominal Bandwidth Fixed',
			'radio_transmitter_nominal_bandwidth_portable' => 'Radio Transmitter Nominal Bandwidth Portable',
			'radio_transmitter_modulation_fixed' => 'Radio Transmitter Modulation Fixed',
			'radio_transmitter_modulation_portable' => 'Radio Transmitter Modulation Portable',
			'radio_transmitter_emission_fixed' => 'Radio Transmitter Emission Fixed',
			'radio_transmitter_emission_portable' => 'Radio Transmitter Emission Portable',
			'radio_transmitter_harmonics_fixed' => 'Radio Transmitter Harmonics Fixed',
			'radio_transmitter_harmonics_portable' => 'Radio Transmitter Harmonics Portable',
			'radio_receiver_sensitivity_fixed' => 'Radio Receiver Sensitivity Fixed',
			'radio_receiver_sensitivity_portable' => 'Radio Receiver Sensitivity Portable',
			'radio_receiver_selectivity_fixed' => 'Radio Receiver Selectivity Fixed',
			'radio_receiver_selectivity_portable' => 'Radio Receiver Selectivity Portable',
			'radio_receiver_intermediation_fixed' => 'Radio Receiver Intermediation Fixed',
			'radio_receiver_intermediation_portable' => 'Radio Receiver Intermediation Portable',
			'radio_receiver_rejection_fixed' => 'Radio Receiver Rejection Fixed',
			'radio_receiver_rejection_portable' => 'Radio Receiver Rejection Portable',
			'radio_antenna_type' => 'Radio Antenna Type',
			'radio_antenna_gain' => 'Radio Antenna Gain',
			'radio_antenna_polarization' => 'Radio Antenna Polarization',
			'radio_antenna_azimuth' => 'Radio Antenna Azimuth',
			'radio_antenna_angular' => 'Radio Antenna Angular',
			'radio_antenna_height' => 'Radio Antenna Height',
			'radio_antenna_site_elevation' => 'Radio Antenna Site Elevation',
			'radio_number_fixed' => 'Radio Number Fixed',
			'radio_number_repeater' => 'Radio Number Repeater',
			'radio_number_mobile' => 'Radio Number Mobile',
			'radio_number_portable' => 'Radio Number Portable',
			'radio_length' => 'Radio Length',
			'radio_area' => 'Radio Area',
			'radio_exact_antenna_site' => 'Radio Exact Antenna Site',
			'radio_location_antenna' => 'Radio Location Antenna',
			'radio_hours_from' => 'Radio Hours From',
			'radio_hours_to' => 'Radio Hours To',
			'radio_other_remarks' => 'Radio Other Remarks',
			'frequency_application_type_id' => 'Frequency Application Type',
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

		$criteria->compare('application_date',$this->application_date,true);

		$criteria->compare('declaration_date',$this->declaration_date,true);

		$criteria->compare('declaration_signatory',$this->declaration_signatory,true);

		$criteria->compare('declaration_designation',$this->declaration_designation,true);

		$criteria->compare('operator_id',$this->operator_id,true);

		$criteria->compare('purpose',$this->purpose,true);

		$criteria->compare('ship_owner',$this->ship_owner,true);

		$criteria->compare('ship_name',$this->ship_name,true);

		$criteria->compare('ship_registration_number',$this->ship_registration_number,true);

		$criteria->compare('ship_certificate_issued',$this->ship_certificate_issued);

		$criteria->compare('ship_certificate_done',$this->ship_certificate_done);

		$criteria->compare('amateur_type_id',$this->amateur_type_id);

		$criteria->compare('amateur_nationality',$this->amateur_nationality,true);

		$criteria->compare('amateur_passport_number',$this->amateur_passport_number,true);

		$criteria->compare('amateur_date_birth',$this->amateur_date_birth,true);

		$criteria->compare('amateur_possess_licence',$this->amateur_possess_licence);

		$criteria->compare('amateur_call_sign',$this->amateur_call_sign,true);

		$criteria->compare('amateur_issuing_authority',$this->amateur_issuing_authority,true);

		$criteria->compare('amateur_guardian_name',$this->amateur_guardian_name,true);

		$criteria->compare('amateur_guardian_nationality',$this->amateur_guardian_nationality,true);

		$criteria->compare('amateur_guardian_passport_number',$this->amateur_guardian_passport_number,true);

		$criteria->compare('amateur_guardian_town',$this->amateur_guardian_town,true);

		$criteria->compare('amateur_guardian_street',$this->amateur_guardian_street,true);

		$criteria->compare('amateur_guardian_address',$this->amateur_guardian_address,true);

		$criteria->compare('amateur_referee_1_name',$this->amateur_referee_1_name,true);

		$criteria->compare('amateur_referee_1_address',$this->amateur_referee_1_address,true);

		$criteria->compare('amateur_referee_1_town',$this->amateur_referee_1_town,true);

		$criteria->compare('amateur_referee_1_telephone',$this->amateur_referee_1_telephone,true);

		$criteria->compare('amateur_referee_1_email',$this->amateur_referee_1_email,true);

		$criteria->compare('amateur_guardian_telephone',$this->amateur_guardian_telephone,true);

		$criteria->compare('amateur_guardian_email',$this->amateur_guardian_email,true);

		$criteria->compare('amateur_guardian_fax',$this->amateur_guardian_fax,true);

		$criteria->compare('amateur_referee_2_name',$this->amateur_referee_2_name,true);

		$criteria->compare('amateur_referee_2_address',$this->amateur_referee_2_address,true);

		$criteria->compare('amateur_referee_2_town',$this->amateur_referee_2_town,true);

		$criteria->compare('amateur_referee_2_telephone',$this->amateur_referee_2_telephone,true);

		$criteria->compare('amateur_referee_2_email',$this->amateur_referee_2_email,true);

		$criteria->compare('amateur_equipment_made',$this->amateur_equipment_made,true);

		$criteria->compare('amateur_equipment_model',$this->amateur_equipment_model,true);

		$criteria->compare('amateur_equipment_frequency_range',$this->amateur_equipment_frequency_range,true);

		$criteria->compare('amateur_equipment_power',$this->amateur_equipment_power);

		$criteria->compare('amateur_equipment_antenna_make',$this->amateur_equipment_antenna_make,true);

		$criteria->compare('amateur_equipment_antenna_gain',$this->amateur_equipment_antenna_gain,true);

		$criteria->compare('amateur_pass_morse_test',$this->amateur_pass_morse_test);

		$criteria->compare('amateur_guardian_sign_date',$this->amateur_guardian_sign_date,true);

		$criteria->compare('amateur_guardian_sign_name',$this->amateur_guardian_sign_name,true);

		$criteria->compare('aircraft_owner',$this->aircraft_owner,true);

		$criteria->compare('aircraft_type',$this->aircraft_type,true);

		$criteria->compare('aircraft_registration_number',$this->aircraft_registration_number,true);

		$criteria->compare('aircraft_certificate_issued',$this->aircraft_certificate_issued);

		$criteria->compare('aircraft_inspection_done',$this->aircraft_inspection_done);

		$criteria->compare('link_type_licence',$this->link_type_licence,true);

		$criteria->compare('link_equipment_make',$this->link_equipment_make,true);

		$criteria->compare('link_equipment_frequency_band',$this->link_equipment_frequency_band);

		$criteria->compare('link_equipment_frequency_from',$this->link_equipment_frequency_from);

		$criteria->compare('link_equipment_frequency_to',$this->link_equipment_frequency_to);

		$criteria->compare('link_equipment_channel_capacity',$this->link_equipment_channel_capacity);

		$criteria->compare('link_equipment_modulation_scheme',$this->link_equipment_modulation_scheme,true);

		$criteria->compare('link_equipment_frequency_stability',$this->link_equipment_frequency_stability,true);

		$criteria->compare('link_equipment_power',$this->link_equipment_power);

		$criteria->compare('link_equipment_emission',$this->link_equipment_emission,true);

		$criteria->compare('link_equipment_receiver_sensitivity',$this->link_equipment_receiver_sensitivity,true);

		$criteria->compare('link_equipment_adjacent_channel_selectivity',$this->link_equipment_adjacent_channel_selectivity,true);

		$criteria->compare('link_equipment_frequency_channels',$this->link_equipment_frequency_channels);

		$criteria->compare('link_equipment_channelization_plan',$this->link_equipment_channelization_plan,true);

		$criteria->compare('link_antenna_make',$this->link_antenna_make);

		$criteria->compare('link_antenna_receiving_gain',$this->link_antenna_receiving_gain);

		$criteria->compare('link_supplier_name_address',$this->link_supplier_name_address,true);

		$criteria->compare('link_supplier_postal_address',$this->link_supplier_postal_address,true);

		$criteria->compare('link_supplier_telephone',$this->link_supplier_telephone,true);

		$criteria->compare('link_supplier_fax',$this->link_supplier_fax,true);

		$criteria->compare('link_supplier_email',$this->link_supplier_email,true);

		$criteria->compare('link_supplier_physical_address',$this->link_supplier_physical_address,true);

		$criteria->compare('link_supplier_street',$this->link_supplier_street,true);

		$criteria->compare('link_supplier_plot',$this->link_supplier_plot,true);

		$criteria->compare('link_channels',$this->link_channels);

		$criteria->compare('link_bandwidth',$this->link_bandwidth);

		$criteria->compare('link_separation',$this->link_separation);

		$criteria->compare('link_transmission_capacity',$this->link_transmission_capacity);

		$criteria->compare('link_channelization_plan',$this->link_channelization_plan,true);

		$criteria->compare('link_proposed_date',$this->link_proposed_date,true);

		$criteria->compare('link_remarks',$this->link_remarks,true);

		$criteria->compare('radio_equipment_make',$this->radio_equipment_make,true);

		$criteria->compare('radio_equipment_seller_name_address',$this->radio_equipment_seller_name_address,true);

		$criteria->compare('radio_equipment_fixed_from',$this->radio_equipment_fixed_from);

		$criteria->compare('radio_equipment_fixed_to',$this->radio_equipment_fixed_to);

		$criteria->compare('radio_equipment_portable_from',$this->radio_equipment_portable_from);

		$criteria->compare('radio_equipment_portable_to',$this->radio_equipment_portable_to);

		$criteria->compare('radio_equipment_fixed_unit',$this->radio_equipment_fixed_unit);

		$criteria->compare('radio_equipment_portable_unit',$this->radio_equipment_portable_unit);

		$criteria->compare('radio_equipment_fixed_channels',$this->radio_equipment_fixed_channels);

		$criteria->compare('radio_equipment_portable_channels',$this->radio_equipment_portable_channels);

		$criteria->compare('radio_equipment_type_id',$this->radio_equipment_type_id);

		$criteria->compare('radio_transmitter_power_fixed',$this->radio_transmitter_power_fixed);

		$criteria->compare('radio_transmitter_power_portable',$this->radio_transmitter_power_portable);

		$criteria->compare('radio_transmitter_stability_fixed',$this->radio_transmitter_stability_fixed,true);

		$criteria->compare('radio_transmitter_stability_portable',$this->radio_transmitter_stability_portable,true);

		$criteria->compare('radio_transmitter_nominal_bandwidth_fixed',$this->radio_transmitter_nominal_bandwidth_fixed);

		$criteria->compare('radio_transmitter_nominal_bandwidth_portable',$this->radio_transmitter_nominal_bandwidth_portable);

		$criteria->compare('radio_transmitter_modulation_fixed',$this->radio_transmitter_modulation_fixed,true);

		$criteria->compare('radio_transmitter_modulation_portable',$this->radio_transmitter_modulation_portable,true);

		$criteria->compare('radio_transmitter_emission_fixed',$this->radio_transmitter_emission_fixed,true);

		$criteria->compare('radio_transmitter_emission_portable',$this->radio_transmitter_emission_portable,true);

		$criteria->compare('radio_transmitter_harmonics_fixed',$this->radio_transmitter_harmonics_fixed,true);

		$criteria->compare('radio_transmitter_harmonics_portable',$this->radio_transmitter_harmonics_portable,true);

		$criteria->compare('radio_receiver_sensitivity_fixed',$this->radio_receiver_sensitivity_fixed,true);

		$criteria->compare('radio_receiver_sensitivity_portable',$this->radio_receiver_sensitivity_portable,true);

		$criteria->compare('radio_receiver_selectivity_fixed',$this->radio_receiver_selectivity_fixed,true);

		$criteria->compare('radio_receiver_selectivity_portable',$this->radio_receiver_selectivity_portable,true);

		$criteria->compare('radio_receiver_intermediation_fixed',$this->radio_receiver_intermediation_fixed,true);

		$criteria->compare('radio_receiver_intermediation_portable',$this->radio_receiver_intermediation_portable,true);

		$criteria->compare('radio_receiver_rejection_fixed',$this->radio_receiver_rejection_fixed,true);

		$criteria->compare('radio_receiver_rejection_portable',$this->radio_receiver_rejection_portable,true);

		$criteria->compare('radio_antenna_type',$this->radio_antenna_type,true);

		$criteria->compare('radio_antenna_gain',$this->radio_antenna_gain,true);

		$criteria->compare('radio_antenna_polarization',$this->radio_antenna_polarization,true);

		$criteria->compare('radio_antenna_azimuth',$this->radio_antenna_azimuth);

		$criteria->compare('radio_antenna_angular',$this->radio_antenna_angular);

		$criteria->compare('radio_antenna_height',$this->radio_antenna_height);

		$criteria->compare('radio_antenna_site_elevation',$this->radio_antenna_site_elevation);

		$criteria->compare('radio_number_fixed',$this->radio_number_fixed);

		$criteria->compare('radio_number_repeater',$this->radio_number_repeater);

		$criteria->compare('radio_number_mobile',$this->radio_number_mobile);

		$criteria->compare('radio_number_portable',$this->radio_number_portable);

		$criteria->compare('radio_length',$this->radio_length);

		$criteria->compare('radio_area',$this->radio_area,true);

		$criteria->compare('radio_exact_antenna_site',$this->radio_exact_antenna_site,true);

		$criteria->compare('radio_location_antenna',$this->radio_location_antenna,true);

		$criteria->compare('radio_hours_from',$this->radio_hours_from);

		$criteria->compare('radio_hours_to',$this->radio_hours_to);

		$criteria->compare('radio_other_remarks',$this->radio_other_remarks,true);

		$criteria->compare('frequency_application_type_id',$this->frequency_application_type_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
