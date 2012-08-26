<?php

/**
 * This is the model class for table "licence_sub_category".
 *
 * The followings are the available columns in table 'licence_sub_category':
 * @property integer $id
 * @property string $name
 * @property integer $licence_category_id
 */
class LicenceSubCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return LicenceSubCategory the static model class
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
		return 'licence_sub_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, licence_category_id', 'required'),
			array('id, licence_category_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, licence_category_id', 'safe', 'on'=>'search'),
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
			'licenceCategory'=>array(self::BELONGS_TO, 'LicenceCategory', 'licence_category_id','joinType'=>'INNER JOIN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Sub Category',
			'licence_category_id' => 'Licence&nbsp;Category',
			'licenceCategory.name' => 'Licence&nbsp;Category'
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
		$criteria->compare('t.id',$this->id);

		$criteria->compare('t.name',$this->name,true);

		$criteria->compare('t.licence_category_id',$this->licence_category_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
