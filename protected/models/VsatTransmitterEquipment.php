<?php

/**
 * This is the model class for table "vsat_transmitter_equipment".
 *
 * The followings are the available columns in table 'vsat_transmitter_equipment':
 * @property string $application_vsat_id
 * @property string $TCRAID
 * @property string $type_approval_number
 * @property string $manufacture_name
 * @property string $model
 * @property string $serial_number
 * @property string $transmitter_power
 * @property string $effective_radiated_power
 * @property string $equipment_manual_attached
 * @property string $station_class
 * @property string $remark
 */
class VsatTransmitterEquipment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return VsatTransmitterEquipment the static model class
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
		return 'vsat_transmitter_equipment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('application_vsat_id', 'required'),
			array('application_vsat_id', 'length', 'max'=>20),
			array('TCRAID, type_approval_number, manufacture_name, model, serial_number, transmitter_power, effective_radiated_power, equipment_manual_attached, station_class, remark', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('application_vsat_id, TCRAID, type_approval_number, manufacture_name, model, serial_number, transmitter_power, effective_radiated_power, equipment_manual_attached, station_class, remark', 'safe', 'on'=>'search'),
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
			'applicationVsat' => array(self::BELONGS_TO, 'ApplicationVsat', 'application_vsat_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'application_vsat_id' => 'Application Vsat',
			'TCRAID' => 'Tcraid',
			'type_approval_number' => 'Type Approval Number',
			'manufacture_name' => 'Manufacture Name',
			'model' => 'Model',
			'serial_number' => 'Serial Number',
			'transmitter_power' => 'Transmitter Power',
			'effective_radiated_power' => 'Effective Radiated Power',
			'equipment_manual_attached' => 'Equipment Manual Attached',
			'station_class' => 'Station Class',
			'remark' => 'Remark',
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

		$criteria->compare('application_vsat_id',$this->application_vsat_id,true);

		$criteria->compare('TCRAID',$this->TCRAID,true);

		$criteria->compare('type_approval_number',$this->type_approval_number,true);

		$criteria->compare('manufacture_name',$this->manufacture_name,true);

		$criteria->compare('model',$this->model,true);

		$criteria->compare('serial_number',$this->serial_number,true);

		$criteria->compare('transmitter_power',$this->transmitter_power,true);

		$criteria->compare('effective_radiated_power',$this->effective_radiated_power,true);

		$criteria->compare('equipment_manual_attached',$this->equipment_manual_attached,true);

		$criteria->compare('station_class',$this->station_class,true);

		$criteria->compare('remark',$this->remark,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}