<?php

/**
 * This is the model class for table "report".
 *
 * The followings are the available columns in table 'report':
 * @property string $id
 * @property string $name
 * @property string $report_group_id
 * @property string $file_name
 * @property string $sql
 * @property string $field1
 * @property string $field2
 * @property string $field3
 * @property string $field4
 * @property string $field5
 * @property string $type1
 * @property string $type2
 * @property string $type3
 * @property string $type4
 * @property string $type5
 * @property string $description1
 * @property string $description2
 * @property string $description3
 * @property string $description4
 * @property string $description5
 */
class Report extends CActiveRecord
{
	public $input1;
	public $input2;
	public $input3;
	public $input4;
	public $input5;
	public $myRules=array(
			array('name, file_name', 'length', 'max'=>100),
			array('report_group_id', 'length', 'max'=>20),
			array('sql', 'length', 'max'=>3000),
			array('use_having', 'length', 'max'=>3),
			array('sql_where,sql_order,sql_group', 'length', 'max'=>200),
			array('field1,field2,field3,field4,field5,type1,type2,type3,type4,type5', 'length', 'max'=>20),
			array('description1,description2,description3,description4,description5', 'length', 'max'=>50),
			array('condition1,condition2,condition3,condition4,condition5', 'length', 'max'=>10),
			array('column1,column2,column3,column4,column5', 'length', 'max'=>200),
			array('id, name, report_group_id, sql, file_name', 'safe', 'on'=>'search'),
	);
	public $myLables=array(
			'id' => 'Id',
			'name' => 'Name',
			'report_group_id' => 'Report Group',
			'file_name' => 'File Name',
			'reportGroup.name'=>'Group',
	);
	/**
	 * Returns the static model of the specified AR class.
	 * @return Report the static model class
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
		return 'report';
	}
	/**
	 * @return void
	 */
	public function setRules($rules)
	{
		$this->myRules=$rules;
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return $this->getRules();
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function getRules(){
		return $this->myRules;
	}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		'reportGroup'=>array(self::BELONGS_TO, 'ReportGroup', 'report_group_id','joinType'=>'INNER JOIN'),
		);
	}
	
	public function setLabels($labels)
	{
		$this->myLables=$labels;
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return $this->myLables;
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
		$criteria->with=array('reportGroup');
		$criteria->compare('t.id',$this->id,true);

		$criteria->compare('t.name',$this->name,true);

		$criteria->compare('t.report_group_id',$this->report_group_id,true);
		if ((Yii::app()->controller->action->id=='licencingList'))
			$criteria->compare('reportGroup.name','Licencing',true);
		elseif ((Yii::app()->controller->action->id=='spectrumList'))
			$criteria->compare('reportGroup.name','Spectrum',true);
		elseif ((Yii::app()->controller->action->id=='broadcastingList'))
			$criteria->compare('reportGroup.name','Broadcasting',true);
		elseif ((Yii::app()->controller->action->id=='numberingList'))
			$criteria->compare('reportGroup.name','Numbering',true);	
		elseif ((Yii::app()->controller->action->id=='complaintList'))
			$criteria->compare('reportGroup.name','Complaints',true);	
		elseif ((Yii::app()->controller->action->id=='statisticsList'))
			$criteria->compare('reportGroup.name','Statistics',true);
		elseif ((Yii::app()->controller->action->id=='accountsList'))
			$criteria->compare('reportGroup.name','Accounts',true);
		//elseif ((Yii::app()->controller->action->id=='systemUnitList'))
			//$criteria->compare('reportGroup.name','SystemUnit',true);
		return new CActiveDataProvider('Report', array(
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
