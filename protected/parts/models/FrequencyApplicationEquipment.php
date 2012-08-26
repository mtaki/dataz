<?php

/**
 * This is the model class for table "frequency_application_equipment".
 *
 * The followings are the available columns in table 'frequency_application_equipment':
 * @property string $id
 * @property string $application_id
 * @property string $type_service
 * @property string $type_radio
 * @property string $model
 * @property double $power
 */
class FrequencyApplicationEquipment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FrequencyApplicationEquipment the static model class
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
		return 'frequency_application_equipment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('application_id, type_service, type_radio, model, power', 'required'),
			array('power', 'numerical'),
			array('application_id', 'length', 'max'=>20),
			array('type_service, model', 'length', 'max'=>30),
			array('type_radio', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, application_id, type_service, type_radio, model, power', 'safe', 'on'=>'search'),
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
			'application_id' => 'Application',
			'type_service' => 'Type Service',
			'type_radio' => 'Type Radio',
			'model' => 'Model',
			'power' => 'Power',
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

		$criteria->compare('application_id',$this->application_id,true);

		$criteria->compare('type_service',$this->type_service,true);

		$criteria->compare('type_radio',$this->type_radio,true);

		$criteria->compare('model',$this->model,true);

		$criteria->compare('power',$this->power);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}