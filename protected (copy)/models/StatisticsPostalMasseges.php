<?php

/**
 * This is the model class for table "statistics_postal_masseges".
 *
 * The followings are the available columns in table 'statistics_postal_masseges':
 * @property string $main_id
 * @property string $destination_id
 * @property string $posted_item_id
 * @property string $h_num
 * @property string $o_num
 * @property string $plb_num
 */
class StatisticsPostalMasseges extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return StatisticsPostalMasseges the static model class
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
		return 'statistics_postal_masseges';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('main_id, destination_id, posted_item_id', 'required'),
			array('main_id, destination_id, posted_item_id, h_num, o_num, plb_num', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('main_id, destination_id, posted_item_id, h_num, o_num, plb_num', 'safe', 'on'=>'search'),
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
			'posted_item_id' => 'Posted Item',
			'h_num' => 'H Num',
			'o_num' => 'O Num',
			'plb_num' => 'Plb Num',
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

		$criteria->compare('main_id',$this->main_id,true);

		$criteria->compare('destination_id',$this->destination_id,true);

		$criteria->compare('posted_item_id',$this->posted_item_id,true);

		$criteria->compare('h_num',$this->h_num,true);

		$criteria->compare('o_num',$this->o_num,true);

		$criteria->compare('plb_num',$this->plb_num,true);

		return new CActiveDataProvider('StatisticsPostalMasseges', array(
			'criteria'=>$criteria,
		));
	}
}