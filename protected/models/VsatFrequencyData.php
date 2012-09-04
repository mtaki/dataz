<?php

/**
 * This is the model class for table "vsat_frequency_data".
 *
 * The followings are the available columns in table 'vsat_frequency_data':
 * @property string $frequency_band
 * @property string $date_of_issue
 * @property string $date_of_renewal
 * @property string $emission
 * @property string $tolerance
 * @property string $application_vsat_id
 */
class VsatFrequencyData extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return VsatFrequencyData the static model class
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
		return 'vsat_frequency_data';
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
			array('frequency_band, emission, tolerance', 'length', 'max'=>45),
			array('application_vsat_id', 'length', 'max'=>20),
			array('date_of_issue, date_of_renewal', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('frequency_band, date_of_issue, date_of_renewal, emission, tolerance, application_vsat_id', 'safe', 'on'=>'search'),
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
			'frequency_band' => 'Frequency Band',
			'date_of_issue' => 'Date Of Issue',
			'date_of_renewal' => 'Date Of Renewal',
			'emission' => 'Emission',
			'tolerance' => 'Tolerance',
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

		$criteria->compare('frequency_band',$this->frequency_band,true);

		$criteria->compare('date_of_issue',$this->date_of_issue,true);

		$criteria->compare('date_of_renewal',$this->date_of_renewal,true);

		$criteria->compare('emission',$this->emission,true);

		$criteria->compare('tolerance',$this->tolerance,true);

		$criteria->compare('application_vsat_id',$this->application_vsat_id,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}