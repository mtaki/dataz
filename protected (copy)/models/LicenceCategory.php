<?php

/**
 * This is the model class for table "licence_category".
 *
 * The followings are the available columns in table 'licence_category':
 * @property string $id
 * @property string $name
 * @property string $licence_group_id
 * @property string $code
 * @property string $licence_file
 * @property string $certificate_file
 * @property integer $order_code
 */
class LicenceCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return LicenceCategory the static model class
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
		return 'licence_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_code', 'numerical', 'integerOnly'=>true),
			array('name, code', 'length', 'max'=>50),
			array('licence_group_id', 'length', 'max'=>20),
			array('licence_file, certificate_file', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, licence_group_id, code, licence_file, certificate_file, order_code', 'safe', 'on'=>'search'),
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
			'licenceGroup'=>array(self::BELONGS_TO, 'LicenceGroup', 'licence_group_id','joinType'=>'INNER JOIN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'name' => 'Name',
			'licence_group_id' => 'Licence Group',
			'code' => 'Code',
			'licence_file' => 'Licence File',
			'certificate_file' => 'Certificate File',
			'order_code' => 'Order Code',
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

		$criteria->compare('name',$this->name,true);

		$criteria->compare('licence_group_id',$this->licence_group_id,true);

		$criteria->compare('code',$this->code,true);

		$criteria->compare('licence_file',$this->licence_file,true);

		$criteria->compare('certificate_file',$this->certificate_file,true);

		$criteria->compare('order_code',$this->order_code);

		return new CActiveDataProvider('LicenceCategory', array(
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