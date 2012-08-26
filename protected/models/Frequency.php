<?php

/**
 * This is the model class for table "frequency".
 *
 * The followings are the available columns in table 'frequency':
 * @property string $id
 * @property string $frequency_1
 * @property string $frequency_2
 * @property string $frequency_3
 * @property string $frequency_4
 * @property integer $number_channel
 * @property string $frequency_unit
 * @property string $operator_id
 * @property string $status
 * @property string $frequency_type_id
 * @property string $frequency_sub_type_id
 * @property string $frequency_trans_id
 * @property string $band
 * @property string $band_unit
 * @property string $separation
 * @property string $separation_unit
 * @property string $channel_band_width
 * @property string $channel_band_width_unit
 * @property string $frequency_band_width
 * @property string $frequency_band_width_unit
 * @property string $direction
 * @property integer $zone
 * @property string $point_a
 * @property string $point_b
 * @property integer $channel
 * @property integer $region_id
 */
class Frequency extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Frequency the static model class
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
		return 'frequency';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('operator_id,total_band_width,description', 'required'),
			array('number_channel, zone, channel, region_id,tx_rx_spacing', 'numerical'),
			array('frequency_1, frequency_2, frequency_3, frequency_4, band, separation, channel_band_width, frequency_band_width', 'length', 'max'=>38),
			array('frequency_unit, operator_id, frequency_type_id, frequency_trans_id, band_unit, separation_unit, channel_band_width_unit, frequency_band_width_unit, direction', 'length', 'max'=>20),
			array('status, point_a, point_b,comments,description', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, frequency_1, frequency_2, frequency_3, frequency_4, number_channel, frequency_unit, operator_id, status, frequency_type_id, frequency_trans_id, band, band_unit, separation, separation_unit, channel_band_width, channel_band_width_unit, frequency_band_width, frequency_band_width_unit, direction, zone, point_a, point_b, channel, region_id,description', 'safe', 'on'=>'search'),
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
			'operator'=>array(self::BELONGS_TO, 'Operator', 'operator_id','joinType'=>'INNER JOIN'),
			'frequencyType'=>array(self::BELONGS_TO, 'FrequencyType', 'frequency_type_id','joinType'=>'INNER JOIN'),
			'frequencyTransmission'=>array(self::BELONGS_TO, 'FrequencyTrans', 'frequency_trans_id'),
			'frequencyBand'=>array(self::BELONGS_TO, 'FrequencyFee', 'band'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'frequency_1' => 'Frequency 1',
			'frequency_2' => 'Frequency 2',
			'frequency_3' => 'Frequency 3',
			'frequency_4' => 'Frequency 4',
			'number_channel' => 'Number Channel',
			'frequency_unit' => 'Frequency Unit',
			'operator_id' => 'Operator',
			'status' => 'Status',
			'frequency_type_id' => 'Frequency Type',
			'frequency_sub_type_id' => 'Frequency Sub Type',
			'frequency_trans_id' => 'Frequency Trans',
			'band' => 'Band',
			'band_unit' => 'Band Unit',
			'separation' => 'Separation',
			'separation_unit' => 'Separation Unit',
			'channel_band_width' => 'Channel Band Width',
			'channel_band_width_unit' => 'Channel Band Width Unit',
			'frequency_band_width' => 'Frequency Band Width',
			'frequency_band_width_unit' => 'Frequency Band Width Unit',
			'direction' => 'Direction',
			'zone' => 'Zone',
			'point_a' => 'Point A',
			'point_b' => 'Point B',
			'channel' => 'Channel',
			'region_id' => 'Region',
			'total_band_width'=>'Total band width',
			'description'=>'Description',
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

		$criteria->compare('frequency_1',$this->frequency_1,true);

		$criteria->compare('frequency_2',$this->frequency_2,true);

		$criteria->compare('frequency_3',$this->frequency_3,true);

		$criteria->compare('frequency_4',$this->frequency_4,true);

		$criteria->compare('number_channel',$this->number_channel);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('frequency_unit',$this->frequency_unit,true);

		$criteria->compare('operator_id',$this->operator_id,true);

		$criteria->compare('status',$this->status,true);

		$criteria->compare('frequency_type_id',$this->frequency_type_id,true);

		$criteria->compare('frequency_sub_type_id',$this->frequency_sub_type_id,true);

		$criteria->compare('frequency_trans_id',$this->frequency_trans_id,true);

		$criteria->compare('band',$this->band,true);

		$criteria->compare('band_unit',$this->band_unit,true);

		$criteria->compare('separation',$this->separation,true);

		$criteria->compare('separation_unit',$this->separation_unit,true);

		$criteria->compare('channel_band_width',$this->channel_band_width,true);

		$criteria->compare('channel_band_width_unit',$this->channel_band_width_unit,true);

		$criteria->compare('frequency_band_width',$this->frequency_band_width,true);

		$criteria->compare('frequency_band_width_unit',$this->frequency_band_width_unit,true);

		$criteria->compare('direction',$this->direction,true);

		$criteria->compare('zone',$this->zone);

		$criteria->compare('point_a',$this->point_a,true);

		$criteria->compare('point_b',$this->point_b,true);

		$criteria->compare('channel',$this->channel);

		$criteria->compare('region_id',$this->region_id);

		return new CActiveDataProvider('Frequency', array(
			'criteria'=>$criteria,
		));
	}
	public function getFee(){
		$bandWidth=$this->total_band_width;
		$total_band_fee=0;
		$str=$this->frequencyType->formula;
		eval($str);
		if ($this->frequency_type_id==2) //cellular
			return $total_band_fee * $this->zone;
		return $total_band_fee;
	}
	public function getFrequencyView(){
		$str='';
		if ($this->frequency_type_id==1){
			$str="".($this->frequency_1 + 0)." \n
				Separation ".($this->separation + 0)." \n
				Spacing ".($this->tx_rx_spacing + 0)."
			";
		}else{
			$str=($this->frequency_1 + 0)." - ".($this->frequency_2 + 0)." U/L ".
				($this->frequency_3 + 0)." - ".($this->frequency_4 + 0)." D/L";
		}
		return $str;
	}
	public function behaviors()
	{
	    return array(
	        // Classname => path to Class
	        'ActiveRecordLogableBehavior'=>'application.behaviors.ActiveRecordLogableBehavior',
	    );
	}
}