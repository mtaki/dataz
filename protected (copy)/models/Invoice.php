<?php

/**
 * This is the model class for table "invoice".
 *
 * The followings are the available columns in table 'invoice':
 * @property string $id
 * @property string $entity_type
 * @property string $entity_id
 * @property string $num
 * @property string $operator_id
 * @property string $day
 * @property string $currency_id
 * @property string $description
 * @property string $type
 * @property string $in_epicor
 * @property string $amount
 * @property string $amount_paid
 * @property string $amount_due
 * @property string $terms
 */
class Invoice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Invoice the static model class
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
		return 'invoice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('operator_id, description,currency_id', 'required'),
			array('entity_type, num, type, in_epicor, terms', 'length', 'max'=>50),
			array('entity_id, operator_id, currency_id', 'length', 'max'=>20),
			array('description', 'length', 'max'=>200),
			array('amount, amount_paid, amount_due', 'length', 'max'=>38),
			array('day', 'safe'),
			array('day', 'type', 'type' => 'date', 'message' => '{attribute}: is not a valid date!', 'dateFormat' => 'dd-MM-yyyy'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, entity_type, entity_id, num, operator_id, day, currency_id, description, type, in_epicor, amount, amount_paid, amount_due, terms', 'safe', 'on'=>'search'),
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
			'currency'=>array(self::BELONGS_TO, 'Currency', 'currency_id','joinType'=>'INNER JOIN'),
			'invoiceDetails'=>array(self::HAS_MANY, 'InvoiceDetail', 'invoice_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'entity_type' => 'Entity Type',
			'entity_id' => 'Entity',
			'num' => 'Num',
			'operator_id' => 'Operator',
			'day' => 'Date',
			'currency_id' => 'Currency',
			'description' => 'Description',
			'type' => 'Type',
			'in_epicor' => 'In Epicor',
			'amount' => 'Amount',
			'amount_paid' => 'Amount Paid',
			'amount_due' => 'Amount Due',
			'terms' => 'Terms',
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
		$criteria->with=array('currency');
		$criteria->compare('t.id',$this->id,true);

		$criteria->compare('entity_type',$this->entity_type,true);

		$criteria->compare('entity_id',$this->entity_id,true);

		$criteria->compare('num',$this->num,true);

		$criteria->compare('operator_id',$this->operator_id,true);

		$criteria->compare('day',$this->day,true);

		$criteria->compare('currency_id',$this->currency_id,true);

		$criteria->compare('description',$this->description,true);

		//$criteria->compare('type','ini',true);
		
		
		return new CActiveDataProvider('Invoice', array(
			'criteria'=>$criteria,
		));
	}
	public function behaviors()
	{
    return array(
    	'datetimeI18NBehavior' => array('class' => 'application.extensions.DateTimeI18NBehavior'),
    	'ActiveRecordLogableBehavior'=>'application.behaviors.ActiveRecordLogableBehavior'); 
	}
	
}