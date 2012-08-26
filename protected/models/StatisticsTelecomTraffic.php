<?php

/**
 * This is the model class for table "statistics_telecom_traffic".
 *
 * The followings are the available columns in table 'statistics_telecom_traffic':
 * @property integer $main_id
 * @property integer $destination_id
 * @property integer $movement_id
 * @property string $num
 */
class StatisticsTelecomTraffic extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return StatisticsTelecomTraffic the static model class
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
		return 'statistics_telecom_traffic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('main_id, destination_id, movement_id, num', 'required'),
			array('main_id, destination_id, movement_id', 'numerical', 'integerOnly'=>true),
			array('num', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('main_id, destination_id, movement_id, num', 'safe', 'on'=>'search'),
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
			'destination_id' => 'Destination',
			'movement_id' => 'Movement',
			'num' => 'Num',
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

		$criteria->compare('main_id',$this->main_id);

		$criteria->compare('destination_id',$this->destination_id);

		$criteria->compare('movement_id',$this->movement_id);

		$criteria->compare('num',$this->num,true);

		return new CActiveDataProvider('StatisticsTelecomTraffic', array(
			'criteria'=>$criteria,
		));
	}
}