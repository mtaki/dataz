<?php

/**
 * This is the model class for table "numbering_resource".
 *
 * The followings are the available columns in table 'numbering_resource':
 * @property string $id
 * @property string $num
 * @property string $operator_id
 * @property string $numbering_resource_type_id
 * @property string $status
 * @property string $numbering_fee_type_id
 * @property string $application_id
 * @property string $request_type
 */
class NumberingResource extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return NumberingResource the static model class
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
		return 'numbering_resource';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status', 'required'),
			array('num, status, request_type', 'length', 'max'=>50),
			array('operator_id, numbering_resource_type_id, numbering_fee_type_id, application_id', 'length', 'max'=>20),
			array('assignment_date', 'length', 'max'=>20 ),
			array('assignment_date', 'type', 'type' => 'date', 'message' => '{attribute}: is not a valid date!', 'dateFormat' => 'dd-MM-yyyy'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, num, operator_id, numbering_resource_type_id, status, numbering_fee_type_id, application_id, request_type', 'safe', 'on'=>'search'),
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
			'applicant'=>array(self::BELONGS_TO, 'Operator', 'operator_id','joinType'=>'INNER JOIN'),
			'operator'=>array(self::BELONGS_TO, 'Operator', 'operator_id','joinType'=>'INNER JOIN'),
			'numberingResourceType'=>array(self::BELONGS_TO, 'NumberingResourceType', 'numbering_resource_type_id','joinType'=>'INNER JOIN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'num' => 'Number/Code',
			'operator_id' => 'Operator',
			'numbering_resource_type_id' => 'Numbering Resource Type',
			'status' => 'Status',
			'numbering_fee_type_id' => 'Numbering Fee Type',
			'application_id' => 'Application',
			'request_type' => 'Request Type',
			'assignment_date'=>'Assignment Date',
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

		$criteria->compare('operator_id',$this->operator_id,true);

		$criteria->compare('numbering_resource_type_id',$this->numbering_resource_type_id,false);

		$criteria->compare('status',$this->status,true);

		$criteria->compare('numbering_fee_type_id',$this->numbering_fee_type_id,true);

		$criteria->compare('application_id',$this->application_id,true);

		$criteria->compare('request_type',$this->request_type,true);

		return new CActiveDataProvider('NumberingResource', array(
			'criteria'=>$criteria,
		));
	}
	public function getFee(){
		$nf=NumberingFee::model()->find('numbering_fee_type_id='.$this->numbering_fee_type_id);
		return $nf->annual_fee;
	}
	public function behaviors()
	{
	    return array(
	        // Classname => path to Class
	        'ActiveRecordLogableBehavior'=>'application.behaviors.ActiveRecordLogableBehavior',
	    );
	}
}
