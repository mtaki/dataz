<?php

/**
 * This is the model class for table "statistics_postal_money".
 *
 * The followings are the available columns in table 'statistics_postal_money':
 * @property string $main_id
 * @property string $service_id
 * @property string $customers
 * @property double $amount
 */
class StatisticsPostalMoney extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return StatisticsPostalMoney the static model class
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
		return 'statistics_postal_money';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('main_id, service_id, customers, amount', 'required'),
			array('amount', 'numerical'),
			array('main_id, service_id, customers', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('main_id, service_id, customers, amount', 'safe', 'on'=>'search'),
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
			'main_id' => 'Main',
			'service_id' => 'Service',
			'customers' => 'Customers',
			'amount' => 'Amount',
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

		$criteria->compare('main_id',$this->main_id,true);

		$criteria->compare('service_id',$this->service_id,true);

		$criteria->compare('customers',$this->customers,true);

		$criteria->compare('amount',$this->amount);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}