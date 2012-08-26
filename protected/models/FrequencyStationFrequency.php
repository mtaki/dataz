<?php

/**
 * This is the model class for table "frequency_station_frequency".
 *
 * The followings are the available columns in table 'frequency_station_frequency':
 * @property string $id
 * @property string $station_id
 * @property string $frequency
 * @property integer $frequency_unit
 */
class FrequencyStationFrequency extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FrequencyStationFrequency the static model class
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
		return 'frequency_station_frequency';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('station_id, frequency, frequency_unit', 'required'),
			array('frequency_unit', 'numerical', 'integerOnly'=>true),
			array('station_id', 'length', 'max'=>20),
			array('frequency', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, station_id, frequency, frequency_unit', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'station_id' => 'Station',
			'frequency' => 'Frequency',
			'frequency_unit' => 'Frequency Unit',
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

		$criteria->compare('station_id',$this->station_id,true);

		$criteria->compare('frequency',$this->frequency,true);

		$criteria->compare('frequency_unit',$this->frequency_unit);

		return new CActiveDataProvider(get_class($this), array(
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