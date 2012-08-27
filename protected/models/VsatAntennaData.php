<?php

/**
 * This is the model class for table "vsat_antenna_data".
 *
 * The followings are the available columns in table 'vsat_antenna_data':
 * @property string $TCRAID
 * @property string $manufacture_name
 * @property string $model
 * @property string $height_above_ground
 * @property string $polarization
 * @property string $directional
 * @property string $circular
 * @property string $other
 * @property string $application_vsat_id
 */
class VsatAntennaData extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return VsatAntennaData the static model class
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
		return 'vsat_antenna_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TCRAID, application_vsat_id', 'required'),
			array('TCRAID, manufacture_name, model, height_above_ground, polarization, directional, circular', 'length', 'max'=>45),
			array('other', 'length', 'max'=>100),
			array('application_vsat_id', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('TCRAID, manufacture_name, model, height_above_ground, polarization, directional, circular, other, application_vsat_id', 'safe', 'on'=>'search'),
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
			'TCRAID' => 'Tcraid',
			'manufacture_name' => 'Manufacture Name',
			'model' => 'Model',
			'height_above_ground' => 'Height Above Ground',
			'polarization' => 'Polarization',
			'directional' => 'Directional',
			'circular' => 'Circular',
			'other' => 'Other',
			'application_vsat_id' => 'Application Vsat',
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

		$criteria->compare('TCRAID',$this->TCRAID,true);

		$criteria->compare('manufacture_name',$this->manufacture_name,true);

		$criteria->compare('model',$this->model,true);

		$criteria->compare('height_above_ground',$this->height_above_ground,true);

		$criteria->compare('polarization',$this->polarization,true);

		$criteria->compare('directional',$this->directional,true);

		$criteria->compare('circular',$this->circular,true);

		$criteria->compare('other',$this->other,true);

		$criteria->compare('application_vsat_id',$this->application_vsat_id,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}