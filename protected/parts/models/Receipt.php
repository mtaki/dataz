<?php

/**
 * This is the model class for table "receipt".
 *
 * The followings are the available columns in table 'receipt':
 * @property string $id
 * @property string $num
 * @property string $date_paid
 * @property string $invoice_id
 * @property string $amount_paid
 * @property string $document_number
 * @property string $currency_id
 */
class Receipt extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Receipt the static model class
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
		return 'receipt';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('num, document_number', 'length', 'max'=>50),
			array('invoice_id, currency_id', 'length', 'max'=>20),
			array('amount_paid', 'length', 'max'=>38),
			array('date_paid', 'safe'),
			array('date_paid', 'type', 'type' => 'date', 'message' => '{attribute}: is not a valid date!', 'dateFormat' => 'dd-MM-yyyy'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, num, date_paid, invoice_id, amount_paid, document_number, currency_id', 'safe', 'on'=>'search'),
			array('num', 'checkNumber',),
		);
	}
	

public function checkNumber($attribute,$params)
{
    
    	$hActiveRecord = new ActiveRecordData;
		$connection=$hActiveRecord->getDbConnection();
		$number=$this->{$attribute};
		$command=$connection->createCommand("SELECT trx_ctrl_num,payment_amt,x_date_doc,doc_ctrl_num,nat_cur_code FROM TCRAData.dbo.arcr2_vw WHERE trx_ctrl_num='$number' AND pyt_posted_flag='Yes'");
		$ms=$command->queryAll();
		if (empty($ms))
			$this->addError($attribute,'The receipt is incorrect.');
        
    
}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'currency'=>array(self::BELONGS_TO, 'Currency', 'currency_id','joinType'=>'INNER JOIN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'num' => 'Num',
			'date_paid' => 'Date Paid',
			'invoice_id' => 'Invoice',
			'amount_paid' => 'Amount Paid',
			'document_number' => 'Document Number',
			'currency_id' => 'Currency',
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

		$criteria->compare('num',$this->num,true);

		$criteria->compare('date_paid',$this->date_paid,true);

		$criteria->compare('invoice_id',$this->invoice_id,true);

		$criteria->compare('amount_paid',$this->amount_paid,true);

		$criteria->compare('document_number',$this->document_number,true);

		$criteria->compare('currency_id',$this->currency_id,true);

		return new CActiveDataProvider('Receipt', array(
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
