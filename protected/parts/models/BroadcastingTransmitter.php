<?php

/**
 * This is the model class for table "broadcasting_transmitter".
 *
 * The followings are the available columns in table 'broadcasting_transmitter':
 * @property string $id
 * @property integer $broadcasting_transmitter_type_id
 * @property integer $num
 * @property string $description
 * @property string $operator_id
 */
class BroadcastingTransmitter extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return BroadcastingTransmitter the static model class
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
		return 'broadcasting_transmitter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('broadcasting_transmitter_type_id, num, description, operator_id', 'required'),
			array('broadcasting_transmitter_type_id, num', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>1000),
			array('operator_id', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, broadcasting_transmitter_type_id, num, description, operator_id', 'safe', 'on'=>'search'),
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
			'transmitterType' => array(self::BELONGS_TO, 'BroadcastingTransmitterType', 'broadcasting_transmitter_type_id'),
			'operator' => array(self::BELONGS_TO, 'Operator', 'operator_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'broadcasting_transmitter_type_id' => 'Type',
			'num' => 'Number',
			'description' => 'Description',
			'operator_id' => 'Operator',
			'operator.name' => 'Operator',
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

		$criteria->compare('broadcasting_transmitter_type_id',$this->broadcasting_transmitter_type_id);

		$criteria->compare('num',$this->num);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('operator_id',$this->operator_id,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}