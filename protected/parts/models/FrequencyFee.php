<?php

/**
 * This is the model class for table "frequency_fee".
 *
 * The followings are the available columns in table 'frequency_fee':
 * @property integer $id
 * @property string $band
 * @property string $description
 * @property double $fee
 * @property integer $fee_currency_id
 * @property integer $duration
 */
class FrequencyFee extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FrequencyFee the static model class
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
		return 'frequency_fee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('band, description, fee, fee_currency_id, duration', 'required'),
			array('fee_currency_id, duration', 'numerical', 'integerOnly'=>true),
			array('fee', 'numerical'),
			array('band', 'length', 'max'=>10),
			array('description', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, band, description, fee, fee_currency_id, duration', 'safe', 'on'=>'search'),
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
			'band' => 'Band',
			'description' => 'Description',
			'fee' => 'Fee',
			'feeCurrency.name' => 'Currency',
			'duration' => 'Duration',
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

		$criteria->compare('band',$this->band,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('fee',$this->fee);

		$criteria->compare('fee_currency_id',$this->fee_currency_id);

		$criteria->compare('duration',$this->duration);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}