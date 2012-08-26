<?php

/**
 * This is the model class for table "invoice_detail".
 *
 * The followings are the available columns in table 'invoice_detail':
 * @property string $id
 * @property string $amount
 * @property string $description
 * @property string $invoice_id
 * @property string $quantity
 * @property string $price
 */
class InvoiceDetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return InvoiceDetail the static model class
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
		return 'invoice_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('amount, description, invoice_id', 'required'),
			array('amount', 'length', 'max'=>25),
			array('price', 'length', 'max'=>25),
			array('quantity', 'numerical'),
			array('description', 'length', 'max'=>50),
			array('invoice_id', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, amount, description, invoice_id', 'safe', 'on'=>'search'),
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
			'id' => 'Id',
			'amount' => 'Amount',
			'description' => 'Description',
			'invoice_id' => 'Invoice',
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

		$criteria->compare('amount',$this->amount,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('invoice_id',$this->invoice_id,true);

		return new CActiveDataProvider('InvoiceDetail', array(
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