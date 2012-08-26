<?php

/**
 * This is the model class for table "licence_application".
 *
 * The followings are the available columns in table 'licence_application':
 * @property string $id
 * @property string $application_date
 * @property string $operator_id
 * @property string $start_date
 * @property string $signatory_name
 * @property string $signatory_title
 * @property string $sign_date
 * @property string $sign_location
 * @property string $status
 * @property string $licence_category_id
 * @property string $other_info
 * @property string $remarks
 * @property string $market_segment_id
 * @property string $effective_date
 * @property string $num
 * @property string $duration
 * @property integer $is_licence
 * @property string $issue_date
 * @property string $dispatch_name
 * @property string $dispatch_title
 * @property string $publication_date
 * @property string $media
 * @property string $cp_number
 * @property string $cp_issue_date
 * @property string $cp_effective_date
 * @property string $cp_expiry_date
 * @property integer $licence_sub_category_id
 * @property string $business_category
 */
class LicenceApplication extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return LicenceApplication the static model class
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
		return 'licence_application';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('operator_id,licence_category_id, market_segment_id', 'required'),
			array('is_licence', 'numerical', 'integerOnly'=>true),
			array('operator_id, licence_category_id, market_segment_id, market_segment_id_2', 'length', 'max'=>20),
			array('licence_sub_category_id', 'length', 'max'=>10),
			array('signatory_name, signatory_title, sign_location, status, num, dispatch_name, dispatch_title, cp_number, cp_issue_date', 'length', 'max'=>50),
			array('other_info, remarks', 'length', 'max'=>250),
			array('business_category', 'length', 'max'=>20),
			array('cp_number', 'length', 'max'=>50),
			array('duration', 'length', 'max'=>22),
			array('media', 'length', 'max'=>100),
			array('application_date,sign_date,start_date', 'type', 'type' => 'date', 'message' => '{attribute}: is not a valid date!', 'dateFormat' => Yii::app()->locale->dateFormat),
			array('effective_date, issue_date,num,duration', 'required','on'=>'issue'),
			array('num','unique','on'=>'issue'),
			array('effective_date, issue_date', 'type', 'type' => 'date', 'message' => '{attribute}: is not a valid date!', 'dateFormat' => Yii::app()->locale->dateFormat),
			array('cp_issue_date, cp_effective_date,cp_expiry_date', 'type', 'type' => 'date', 'message' => '{attribute}: is not a valid date!', 'dateFormat' => Yii::app()->locale->dateFormat,'allowEmpty'=>true),
			
			array('id, application_date, operator_id, market_segment_id,licence_category_id, issue_date, num', 'safe', 'on'=>'search'),
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
			'marketSegment'=>array(self::BELONGS_TO, 'MarketSegment', 'market_segment_id','joinType'=>'INNER JOIN'),
			'marketSegment2'=>array(self::BELONGS_TO, 'MarketSegment', 'market_segment_id_2','joinType'=>'INNER JOIN'),
			'licenceCategory'=>array(self::BELONGS_TO, 'LicenceCategory', 'licence_category_id','joinType'=>'INNER JOIN'),
			'licenceSubCategory'=>array(self::BELONGS_TO, 'LicenceSubCategory', 'licence_sub_category_id','joinType'=>'INNER JOIN'),
			'applicant'=>array(self::BELONGS_TO, 'Operator', 'operator_id','joinType'=>'INNER JOIN'),
			'operator'=>array(self::BELONGS_TO, 'Operator', 'operator_id','joinType'=>'INNER JOIN'),
			'rollOutPlans'=>array(self::HAS_MANY, 'RollOutPlan', 'licence_application_id'),	
		);
	}

	public function getFee(){
		return LicenceFee::model()->find("market_segment_id=".$this->market_segment_id." and licence_category_id=".$this->licence_category_id);
	}
	
	public function getFees(){
		$fee=LicenceFee::model()->find("market_segment_id=".$this->market_segment_id." and licence_category_id=".$this->licence_category_id);
		$fees=array();
		$fees['applicationFee']=$fee->application_fee;
		$fees['applicationFeeCurrency']=$fee->application_fee_currency_id;
		$fees['initialFee']=$fee->initial_fee;		
		$fees['initialFeeCurrency']=$fee->initial_fee_currency_id;
		$fees['anuualFee']=$fee->annual_fee;
		$fees['annualFeeCurrency']=$fee->annual_fee_currency_id;	
		$fees['annualFeeIsPercentage']=($fee->annual_fee_is_percentage == 1)?1:0;	
		$fees['duration']=$fee->duration;	
		if ($this->licence_category_id==4){ //content Licence
			if ($this->business_category == 'Public'){
				$fees['initialFee']=$fee->initial_public;
				$fees['anuualFee']=$fee->annual_public;
			}
			elseif ($this->business_category == 'Commercial'){
				$fees['initialFee']=$fee->initial_commercial;
				$fees['anuualFee']=$fee->annual_commercial;
			}
			elseif ($this->business_category == 'Non-Commerial'){
				$fees['initialFee']=$fee->initial_non_commercial;
				$fees['anuualFee']=$fee->annual_non_commercial;

			}
			elseif ($this->business_category == 'Community'){
				$fees['initialFee']=$fee->initial_community;
				$fees['anuualFee']=$fee->annual_community;
			}
			if ($fees['anuualFee'] > 0 && $fees['anuualFee']  < 100)
				$fees['annualFeeIsPercentage']=1;
		}
		
		return $fees;
	}
	public function getMarketSegments(){
		if (!empty($this->market_segment_id_2))
			return $this->marketSegment->name.' AND '.$this->marketSegment2->name;
		else 
			return $this->marketSegment->name;
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'application_date' => 'Application Date',
			'applicant.name'=>'Applicant',
			'operator_id' => 'Applicant',
			'start_date' => 'Start Date',
			'signatory_name' => 'Signatory Name',
			'signatory_title' => 'Signatory Title',
			'sign_date' => 'Sign Date',
			'sign_location' => 'Sign Location',
			'status' => 'Status',
			'licence_category_id' => 'Licence Category',
			'other_info' => 'Other Info',
			'remarks' => 'Remarks',
			'market_segment_id' => 'Market Segment',
			'effective_date' => 'Effective Date',
			'num' => 'Num',
			'duration' => 'Duration',
			'is_licence' => 'Is Licence',
			'issue_date' => 'Issue Date',
			'dispatch_name' => 'Dispatch Name',
			'dispatch_title' => 'Dispatch Title',
			'publication_date' => 'Publication Date',
			'media' => 'Media',
			'cp_number' => 'Cp Number',
			'cp_issue_date' => 'Cp Issue Date',
			'cp_effective_date' => 'Cp Effective Date',
			'cp_expiry_date' => 'Cp Expiry Date',
			'licenceCategory.name'=>'Licence Type',
			'licenceSubCategory.name'=>'Category'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->with=array('licenceCategory','applicant','marketSegment');
		$criteria->compare('t.id',$this->id);
		if ($this->application_date){
			$application_date=date($this->dateOutcomeFormat, CDateTimeParser::parse($this->application_date, Yii::app()->locale->dateFormat));
			$criteria->compare('application_date',$application_date,true);
		}
		if ($this->issue_date){
			$issue_date=date($this->dateOutcomeFormat, CDateTimeParser::parse($this->issue_date, Yii::app()->locale->dateFormat));
			$criteria->compare('issue_date',$issue_date,true);
		}
		$criteria->compare('operator_id',$this->operator_id,false);
		$criteria->compare('num',$this->num,false);
		if (Yii::app()->controller->action->id=='editList'){
			$criteria->addCondition("status='Received'", 'AND');
		}
		elseif (Yii::app()->controller->action->id=='evaluationList'){
			$criteria->addCondition("((status='Received' AND (t.licence_category_id NOT between 1 and 3)) OR status='Pre-Evaluated')  AND application_date IS NOT NULL", 'AND');
		}
		elseif (Yii::app()->controller->action->id=='approvalList'){
			$criteria->addCondition("(status='Evaluated' OR status='Pending Approval' OR status='Returned')  AND application_date IS NOT NULL", 'AND');
		}
		elseif (Yii::app()->controller->action->id=='issueList'){
			$criteria->addCondition("status='Prepared'  AND application_date IS NOT NULL", 'AND');
		}
		elseif (Yii::app()->controller->action->id=='printList'){
			$criteria->addCondition("status='Approved'  AND application_date IS NOT NULL", 'AND');
		}
		elseif (Yii::app()->controller->action->id=='prepareList'){
			$criteria->addCondition("(status='Approved' OR status='Prepared')  AND application_date IS NOT NULL", 'AND');
		}
		elseif (Yii::app()->controller->action->id=='viewList'){
			$criteria->addCondition("application_date IS NOT NULL", 'AND');
		}
		elseif (Yii::app()->controller->action->id=='licenceList'){
			$criteria->addCondition("is_licence=1", 'AND');
		}
		elseif (Yii::app()->controller->action->id=='annualFeeList'){
			$criteria->addCondition("is_licence=1", 'AND');
		}
		elseif (Yii::app()->controller->action->id=='cancelList'){
			$criteria->addCondition("is_licence=1 AND status='Active'", 'AND');
		}
		elseif (Yii::app()->controller->action->id=='renewList'){
			$criteria->addCondition("is_licence=1 AND (status='cancelled' OR status='Expired')", 'AND');
		}
		else 
			$criteria->compare('status',$this->status,true);
		$criteria->compare('t.licence_category_id',$this->licence_category_id);
		if (empty($_GET['LicenceApplication_sort']))
			$criteria->order='t.id';
		if (Yii::app()->controller->action->id=='licenceList') //sorting for licences
			$criteria->order='marketSegment.order_code, t.issue_date ';
		return new CActiveDataProvider('LicenceApplication', array(
			'criteria'=>$criteria,
		));
	}
	
	public function getViewUrl(){
		$action='';
		if(Yii::app()->controller->action->id=='editList')
			if($this->licenceCategory->id >=1 && $this->licenceCategory->id <=3)
				$action= 'editCommunication';
			elseif($this->licenceCategory->id >=5 && $this->licenceCategory->id <=10)
				$action= 'editCourier';
			elseif($this->licenceCategory->id==4)
				$action= 'editContent';
			elseif($this->licenceCategory->id==12)
				$action= 'editInstallation';
			elseif($this->licenceCategory->id==13)
				$action= 'editImportation';
			elseif($this->licenceCategory->id==14)
				$action= 'editDistribution';
			elseif($this->licenceCategory->id==15)
				$action= 'editSelling';
			else 	
				$action= 'edit';
		elseif(Yii::app()->controller->action->id=='evaluationList')
			$action= 'evaluation';
		elseif(Yii::app()->controller->action->id=='approvalList')
			$action= 'approval';
		elseif(Yii::app()->controller->action->id=='printList')
			$action= 'print';
		elseif(Yii::app()->controller->action->id=='prepareList')
			$action= 'prepare';
		elseif(Yii::app()->controller->action->id=='issueList')
			$action= 'issue';
		elseif(Yii::app()->controller->action->id=='licenceList')
			$action= 'licenceView';
		elseif(Yii::app()->controller->action->id=='annualFeeList')
			$action= 'annualFeeView';
		elseif(Yii::app()->controller->action->id=='cancelList')
			$action= 'cancelView';
		elseif(Yii::app()->controller->action->id=='renewList')
			$action= 'renewView';
		else 
			$action= 'view';
		return Yii::app()->createUrl("licenceApplication/$action",array('id'=>$this->id));
	}
	
	public function behaviors()
	{
	    return array(
	    	'datetimeI18NBehavior' => array('class' => 'application.extensions.DateTimeI18NBehavior'),
	    	'ActiveRecordLogableBehavior'=>'application.behaviors.ActiveRecordLogableBehavior',
	    ); 
	}
}
