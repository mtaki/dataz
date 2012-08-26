<?php

/**
 * This is the model class for table "application_distribution".
 *
 * The followings are the available columns in table 'application_distribution':
 * @property string $id
 * @property string $application_number
 * @property string $type_make
 * @property string $area
 * @property string $existing_business
 */
class ApplicationDistribution extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ApplicationDistribution the static model class
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
		return 'application_distribution';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id', 'length', 'max'=>20),
			array('application_number, type_make', 'length', 'max'=>50),
			array('area', 'length', 'max'=>100),
			array('existing_business', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, application_number, type_make, area, existing_business', 'safe', 'on'=>'search'),
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
			'application_number' => 'Application Number',
			'type_make' => 'Type Make',
			'area' => 'Area',
			'existing_business' => 'Existing Business',
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

		$criteria->compare('application_number',$this->application_number,true);

		$criteria->compare('type_make',$this->type_make,true);

		$criteria->compare('area',$this->area,true);

		$criteria->compare('existing_business',$this->existing_business,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}