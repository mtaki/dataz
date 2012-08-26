<?php

/**
 * This is the model class for table "application_installation".
 *
 * The followings are the available columns in table 'application_installation':
 * @property string $id
 * @property string $application_number
 * @property string $type_make
 * @property string $activities
 * @property string $how_procure_equipment
 * @property string $investiment_cost
 * @property string $staff
 * @property string $support_staff
 * @property integer $possess_office
 * @property string $office_description
 * @property integer $possess_workshop
 * @property string $workshop_description
 * @property string $possess_vehicle
 * @property string $vehicle_how_many
 * @property string $other_transport
 * @property string $test_gears
 * @property string $source_spares
 * @property string $previous_licence
 * @property string $board_registration
 */
class ApplicationInstallation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ApplicationInstallation the static model class
	 */
     public $registration_doc;
     
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'application_installation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('possess_office, possess_workshop', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>20),
			array('application_number, type_make', 'length', 'max'=>50),
			array('activities, how_procure_equipment, office_description, workshop_description', 'length', 'max'=>100),
			array('investiment_cost', 'length', 'max'=>38),
			array('staff, support_staff, other_transport, test_gears, source_spares, previous_licence', 'length', 'max'=>200),
			array('possess_vehicle', 'length', 'max'=>22),
			array('vehicle_how_many', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, application_number, type_make, activities, how_procure_equipment, investiment_cost, staff, support_staff, possess_office, office_description, possess_workshop, workshop_description, possess_vehicle, vehicle_how_many, other_transport, test_gears, source_spares, previous_licence', 'safe', 'on'=>'search'),
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
			'licenceApplication'=>array(self::BELONGS_TO, 'LicenceApplication', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'application_number' => 'Application Number',
			'type_make' => 'Type Make',
			'activities' => 'Activities',
			'how_procure_equipment' => 'How Procure Equipment',
			'investiment_cost' => 'Investiment Cost',
			'staff' => 'Staff',
			'support_staff' => 'Support Staff',
			'possess_office' => 'Possess Office',
			'office_description' => 'Office Description',
			'possess_workshop' => 'Possess Workshop',
			'workshop_description' => 'Workshop Description',
			'possess_vehicle' => 'Possess Vehicle',
			'vehicle_how_many' => 'Vehicle How Many',
			'other_transport' => 'Other Transport',
			'test_gears' => 'Test Gears',
			'source_spares' => 'Source Spares',
			'previous_licence' => 'Previous Licence',
			'board_registration' => 'Board_registration',
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

		$criteria->compare('activities',$this->activities,true);

		$criteria->compare('how_procure_equipment',$this->how_procure_equipment,true);

		$criteria->compare('investiment_cost',$this->investiment_cost,true);

		$criteria->compare('staff',$this->staff,true);

		$criteria->compare('support_staff',$this->support_staff,true);

		$criteria->compare('possess_office',$this->possess_office);

		$criteria->compare('office_description',$this->office_description,true);

		$criteria->compare('possess_workshop',$this->possess_workshop);

		$criteria->compare('workshop_description',$this->workshop_description,true);

		$criteria->compare('possess_vehicle',$this->possess_vehicle,true);

		$criteria->compare('vehicle_how_many',$this->vehicle_how_many,true);

		$criteria->compare('other_transport',$this->other_transport,true);

		$criteria->compare('test_gears',$this->test_gears,true);

		$criteria->compare('source_spares',$this->source_spares,true);

		$criteria->compare('previous_licence',$this->previous_licence,true);
		$criteria->compare('board_registration',$this->board_registration,true);

		return new CActiveDataProvider('ApplicationInstallation', array(
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