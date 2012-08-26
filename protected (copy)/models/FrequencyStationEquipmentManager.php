<?php
Yii::import('ext.TabularInputManager'); 
class FrequencyStationEquipmentManager extends TabularInputManager
{
 
    protected $class='FrequencyStationEquipment';
 
    public function getItems()
    {
        if (is_array($this->_items))
            return ($this->_items);
        else 
            return array(
                'n0'=>new FrequencyStationEquipment,
            );
    }
 
 
    public function deleteOldItems($model, $itemsPk)
    {
        $criteria=new CDbCriteria;
        $criteria->addNotInCondition('id', $itemsPk);
        $criteria->addCondition("station_id = {$model->primaryKey}");
 
        FrequencyStationEquipment::model()->deleteAll($criteria); 
    }
 
 
    public static function load($model)
    {
        $return= new FrequencyStationEquipmentManager;
        foreach ($model->frequencyStationEquipments as $item)
            $return->_items[$item->primaryKey]=$item;
        return $return;
    }
 
 
    public function setUnsafeAttribute($item, $model)
    {
        $item->station_id=$model->primaryKey;
 
    }
 
	public function validate($parent)
	{
		$valid=true;
		foreach ($this->_items as $i=>$model){
			$this->setUnsafeAttribute($model, $parent);
			$valid=$model->validate() && $valid;
		}
		return $valid;
	}
}
?>