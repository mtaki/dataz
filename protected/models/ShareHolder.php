<?php

/**
 * This is the model class for table "share_holder".
 *
 * The followings are the available columns in table 'share_holder':
 * @property string $id
 * @property string $name
 * @property string $operator_id
 * @property string $citizenship_id
 * @property string $share_percentage
 * @property string $phone
 * @property string $address
 * @property string $email
 * @property integer $share_number
 */
class ShareHolder extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ShareHolder the static model class
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
		return 'share_holder';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name,citizenship_id', 'required'),
			array('share_number,share_percentage', 'numerical','allowEmpty'=>true),
			array('name, phone, address, email,share_certificate_number', 'length', 'max'=>50),
			array('operator_id, citizenship_id', 'length', 'max'=>20),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, operator_id, citizenship_id, share_percentage, phone, address, email, share_number', 'safe', 'on'=>'search'),
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
			'citizenship'=>array(self::BELONGS_TO, 'Citizenship', 'citizenship_id','joinType'=>'INNER JOIN'),
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
			'operator_id' => 'Operator',
			'citizenship_id' => 'Citizenship',
			'share_percentage' => 'Share Percentage',
			'phone' => 'Phone',
			'address' => 'Address',
			'email' => 'Email',
			'share_number' => 'Number of Share',
			'citizenship.name'=>'Citizenship',
			'share_certificate_number'=>'Share Cert. No.'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($operatorId)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('operator_id',$operatorId,false);

		

		return new CActiveDataProvider('ShareHolder', array(
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
