<?php

/**
 * This is the model class for table "frequency_station_sub_type".
 *
 * The followings are the available columns in table 'frequency_station_sub_type':
 * @property string $id
 * @property string $name
 * @property string $station_type_id
 * @property string $fee
 * @property string $fee_currency
 * @property string $formula
 * @property integer $grouped
 */
class FrequencyStationSubType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FrequencyStationSubType the static model class
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
		return 'frequency_station_sub_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, station_type_id, fee_currency', 'required'),
			array('grouped', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('station_type_id, fee_currency', 'length', 'max'=>20),
			array('fee', 'length', 'max'=>38),
			array('formula', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, station_type_id, fee, fee_currency, formula, grouped', 'safe', 'on'=>'search'),
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
			'station_type_id' => 'Station Type',
			'fee' => 'Fee',
			'fee_currency' => 'Fee Currency',
			'formula' => 'Formula',
			'grouped' => 'Grouped',
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

		$criteria->compare('station_type_id',$this->station_type_id,true);

		$criteria->compare('fee',$this->fee,true);

		$criteria->compare('fee_currency',$this->fee_currency,true);

		$criteria->compare('formula',$this->formula,true);

		$criteria->compare('grouped',$this->grouped);

		return new CActiveDataProvider('FrequencyStationSubType', array(
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