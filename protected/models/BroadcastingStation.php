<?php

/**
 * This is the model class for table "broadcasting_station".
 *
 * The followings are the available columns in table 'broadcasting_station':
 * @property string $id
 * @property string $name
 * @property string $longitude
 * @property string $latitude
 * @property string $region_id
 * @property string $district_id
 * @property string $station_type_id
 * @property string $operator_id
 */
class BroadcastingStation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return BroadcastingStation the static model class
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
		return 'broadcasting_station';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, station_type_id, operator_id', 'required'),
			array('name', 'length', 'max'=>50),
			array('region_id, district_id, station_type_id, operator_id', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name,  region_id, district_id, station_type_id, operator_id', 'safe', 'on'=>'search'),
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
			'operator' => array(self::BELONGS_TO, 'Operator', 'operator_id'),
			'region' => array(self::BELONGS_TO, 'Region', 'region_id'),
			'stationType' => array(self::BELONGS_TO, 'BroadcastingStationType', 'station_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'name' => 'Station Name',
			'region_id' => 'Region',
			'district_id' => 'District',
			'station_type_id' => 'Station Type',
			'operator_id' => 'Operator',
			'stationType.name'=>'Station Type',
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

		$criteria->compare('region_id',$this->region_id,true);

		$criteria->compare('district_id',$this->district_id,true);

		$criteria->compare('station_type_id',$this->station_type_id,true);

		$criteria->compare('operator_id',$this->operator_id,true);

		return new CActiveDataProvider('BroadcastingStation', array(
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