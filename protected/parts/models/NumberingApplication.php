<?php

/**
 * This is the model class for table "numbering_application".
 *
 * The followings are the available columns in table 'numbering_application':
 * @property string $id
 * @property string $purpose
 * @property string $effective_date
 * @property string $issue_date
 * @property string $operation_start_date
 * @property string $other_info
 * @property string $signatory_name
 * @property string $signatory_title
 * @property string $sign_date
 * @property string $sign_location
 * @property string $forecast
 * @property string $operator_id
 * @property string $numbering_resource_type_id
 * @property string $application_date
 * @property string $service_licence_number
 * @property string $status
 * @property string $numbering_fee_type_id
 * @property string $dispatch_name
 * @property string $dispatch_title
 * @property string $numbers_in_use
 * @property string $numbers_reserved
 * @property string $areas
 * @property string $interconnection
 * @property string $services
 * @property string $status_existing_numbers
 */
class NumberingApplication extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return NumberingApplication the static model class
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
		return 'numbering_application';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('purpose,numbering_fee_type_id','required'),
			array('service_licence_number','required','on'=>'nonVAS'),
			array('purpose, other_info', 'length', 'max'=>250),
			array('signatory_name, signatory_title, sign_location, service_licence_number, status, dispatch_name, dispatch_title', 'length', 'max'=>50),
			array('forecast', 'length', 'max'=>22),
			array('certificate_number', 'length', 'max'=>30),
			//array('certificate_number','unique'),
			array('operator_id, numbering_resource_type_id, numbering_fee_type_id', 'length', 'max'=>20),
			array('operator_id,numbering_resource_type_id,application_date,numbering_fee_type_id', 'required'),
			array('numbers_in_use, numbers_reserved, areas', 'length', 'max'=>100),
			array('interconnection, services, status_existing_numbers', 'length', 'max'=>200),
			array('effective_date, operation_start_date, sign_date, application_date', 'safe'),
			//array('issue_date', 'type', 'type' => 'date','allowEmpty'=>true, 'message' => '{attribute}: is not a valid date!', 'dateFormat' => 'dd-MM-yyyy'),
			
			array('effective_date,operation_start_date, sign_date, application_date,issue_date', 'type', 'type' => 'date', 'message' => '{attribute}: is not a valid date!', 'dateFormat' => 'dd-MM-yyyy'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, purpose, effective_date, operation_start_date, other_info, signatory_name, signatory_title, sign_date, sign_location, forecast, operator_id, numbering_resource_type_id, application_date, service_licence_number, status, numbering_fee_type_id, dispatch_name, dispatch_title, numbers_in_use, numbers_reserved, areas, interconnection, services, status_existing_numbers', 'safe', 'on'=>'search'),
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
		   	'numberingFeeType'=>array(self::BELONGS_TO, 'NumberingFeeType', 'numbering_fee_type_id','joinType'=>'INNER JOIN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'purpose' => 'Purpose',
			'effective_date' => 'Effective Date',
			'operation_start_date' => 'Operation Start Date',
			'other_info' => 'Other Info',
			'signatory_name' => 'Signatory Name',
			'signatory_title' => 'Signatory Title',
			'sign_date' => 'Sign Date',
			'sign_location' => 'Sign Location',
			'forecast' => 'Forecast',
			'operator_id' => 'Operator',
			'numbering_resource_type_id' => 'Numbering Resource Type',
			'application_date' => 'Application Date',
			'service_licence_number' => 'Service Licence Number',
			'status' => 'Status',
			'numbering_fee_type_id' => 'Numbering Fee Type',
			'dispatch_name' => 'Dispatch Name',
			'dispatch_title' => 'Dispatch Title',
			'numbers_in_use' => 'Numbers In Use',
			'numbers_reserved' => 'Numbers Reserved',
			'areas' => 'Areas',
			'interconnection' => 'Interconnection',
			'services' => 'Services',
			'status_existing_numbers' => 'Status Existing Numbers',
			'numberingResourceType' => 'Type',
			'numbering_fee_type_id' =>'Type',
			//'issue_date'=>'Issue Date',
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

		

		$criteria->compare('forecast',$this->forecast,true);

		$criteria->compare('operator_id',$this->operator_id,true);

		$criteria->compare('numbering_resource_type_id',$this->numbering_resource_type_id,false);

		$criteria->compare('application_date',$this->application_date,true);

		$criteria->compare('service_licence_number',$this->service_licence_number,true);

		if (Yii::app()->controller->action->id=='editList'){
			$criteria->addCondition("status='Received'", 'AND');
		}
		elseif (Yii::app()->controller->action->id=='evaluationList'){
			$criteria->addCondition("status='Received' OR status='Returned'", 'AND');
		}
		elseif (Yii::app()->controller->action->id=='approvalList'){
			$criteria->addCondition("status='Evaluated' OR status='Pending Approval'", 'AND');
		}
		elseif (Yii::app()->controller->action->id=='printList'){
			$criteria->addCondition("status='Approved'", 'AND');
		}
		elseif (Yii::app()->controller->action->id=='prepareList'){
			$criteria->addCondition("status='Approved' OR status='Prepared'", 'AND');
		}
		elseif (Yii::app()->controller->action->id=='dispatchList'){
			$criteria->addCondition("status='Prepared'", 'AND');
		}
		else 
			$criteria->compare('status',$this->status,true);

		$criteria->compare('numbering_fee_type_id',$this->numbering_fee_type_id,true);

		$criteria->compare('dispatch_name',$this->dispatch_name,true);

		$criteria->compare('dispatch_title',$this->dispatch_title,true);

		$criteria->compare('numbers_in_use',$this->numbers_in_use,true);

		$criteria->compare('numbers_reserved',$this->numbers_reserved,true);

		$criteria->compare('areas',$this->areas,true);

		$criteria->compare('interconnection',$this->interconnection,true);

		$criteria->compare('services',$this->services,true);

		$criteria->compare('status_existing_numbers',$this->status_existing_numbers,true);

		return new CActiveDataProvider('NumberingApplication', array(
			'criteria'=>$criteria,
		));
	}
	public function getViewUrl(){
		$action='';
		if(Yii::app()->controller->action->id=='editList')
			$action= 'edit';
		elseif(Yii::app()->controller->action->id=='evaluationList')
			$action= 'evaluation';
		elseif(Yii::app()->controller->action->id=='approvalList')
			$action= 'approval';
		elseif(Yii::app()->controller->action->id=='printList')
			$action= 'print';
		elseif(Yii::app()->controller->action->id=='prepareList')
			$action= 'prepare';
		elseif(Yii::app()->controller->action->id=='dispatchList')
			$action= 'dispatch';
		else 
			$action= 'view';
		return Yii::app()->createUrl("numberingApplication/$action",array('id'=>$this->id));
	}
	public function behaviors()
	{
	    return array(
	    	'datetimeI18NBehavior' => array('class' => 'application.extensions.DateTimeI18NBehavior'),
	    	'ActiveRecordLogableBehavior'=>'application.behaviors.ActiveRecordLogableBehavior',
	    ); 
	}
}