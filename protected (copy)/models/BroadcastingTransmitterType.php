<?php

/**
 * This is the model class for table "broadcasting_transmitter_type".
 *
 * The followings are the available columns in table 'broadcasting_transmitter_type':
 * @property integer $id
 * @property string $code
 * @property string $description
 * @property double $annual_fee
 * @property integer $annual_fee_currency_id
 */
class BroadcastingTransmitterType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return BroadcastingTransmitterType the static model class
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
		return 'broadcasting_transmitter_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code, description, annual_fee, annual_fee_currency_id', 'required'),
			array('annual_fee_currency_id', 'numerical', 'integerOnly'=>true),
			array('annual_fee', 'numerical'),
			array('code', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, code, description, annual_fee, annual_fee_currency_id', 'safe', 'on'=>'search'),
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
		'annualCurrency'=>array(self::BELONGS_TO, 'Currency', 'annual_fee_currency_id','joinType'=>'INNER JOIN'),
		
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'code' => 'Code',
			'description' => 'Description',
			'annual_fee' => 'Annual Fee',
			'annual_fee_currency_id' => 'Annual Fee Currency',
			'annualCurrency.name'=>'Currency',
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

		$criteria->compare('id',$this->id);

		$criteria->compare('code',$this->code,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('annual_fee',$this->annual_fee);

		$criteria->compare('annual_fee_currency_id',$this->annual_fee_currency_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}