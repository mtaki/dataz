<?php

/**
 * This is the model class for table "application_communication".
 *
 * The followings are the available columns in table 'application_communication':
 * @property string $id
 * @property string $nature
 * @property string $area
 * @property string $estimated_cost
 * @property string $estimated_cost_currency
 * @property integer $use_frequency
 * @property string $staff
 * @property string $future_plans
 * @property string $staff_training
 * @property integer $transmittal_letter
 * @property integer $receipt_photocopy
 * @property integer $company_memorandum
 * @property integer $track_record
 * @property integer $company_profile
 * @property integer $certificate_incorporation
 * @property string $network_diagram
 * @property integer $manual
 * @property integer $rollout_plan
 * @property integer $network_configuration
 * @property integer $service_offered
 * @property integer $costing_structure
 * @property integer $service_pricing
 * @property integer $customer_care
 * @property integer $financial_statement
 * @property integer $financing_plan
 * @property integer $capital_investment
 * @property integer $human_resource
 * 
 * @author Mohamed Manja <mohamedmanja@gmail.com>
 */
class ApplicationCommunication extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ApplicationCommunication the static model class
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
		return 'application_communication';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nature,estimated_cost,estimated_cost_currency,use_frequency,staff,staff_training,declared_signed', 'required'),
			array('use_frequency,proof_financial_capability,use_numbering_resource, transmittal_letter, receipt_photocopy, company_memorandum, track_record, company_profile, certificate_incorporation, manual, rollout_plan, network_configuration, service_offered, costing_structure, service_pricing, customer_care, financial_statement, financing_plan, capital_investment, human_resource,network_diagram,staff,staff_training,declared_signed', 'numerical', 'integerOnly'=>true),
			array('id, estimated_cost_currency', 'length', 'max'=>20),
			array('nature,numbering_resource_description', 'length', 'max'=>50),
			array('area, estimated_cost_description', 'length', 'max'=>100),
			array('estimated_cost', 'length', 'max'=>38),
			array('future_plans', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nature, area, estimated_cost, estimated_cost_currency, use_frequency, staff, future_plans, staff_training, transmittal_letter, receipt_photocopy, company_memorandum, track_record, company_profile, certificate_incorporation, network_diagram, manual, rollout_plan, network_configuration, service_offered, costing_structure, service_pricing, customer_care, financial_statement, financing_plan, capital_investment, human_resource', 'safe', 'on'=>'search'),
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
			'licenceApplication'=>array(self::BELONGS_TO, 'LicenceApplication', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'nature' => 'Nature',
			'area' => 'Area',
			'estimated_cost' => 'Estimated Cost',
			'estimated_cost_currency' => 'Estimated Cost Currency',
			'estimated_cost_description'=>'Cost Description',
			'use_frequency' => 'Does the applicant intend to use frequency spectrum',
			'use_numbering_resource'=> 'Does the applicant intend to use numbering resources',
			'numbering_resource_description'=> 'Does the applicant intend to use numbering resources',
			'staff' => 'Staff establishment and qualification (present and future)',
			'future_plans' => 'Future Plans',
			'staff_training' => 'Staff training programmes',
			'transmittal_letter' => 'Transmittal Letter',
			'receipt_photocopy' => 'Receipt Photocopy',
			'company_memorandum' => 'Company Memorandum',
			'track_record' => 'Track Record',
			'company_profile' => 'Company Profile',
			'certificate_incorporation' => 'Certificate Incorporation',
			'network_diagram' => 'Network Diagram',
			'manual' => 'Manual',
			'rollout_plan' => 'Rollout Plan',
			'network_configuration' => 'Network Configuration',
			'service_offered' => 'Service Offered',
			'costing_structure' => 'Costing Structure',
			'service_pricing' => 'Service Pricing',
			'customer_care' => 'Customer Care',
			'financial_statement' => 'Financial Statement',
			'financing_plan' => 'Financing Plan',
			'capital_investment' => 'Capital Investment',
			'human_resource' => 'Human Resource',
			'declared_signed' => 'Declared and Signed',
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

		$criteria->compare('nature',$this->nature,true);

		$criteria->compare('area',$this->area,true);

		$criteria->compare('estimated_cost',$this->estimated_cost,true);

		$criteria->compare('estimated_cost_currency',$this->estimated_cost_currency,true);

		$criteria->compare('use_frequency',$this->use_frequency);

		$criteria->compare('staff',$this->staff,true);

		$criteria->compare('future_plans',$this->future_plans,true);

		$criteria->compare('staff_training',$this->staff_training,true);

		$criteria->compare('transmittal_letter',$this->transmittal_letter);

		$criteria->compare('receipt_photocopy',$this->receipt_photocopy);

		$criteria->compare('company_memorandum',$this->company_memorandum);

		$criteria->compare('track_record',$this->track_record);

		$criteria->compare('company_profile',$this->company_profile);

		$criteria->compare('certificate_incorporation',$this->certificate_incorporation);

		$criteria->compare('network_diagram',$this->network_diagram,true);

		$criteria->compare('manual',$this->manual);

		$criteria->compare('rollout_plan',$this->rollout_plan);

		$criteria->compare('network_configuration',$this->network_configuration);

		$criteria->compare('service_offered',$this->service_offered);

		$criteria->compare('costing_structure',$this->costing_structure);

		$criteria->compare('service_pricing',$this->service_pricing);

		$criteria->compare('customer_care',$this->customer_care);

		$criteria->compare('financial_statement',$this->financial_statement);

		$criteria->compare('financing_plan',$this->financing_plan);

		$criteria->compare('capital_investment',$this->capital_investment);

		$criteria->compare('human_resource',$this->human_resource);

		return new CActiveDataProvider('ApplicationCommunication', array(
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
