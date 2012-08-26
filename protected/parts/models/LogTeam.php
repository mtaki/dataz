<?php

/**
 * This is the model class for table "log_team".
 *
 * The followings are the available columns in table 'log_team':
 * @property string $officer_id
 * @property string $log_id
 */
class LogTeam extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return LogTeam the static model class
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
		return 'log_team';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('officer_id, log_id', 'required'),
			array('officer_id, log_id', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('officer_id, log_id', 'safe', 'on'=>'search'),
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
			'officer'=>array(self::BELONGS_TO, 'Officer', 'officer_id'),
			'log'=>array(self::BELONGS_TO, 'Log', 'log_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'officer_id' => 'Officer',
			'log_id' => 'Log',
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

		$criteria->compare('officer_id',$this->officer_id,true);

		$criteria->compare('log_id',$this->log_id,true);

		return new CActiveDataProvider('LogTeam', array(
			'criteria'=>$criteria,
		));
	}
}