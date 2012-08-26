<?php

/**
 * This is the model class for table "application_vsat".
 *
 * The followings are the available columns in table 'application_vsat':
 * @property string $id
 * @property string $file_number
 * @property string $classfication
 * @property string $status_1
 * @property string $status_2
 * @property string $status_3
 * @property string $status_4
 * @property string $status_date_1
 * @property string $status_date_2
 * @property string $status_date_3
 * @property string $status_date_4
 */
class ApplicationVsat extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ApplicationVsat the static model class
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
		return 'application_vsat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id', 'length', 'max'=>20),
			array('file_number', 'length', 'max'=>30),
			array('classification, status_1, status_2, status_3, status_4', 'length', 'max'=>50),
			array('status_date_1, status_date_2, status_date_3, status_date_4',  'type', 'type' => 'date', 'message' => '{attribute}: is not a valid date!', 'dateFormat' => Yii::app()->locale->dateFormat),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, file_number, classification, status_1, status_2, status_3, status_4, status_date_1, status_date_2, status_date_3, status_date_4', 'safe', 'on'=>'search'),
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
			'file_number' => 'File Number',
			'classification' => 'Classification',
			'status_1' => 'Status 1',
			'status_2' => 'Status 2',
			'status_3' => 'Status 3',
			'status_4' => 'Status 4',
			'status_date_1' => 'Status Date 1',
			'status_date_2' => 'Status Date 2',
			'status_date_3' => 'Status Date 3',
			'status_date_4' => 'Status Date 4',
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

		$criteria->compare('file_number',$this->file_number,true);

		$criteria->compare('classfication',$this->classfication,true);

		$criteria->compare('status_1',$this->status_1,true);

		$criteria->compare('status_2',$this->status_2,true);

		$criteria->compare('status_3',$this->status_3,true);

		$criteria->compare('status_4',$this->status_4,true);

		$criteria->compare('status_date_1',$this->status_date_1,true);

		$criteria->compare('status_date_2',$this->status_date_2,true);

		$criteria->compare('status_date_3',$this->status_date_3,true);

		$criteria->compare('status_date_4',$this->status_date_4,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function behaviors()
	{
	    return array(
	    	'datetimeI18NBehavior' => array('class' => 'application.extensions.DateTimeI18NBehavior'),
	    	'ActiveRecordLogableBehavior'=>'application.behaviors.ActiveRecordLogableBehavior',
	    ); 
	}
}