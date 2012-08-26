<?php

/**
 * This is the model class for table "numbering_fee".
 *
 * The followings are the available columns in table 'numbering_fee':
 * @property string $id
 * @property string $numbering_fee_type_id
 * @property string $registration_fee
 * @property string $registration_fee_currency_id
 * @property string $annual_fee
 * @property string $annual_fee_currency_id
 * @property string $subscriber_fee
 */
class NumberingFee extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return NumberingFee the static model class
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
		return 'numbering_fee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('numbering_fee_type_id, registration_fee_currency_id, annual_fee_currency_id', 'length', 'max'=>20),
			array('registration_fee, annual_fee, subscriber_fee', 'length', 'max'=>38),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, numbering_fee_type_id, registration_fee, registration_fee_currency_id, annual_fee, annual_fee_currency_id, subscriber_fee', 'safe', 'on'=>'search'),
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
			'registrationFeeCurrency'=>array(self::BELONGS_TO, 'Currency', 'registration_fee_currency_id','joinType'=>'INNER JOIN'),
			'annualFeeCurrency'=>array(self::BELONGS_TO, 'Currency', 'annual_fee_currency_id','joinType'=>'INNER JOIN'),
			'type'=>array(self::BELONGS_TO, 'NumberingFeeType', 'numbering_fee_type_id','joinType'=>'INNER JOIN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'numbering_fee_type_id' => 'Type',
			'registration_fee' => 'Registration Fee',
			'registration_fee_currency_id' => 'Registration Fee Currency',
			'annual_fee' => 'Annual Fee',
			'annual_fee_currency_id' => 'Annual Fee Currency',
			'subscriber_fee' => 'Subscriber Fee',
			'type.name'=>'Name',
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

		$criteria->compare('numbering_fee_type_id',$this->numbering_fee_type_id,true);

		$criteria->compare('registration_fee',$this->registration_fee,true);

		$criteria->compare('registration_fee_currency_id',$this->registration_fee_currency_id,true);

		$criteria->compare('annual_fee',$this->annual_fee,true);

		$criteria->compare('annual_fee_currency_id',$this->annual_fee_currency_id,true);

		$criteria->compare('subscriber_fee',$this->subscriber_fee,true);

		return new CActiveDataProvider('NumberingFee', array(
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