<?php

/**
 * This is the model class for table "operator".
 *
 * The followings are the available columns in table 'operator':
 * @property string $id
 * @property string $name
 * @property string $telephone
 * @property string $fax
 * @property string $email
 * @property string $website
 * @property string $town
 * @property string $street
 * @property string $plot_no
 * @property string $share_capital
 * @property string $contact_person
 * @property string $location
 * @property string $address
 * @property string $mobile
 * @property string $type_name_business
 * @property string $business_registration_number
 * @property string $registration_place
 * @property string $registration_date
 * @property string $tin
 * @property string $certificate_incorporation
 * @property string $certificate_place
 * @property string $certificate_date
 * @property string $customer_code
 * @property string $country
 * @property string $operator_type_id
 * @property string $occupation
 * @property string $contact_person_2
 * @property integer $postal_code
 */
class Operator extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Operator the static model class
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
		return 'operator';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('postal_code', 'numerical', 'integerOnly'=>true),
			array('name, telephone, fax, email, town, street, plot_no, location, mobile, type_name_business, business_registration_number, registration_place, tin, certificate_incorporation, certificate_place, customer_code, country, occupation', 'length', 'max'=>50),
			array('share_capital', 'length', 'max'=>38),
			array('contact_person, address, contact_person_2,website', 'length', 'max'=>100),
			array('operator_type_id', 'length', 'max'=>20),
			array('registration_date, certificate_date', 'safe'),
			array('registration_date, certificate_date', 'type', 'type' => 'date', 'message' => '{attribute}: is not a valid date!', 'dateFormat' => 'dd-MM-yyyy'),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, telephone, fax, email, town, street, plot_no, share_capital, contact_person, location, address, mobile, type_name_business, business_registration_number, registration_place, registration_date, tin, certificate_incorporation, certificate_place, certificate_date, customer_code, country, operator_type_id, occupation, contact_person_2, postal_code', 'safe', 'on'=>'search'),
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
			'shareHolders'=>array(self::HAS_MANY, 'ShareHolder', 'operator_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'name' => 'Name',
			'telephone' => 'Telephone',
			'fax' => 'Fax',
			'email' => 'Email',
			'website' => 'Website',
			'town' => 'Town',
			'street' => 'Street',
			'plot_no' => 'Plot No',
			'share_capital' => 'Share Capital',
			'contact_person' => 'Contact Person',
			'location' => 'Location',
			'address' => 'Address',
			'mobile' => 'Mobile',
			'type_name_business' => 'Type Name Business',
			'business_registration_number' => 'Business Registration Number',
			'registration_place' => 'Registration Place',
			'registration_date' => 'Registration Date',
			'tin' => 'Tin',
			'certificate_incorporation' => 'Certificate Incorporation',
			'certificate_place' => 'Certificate Place',
			'certificate_date' => 'Certificate Date',
			'customer_code' => 'Customer Code',
			'country' => 'Country',
			'operator_type_id' => 'Operator Type',
			'occupation' => 'Occupation',
			'contact_person_2' => 'Contact Person 2',
			'postal_code' => 'Postal Code',
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

		$criteria->compare('id',$this->id,false);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('telephone',$this->telephone,true);

		$criteria->compare('fax',$this->fax,true);

		$criteria->compare('email',$this->email,true);

		$criteria->compare('town',$this->town,true);

		$criteria->compare('street',$this->street,true);

		$criteria->compare('plot_no',$this->plot_no,true);

		$criteria->compare('share_capital',$this->share_capital,true);

		$criteria->compare('contact_person',$this->contact_person,true);

		$criteria->compare('location',$this->location,true);

		$criteria->compare('address',$this->address,true);

		$criteria->compare('mobile',$this->mobile,true);

		$criteria->compare('type_name_business',$this->type_name_business,true);

		$criteria->compare('business_registration_number',$this->business_registration_number,true);

		$criteria->compare('registration_place',$this->registration_place,true);

		$criteria->compare('registration_date',$this->registration_date,true);

		$criteria->compare('tin',$this->tin,true);

		$criteria->compare('certificate_incorporation',$this->certificate_incorporation,true);

		$criteria->compare('certificate_place',$this->certificate_place,true);

		$criteria->compare('certificate_date',$this->certificate_date,true);

		$criteria->compare('customer_code',$this->customer_code,true);

		$criteria->compare('country',$this->country,true);

		$criteria->compare('operator_type_id',$this->operator_type_id,true);

		$criteria->compare('occupation',$this->occupation,true);

		$criteria->compare('contact_person_2',$this->contact_person_2,true);

		$criteria->compare('postal_code',$this->postal_code);
		if (Yii::app()->controller->action->id=='licenceeList'){
			$criteria->addCondition("id in (select distinct operator_id from licence_application where is_licence=1)", 'AND');
		}
		return new CActiveDataProvider('Operator', array(
			'criteria'=>$criteria,
		));
	}
	
	public function behaviors()
	{
	    return array('datetimeI18NBehavior' => array('class' => 'application.extensions.DateTimeI18NBehavior'),
	    		'ActiveRecordLogableBehavior'=>'application.behaviors.ActiveRecordLogableBehavior'
	    ); 
	}

}
