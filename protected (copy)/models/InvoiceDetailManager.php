<?php
Yii::import('ext.TabularInputManager'); 
class InvoiceDetailManager extends TabularInputManager
{
 
    protected $class='InvoiceDetail';
 
    public function getItems()
    {
        if (is_array($this->_items))
            return ($this->_items);
        else 
            return array(
                'n0'=>new InvoiceDetail,
            );
    }
 
 
    public function deleteOldItems($model, $itemsPk)
    {
        $criteria=new CDbCriteria;
        $criteria->addNotInCondition('id', $itemsPk);
        $criteria->addCondition("invoice_id = {$model->primaryKey}");
 
        InvoiceDetail::model()->deleteAll($criteria); 
    }
 
 
    public static function load($model)
    {
        $return= new InvoiceDetailManager;
        foreach ($model->invoiceDetails as $item)
            $return->_items[$item->primaryKey]=$item;
        return $return;
    }
 
 
    public function setUnsafeAttribute($item, $model)
    {
        $item->invoice_id=$model->primaryKey;
 
    }
 
 
}
?>