<?php

/**
 * This is the model class for table "frequency_link".
 *
 * The followings are the available columns in table 'frequency_link':
 * @property string $id
 * @property integer $frequency_link_type_id
 * @property integer $num
 * @property string $description
 *  @property integer $operator_id
 */
class FrequencyLink extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FrequencyLink the static model class
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
		return 'frequency_link';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('frequency_link_type_id, num, operator_id', 'required'),
			array('frequency_link_type_id,operator_id, num', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, frequency_link_type_id, num, description,operator_id', 'safe', 'on'=>'search'),
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
			'frequencyLinkType' => array(self::BELONGS_TO, 'FrequencyLinkType', 'frequency_link_type_id'),
			'operator' => array(self::BELONGS_TO, 'Operator', 'operator_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'frequency_link_type_id' => 'Type',
			'num' => 'Number of Links',
			'description' => 'Description',
			'operator_id'=>'Operator',
			'frequencyLinkType.name'=>'Type',
			'operator.name'=>'Operator',
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

		$criteria->compare('frequency_link_type_id',$this->frequency_link_type_id);
		$criteria->compare('operator_id',$this->operator_id);
		$criteria->compare('num',$this->num);

		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider(get_class($this), array(
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