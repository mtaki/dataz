<?php

/**
 * This is the model class for table "complaint_party".
 *
 * The followings are the available columns in table 'complaint_party':
 * @property string $id
 * @property string $name
 * @property string $address
 * @property string $occupation
 * @property string $mobile
 * @property string $telephone
 * @property string $email
 */
class ComplaintParty extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ComplaintParty the static model class
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
		return 'complaint_party';
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
			array('name, address, occupation, mobile, telephone, email', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, address, occupation, mobile, telephone, email', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'address' => 'Address',
			'occupation' => 'Occupation',
			'mobile' => 'Mobile',
			'telephone' => 'Telephone',
			'email' => 'Email',
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

		$criteria->compare('name',$this->name,true);

		$criteria->compare('address',$this->address,true);

		$criteria->compare('occupation',$this->occupation,true);

		$criteria->compare('mobile',$this->mobile,true);

		$criteria->compare('telephone',$this->telephone,true);

		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider('ComplaintParty', array(
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