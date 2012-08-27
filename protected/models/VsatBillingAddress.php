<?php

/**
 * This is the model class for table "vsat_billing_address".
 *
 * The followings are the available columns in table 'vsat_billing_address':
 * @property string $name_of_accounting
 * @property string $a_phone_no
 * @property string $a_fax_no
 * @property string $name_of_sp
 * @property string $sp_phone_no
 * @property string $sp_fax_no
 * @property string $application_vsat_id
 */
class VsatBillingAddress extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return VsatBillingAddress the static model class
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
		return 'vsat_billing_address';
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
			array('name_of_accounting', 'length', 'max'=>100),
			array('a_phone_no, a_fax_no, name_of_sp, sp_phone_no, sp_fax_no', 'length', 'max'=>45),
			array('application_vsat_id', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('name_of_accounting, a_phone_no, a_fax_no, name_of_sp, sp_phone_no, sp_fax_no, application_vsat_id', 'safe', 'on'=>'search'),
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
			'name_of_accounting' => 'Name Of Accounting',
			'a_phone_no' => 'A Phone No',
			'a_fax_no' => 'A Fax No',
			'name_of_sp' => 'Name Of Sp',
			'sp_phone_no' => 'Sp Phone No',
			'sp_fax_no' => 'Sp Fax No',
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

		$criteria->compare('name_of_accounting',$this->name_of_accounting,true);

		$criteria->compare('a_phone_no',$this->a_phone_no,true);

		$criteria->compare('a_fax_no',$this->a_fax_no,true);

		$criteria->compare('name_of_sp',$this->name_of_sp,true);

		$criteria->compare('sp_phone_no',$this->sp_phone_no,true);

		$criteria->compare('sp_fax_no',$this->sp_fax_no,true);

		$criteria->compare('application_vsat_id',$this->application_vsat_id,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}