<?php

/**
 * This is the model class for table "application_importation".
 *
 * The followings are the available columns in table 'application_importation':
 * @property string $id
 * @property string $application_number
 * @property string $type_make
 * @property string $activities
 * @property string $how_procure_equipment
 * @property string $staff
 * @property integer $possess_office
 * @property string $office_description
 * @property string $source_spares
 * @property string $previous_licence
 */
class ApplicationImportation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ApplicationImportation the static model class
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
		return 'application_importation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('possess_office', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>20),
			array('application_number, type_make', 'length', 'max'=>50),
			array('activities, how_procure_equipment, office_description', 'length', 'max'=>100),
			array('staff, source_spares, previous_licence', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, application_number, type_make, activities, how_procure_equipment, staff, possess_office, office_description, source_spares, previous_licence', 'safe', 'on'=>'search'),
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
			'staff' => 'Staff',
			'possess_office' => 'Possess Office',
			'office_description' => 'Office Description',
			'source_spares' => 'Source Spares',
			'previous_licence' => 'Previous Licence',
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

		$criteria->compare('staff',$this->staff,true);

		$criteria->compare('possess_office',$this->possess_office);

		$criteria->compare('office_description',$this->office_description,true);

		$criteria->compare('source_spares',$this->source_spares,true);

		$criteria->compare('previous_licence',$this->previous_licence,true);

		return new CActiveDataProvider('ApplicationImportation', array(
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