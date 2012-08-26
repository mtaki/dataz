<?php

/**
 * This is the model class for table "complaint".
 *
 * The followings are the available columns in table 'complaint':
 * @property string $id
 * @property string $complainant_id
 * @property string $respondent_id
 * @property string $description
 * @property string $relief
 * @property string $verification_comp_signatory
 * @property string $verification_comp_date
 * @property string $verification_appl_date
 * @property string $verification_tcra_signatory
 * @property string $verification_tcra_date
 * @property string $verification_resp_signatory
 * @property string $verification_resp_date
 * @property string $complaint_types
 * @property string $status
 * @property string $stage
 * @property string $relief_type_id
 * @property string $responce
 * @property string $verification
 * @property integer $region_id
 * @property integer $sector_id
 */
class Complaint extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Complaint the static model class
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
		return 'complaint';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('region_id, sector_id', 'numerical', 'integerOnly'=>true),
			array('complainant_id, respondent_id, relief_type_id', 'length', 'max'=>20),
			array('responce,verification', 'length', 'max'=>200),
			array('complainant_id, respondent_id,description, relief, sector_id,region_id', 'required'),
			array('complainant_id, respondent_id, relief_type_id', 'length', 'max'=>20),
			array('verification_comp_signatory, verification_tcra_signatory, verification_resp_signatory, complaint_types, status, stage', 'length', 'max'=>50),
			
			array('verification_comp_date, verification_appl_date, verification_tcra_date, verification_resp_date', 'safe'),
			array('verification_comp_date, verification_appl_date, verification_tcra_date, verification_resp_date', 'type', 'type' => 'date', 'message' => '{attribute}: is not a valid date!', 'dateFormat' => Yii::app()->locale->dateFormat,'allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, complainant_id, respondent_id, description, relief, verification_comp_signatory, verification_comp_date, verification_appl_date, verification_tcra_signatory, verification_tcra_date, verification_resp_signatory, verification_resp_date, complaint_types, status, stage, relief_type_id, responce, verification, region_id, sector_id', 'safe', 'on'=>'search'),
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
			'complainant'=>array(self::BELONGS_TO, 'ComplaintParty', 'complainant_id','joinType'=>'INNER JOIN'),
			'respondent'=>array(self::BELONGS_TO, 'ComplaintParty', 'respondent_id','joinType'=>'INNER JOIN'),
			'complaintTypes' => array(self::MANY_MANY, 'ComplaintType', 'complaint2type(complaint_id, type_id)'),
			'region'=>array(self::BELONGS_TO, 'Region', 'region_id','joinType'=>'INNER JOIN'),
			'sector'=>array(self::BELONGS_TO, 'ComplaintSector', 'sector_id','joinType'=>'INNER JOIN'),
			'reliefType'=>array(self::BELONGS_TO, 'ReliefType', 'relief_type_id','joinType'=>'INNER JOIN'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'complainant_id' => 'Complainant',
			'respondent_id' => 'Respondent',
			'description' => 'Description',
			'relief' => 'Relief',
			'verification_comp_signatory' => 'Complainant Representative',
			'verification_comp_date' => 'Complainant Sig Date',
			'verification_appl_date' => 'Verification Appl Date',
			'verification_tcra_signatory' => 'TCRA Representative',
			'verification_tcra_date' => 'TCRA Sign Date',
			'verification_resp_signatory' => 'Respondent Representative',
			'verification_resp_date' => 'Respondent Sign Date',
			'complaint_types' => 'Complaint Types',
			'status' => 'Status',
			'stage' => 'Stage',
			'relief_type_id' => 'Relief Type',
			'responce' => 'Responce',
			'verification' => 'Verification',
			'region_id' => 'Region',
			'sector_id' => 'Sector',
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
		$criteria->with=array('region','sector','complainant');
		$criteria->compare('t.id',$this->id,false);

		$criteria->compare('t.complainant_id',$this->complainant_id,true);

		$criteria->compare('t.respondent_id',$this->respondent_id,true);

		$criteria->compare('t.description',$this->description,true);

		$criteria->compare('t.relief',$this->relief,true);

		if (Yii::app()->controller->action->id=='admin'){
			$criteria->addCondition("t.status='Received' OR t.stage='TCRA Action'", 'AND');
		}
		elseif (Yii::app()->controller->action->id=='tcraList'){
			$criteria->addCondition("t.status='Received' OR t.stage='TCRA Action'", 'AND');
		}
		elseif (Yii::app()->controller->action->id=='committeeList'){
			$criteria->addCondition("t.stage='TCRA Committee'", 'AND');
		}
		elseif (Yii::app()->controller->action->id=='tribunalList'){
			$criteria->addCondition("t.stage='Tribunal' AND t.status <> 'Closed'", 'AND');
		}
		
		$criteria->compare('t.status',$this->status,true);

		$criteria->compare('t.stage',$this->stage,true);

		$criteria->compare('t.region_id',$this->region_id);

		$criteria->compare('t.sector_id',$this->sector_id);
		$criteria->order='t.id desc';
		return new CActiveDataProvider('Complaint', array(
			'criteria'=>$criteria,
		));
	}
	
	public function getViewUrl(){
		$action='update';
		
		if(Yii::app()->controller->action->id=='tcraList')
			$action= 'tcra';
		elseif(Yii::app()->controller->action->id=='committeeList')
			$action='committee';
		elseif(Yii::app()->controller->action->id=='tribunalList')
			$action= 'tribunal';
		elseif(Yii::app()->controller->action->id=='viewList')
			$action= 'view';
		return Yii::app()->createUrl("complaint/$action",array('id'=>$this->id));
	}
	
	public function behaviors()
	{
	    return array(
	    'datetimeI18NBehavior' => array('class' => 'application.extensions.DateTimeI18NBehavior'),
	    'CAdvancedArBehavior' => array('class' => 'application.extensions.CAdvancedArBehavior')
	    ); 
	}
}
