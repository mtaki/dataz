<?php

/**
 * This is the model class for table "complaint2type".
 *
 * The followings are the available columns in table 'complaint2type':
 * @property string $type_id
 * @property string $complaint_id
 */
class Complaint2type extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Complaint2type the static model class
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
		return 'complaint2type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_id, complaint_id', 'required'),
			array('type_id, complaint_id', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('type_id, complaint_id', 'safe', 'on'=>'search'),
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
			'type_id' => 'Type',
			'complaint_id' => 'Complaint',
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

		$criteria->compare('type_id',$this->type_id,true);

		$criteria->compare('complaint_id',$this->complaint_id,true);

		return new CActiveDataProvider('Complaint2type', array(
			'criteria'=>$criteria,
		));
	}
}