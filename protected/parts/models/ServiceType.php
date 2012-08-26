<?php

/**
 * This is the model class for table "service_type".
 *
 * The followings are the available columns in table 'service_type':
 * @property string $id
 * @property string $service_id
 * @property string $type_of_service
 * @property string $area_use
 */
class ServiceType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ServiceType the static model class
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
		return 'service_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_of_service', 'required'),
			array('service_id, area_use', 'length', 'max'=>32),
			array('type_of_service', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, service_id, type_of_service, area_use', 'safe', 'on'=>'search'),
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
			'service_id' => 'Service',
			'type_of_service' => 'Type Of Service',
			'area_use' => 'Area Use',
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

		$criteria->compare('service_id',$this->service_id,true);

		$criteria->compare('type_of_service',$this->type_of_service,true);

		$criteria->compare('area_use',$this->area_use,true);

		return new CActiveDataProvider('ServiceType', array(
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