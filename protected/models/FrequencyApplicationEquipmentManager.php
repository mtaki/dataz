<?php
Yii::import('ext.TabularInputManager');
class FrequencyApplicationEquipmentManager extends TabularInputManager
{
    protected $class='FrequencyApplicationEquipment';

    public function getItems()
    {
        if (is_array($this->_items))
            return ($this->_items);
        else
            return array(
                'n0'=>new FrequencyApplicationEquipment,
            );
    }

    public function deleteOldItems($model, $itemsPk)
    {
        $criteria=new CDbCriteria;
        $criteria->addNotInCondition('id', $itemsPk);
        $criteria->addCondition("id = {$model->primaryKey}");

        FrequencyApplicationEquipment::model()->deleteAll($criteria);
    }


    public static function load($model)
    {
        $return= new FrequencyApplicationEquipmentManager;
        foreach ($model->frequencyAssignment as $item)
            $return->_items[$item->primaryKey]=$item;
        return $return;
    }


    public function setUnsafeAttribute($item, $model)
    {
        $item->application_id=$model->primaryKey;

    }
}
?>