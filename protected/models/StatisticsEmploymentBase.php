<?php

/**
 * This is the model class for table "statistics_employment_base".
 *
 * The followings are the available columns in table 'statistics_employment_base':
 * @property string $main_id
 * @property string $employee_type_id
 * @property string $num_managerial
 * @property string $num_non_managerial
 */
class StatisticsEmploymentBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return StatisticsEmploymentBase the static model class
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
		return 'statistics_employment_base';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('main_id, employee_type_id, num_managerial, num_non_managerial', 'required'),
			array('main_id, employee_type_id, num_managerial, num_non_managerial', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('main_id, employee_type_id, num_managerial, num_non_managerial', 'safe', 'on'=>'search'),
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
			'employee_type_id' => 'Employee Type',
			'num_managerial' => 'Num Managerial',
			'num_non_managerial' => 'Num Non Managerial',
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

		$criteria->compare('employee_type_id',$this->employee_type_id,true);

		$criteria->compare('num_managerial',$this->num_managerial,true);

		$criteria->compare('num_non_managerial',$this->num_non_managerial,true);

		return new CActiveDataProvider('StatisticsEmploymentBase', array(
			'criteria'=>$criteria,
		));
	}
}