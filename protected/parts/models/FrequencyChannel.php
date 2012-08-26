<?php

/**
 * This is the model class for table "frequency_channel".
 *
 * The followings are the available columns in table 'frequency_channel':
 * @property integer $id
 * @property double $frequency
 * @property integer $frequency_unit
 * @property string $type
 */
class FrequencyChannel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FrequencyChannel the static model class
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
		return 'frequency_channel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, type', 'required'),
			array('id, frequency_unit', 'numerical', 'integerOnly'=>true),
			array('frequency', 'numerical'),
			array('type', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, frequency, frequency_unit, type', 'safe', 'on'=>'search'),
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
			'frequency' => 'Frequency',
			'frequency_unit' => 'Frequency Unit',
			'type' => 'Type',
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

		$criteria->compare('frequency',$this->frequency);

		$criteria->compare('frequency_unit',$this->frequency_unit);

		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider('FrequencyChannel', array(
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