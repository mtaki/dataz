<?php

/**
 * This is the model class for table "other_fee".
 *
 * The followings are the available columns in table 'other_fee':
 * @property integer $id
 * @property string $code
 * @property double $fee
 * @property integer $fee_currency_id
 */
class OtherFee extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OtherFee the static model class
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
		return 'other_fee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code, fee, fee_currency_id', 'required'),
			array('fee_currency_id', 'numerical', 'integerOnly'=>true),
			array('fee', 'numerical'),
			array('code', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, code, fee, fee_currency_id', 'safe', 'on'=>'search'),
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
		'feeCurrency'=>array(self::BELONGS_TO, 'Currency', 'fee_currency_id','joinType'=>'INNER JOIN'),
		
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
			'fee' => 'Fee',
			'fee_currency_id' => 'Fee Currency',
			'feeCurrency.name' => 'Currency',
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

		$criteria->compare('fee',$this->fee);

		$criteria->compare('fee_currency_id',$this->fee_currency_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}