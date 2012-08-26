<?php

/**
 * This is the model class for table "licence_fee".
 *
 * The followings are the available columns in table 'licence_fee':
 * @property string $id
 * @property string $licence_category_id
 * @property string $type_service
 * @property string $application_fee
 * @property string $application_fee_currency_id
 * @property string $initial_fee
 * @property string $initial_fee_currency_id
 * @property string $annual_fee
 * @property string $annual_fee_currency_id
 * @property string $duration
 * @property string $type_of_licence
 * @property string $market_segment_id
 * @property string $annual_fee_is_percentage
 */
class LicenceFee extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return LicenceFee the static model class
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
		return 'licence_fee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('licence_category_id, application_fee_currency_id, initial_fee_currency_id, annual_fee_currency_id, market_segment_id', 'length', 'max'=>20),
			array('type_service', 'length', 'max'=>100),
			array('application_fee, initial_fee, annual_fee', 'length', 'max'=>38),
			array('initial_public, initial_commercial, initial_non_commercial,initial_community', 'length', 'max'=>38),
			array('annual_public, annual_commercial, annual_non_commercial,annual_community', 'length', 'max'=>38),
			array('duration, annual_fee_is_percentage', 'length', 'max'=>10),
			array('type_of_licence', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, licence_category_id, type_service, application_fee, application_fee_currency_id, initial_fee, initial_fee_currency_id, annual_fee, annual_fee_currency_id, duration, type_of_licence, market_segment_id, annual_fee_is_percentage', 'safe', 'on'=>'search'),
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
			'licenceCategory'=>array(self::BELONGS_TO, 'LicenceCategory', 'licence_category_id','joinType'=>'INNER JOIN'),
			'applicationFeeCurrency'=>array(self::BELONGS_TO, 'Currency', 'application_fee_currency_id','joinType'=>'INNER JOIN'),
			'initialFeeCurrency'=>array(self::BELONGS_TO, 'Currency', 'initial_fee_currency_id','joinType'=>'INNER JOIN'),
			'annualFeeCurrency'=>array(self::BELONGS_TO, 'Currency', 'annual_fee_currency_id','joinType'=>'INNER JOIN'),
			'marketSegment'=>array(self::BELONGS_TO, 'MarketSegment', 'market_segment_id','joinType'=>'INNER JOIN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'licence_category_id' => 'Licence Type',
			'type_service' => 'Type Service',
			'application_fee' => 'Application Fee',
			'application_fee_currency_id' => 'Application Fee Currency',
			'initial_fee' => 'Initial Fee',
			'initial_fee_currency_id' => 'Initial Fee Currency',
			'annual_fee' => 'Annual Fee',
			'annual_fee_currency_id' => 'Annual Fee Currency',
			'duration' => 'Duration',
			'type_of_licence' => 'Type Of Licence',
			'market_segment_id' => 'Market Segment',
			'annual_fee_is_percentage' => 'Annual Fee Is Percentage',
			'licenceCategory.name'=>'Licence Type',
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
		$criteria->with=array('licenceCategory','marketSegment');
		$criteria->compare('id',$this->id,true);

		$criteria->compare('t.licence_category_id',$this->licence_category_id,false);
		
		$criteria->compare('t.type_service',$this->type_service,true);

		$criteria->compare('application_fee',$this->application_fee,true);

		$criteria->compare('application_fee_currency_id',$this->application_fee_currency_id,true);

		$criteria->compare('initial_fee',$this->initial_fee,true);

		$criteria->compare('initial_fee_currency_id',$this->initial_fee_currency_id,true);

		$criteria->compare('t.annual_fee',$this->annual_fee,true);

		$criteria->compare('t.annual_fee_currency_id',$this->annual_fee_currency_id,true);

		$criteria->compare('t.duration',$this->duration,true);

		$criteria->compare('t.type_of_licence',$this->type_of_licence,true);

		$criteria->compare('t.market_segment_id',$this->market_segment_id,true);

		$criteria->compare('annual_fee_is_percentage',$this->annual_fee_is_percentage,true);

		return new CActiveDataProvider('LicenceFee', array(
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
