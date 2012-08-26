<?php

/**
 * This is the model class for table "frequency_station_equipment".
 *
 * The followings are the available columns in table 'frequency_station_equipment':
 * @property string $id
 * @property string $station_id
 * @property string $frequency_type
 * @property string $equipment_type
 * @property string $make
 * @property string $manufacturer
 */
class FrequencyStationEquipment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FrequencyStationEquipment the static model class
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
		return 'frequency_station_equipment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('station_id, frequency_type, equipment_type, make, manufacturer', 'required'),
			array('station_id, equipment_type', 'length', 'max'=>20),
			array('frequency_type', 'length', 'max'=>10),
			array('make, manufacturer', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, station_id, frequency_type, equipment_type, make, manufacturer', 'safe', 'on'=>'search'),
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
			'frequency_type' => 'Frequency Type',
			'equipment_type' => 'Equipment Type',
			'make' => 'Make',
			'manufacturer' => 'Manufacturer',
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

		$criteria->compare('frequency_type',$this->frequency_type,true);

		$criteria->compare('equipment_type',$this->equipment_type,true);

		$criteria->compare('make',$this->make,true);

		$criteria->compare('manufacturer',$this->manufacturer,true);

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