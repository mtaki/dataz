<?php

/**
 * This is the model class for table "statistics_employment_main".
 *
 * The followings are the available columns in table 'statistics_employment_main':
 * @property string $id
 * @property string $operator_id
 * @property integer $st_year
 */
class StatisticsEmploymentMain extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return StatisticsEmploymentMain the static model class
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
		return 'statistics_employment_main';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('st_year', 'numerical', 'integerOnly'=>true),
			array('operator_id', 'length', 'max'=>20),
			array('st_year,operator_id', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, operator_id, st_year', 'safe', 'on'=>'search'),
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
			'operator'=>array(self::BELONGS_TO, 'Operator', 'operator_id','joinType'=>'INNER JOIN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'operator_id' => 'Operator',
			'st_year' => 'Year',
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

		$criteria->compare('id',$this->id,false);

		$criteria->compare('operator_id',$this->operator_id,true);

		$criteria->compare('st_year',$this->st_year);

		return new CActiveDataProvider('StatisticsEmploymentMain', array(
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