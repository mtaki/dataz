<?php

/**
 * This is the model class for table "vsat_operation_address".
 *
 * The followings are the available columns in table 'vsat_operation_address':
 * @property string $operation_name
 * @property string $phone_no
 * @property string $operator_company_name
 * @property string $fax_no
 * @property string $contry_of_registry
 * @property string $city_address
 * @property string $district
 * @property string $country
 * @property string $application_vsat_id
 */
class VsatOperationAddress extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return VsatOperationAddress the static model class
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
		return 'vsat_operation_address';
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
			array('operation_name, operator_company_name, city_address', 'length', 'max'=>100),
			array('phone_no, fax_no, contry_of_registry, district, country', 'length', 'max'=>45),
			array('application_vsat_id', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('operation_name, phone_no, operator_company_name, fax_no, contry_of_registry, city_address, district, country, application_vsat_id', 'safe', 'on'=>'search'),
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
			'operation_name' => 'Operation Name',
			'phone_no' => 'Phone No',
			'operator_company_name' => 'Operator Company Name',
			'fax_no' => 'Fax No',
			'contry_of_registry' => 'Contry Of Registry',
			'city_address' => 'City Address',
			'district' => 'District',
			'country' => 'Country',
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

		$criteria->compare('operation_name',$this->operation_name,true);

		$criteria->compare('phone_no',$this->phone_no,true);

		$criteria->compare('operator_company_name',$this->operator_company_name,true);

		$criteria->compare('fax_no',$this->fax_no,true);

		$criteria->compare('contry_of_registry',$this->contry_of_registry,true);

		$criteria->compare('city_address',$this->city_address,true);

		$criteria->compare('district',$this->district,true);

		$criteria->compare('country',$this->country,true);

		$criteria->compare('application_vsat_id',$this->application_vsat_id,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}