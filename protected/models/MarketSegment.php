<?php

/**
 * This is the model class for table "market_segment".
 *
 * The followings are the available columns in table 'market_segment':
 * @property string $id
 * @property string $name
 * @property string $licence_category_id
 * @property integer $order_code
 */
class MarketSegment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return MarketSegment the static model class
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
		return 'market_segment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_code', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('licence_category_id', 'length', 'max'=>20),
			array('licence_category_id,name', 'required'),
			array('licence_sub_category_id', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, licence_category_id, order_code', 'safe', 'on'=>'search'),
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
			'category'=>array(self::BELONGS_TO, 'LicenceCategory', 'licence_category_id'),
			'licenceCategory'=>array(self::BELONGS_TO, 'LicenceCategory', 'licence_category_id'),
			'licenceSubCategory'=>array(self::BELONGS_TO, 'LicenceSubCategory', 'licence_sub_category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'name' => 'Market Segment',
			'licence_category_id' => 'Licence Type',
			'order_code' => 'Order Code',
			'licenceCategory.name'=>'Licence Type',
			'licenceSubCategory.name' => 'Category',
			'licence_sub_category_id' => 'Category'
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
		$criteria->with=array('licenceCategory');
		$criteria->compare('t.id',$this->id,true);

		$criteria->compare('t.name',$this->name,true);

		$criteria->compare('t.licence_category_id',$this->licence_category_id,false);
		$criteria->compare('t.licence_sub_category_id',$this->licence_sub_category_id,false);
		$criteria->compare('order_code',$this->order_code);

		return new CActiveDataProvider('MarketSegment', array(
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
