

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'familyHistory-form',
	'enableAjaxValidation'=>false,
));

?>

<?php echo $form->hiddenField($model,'id',array('size'=>25,'maxlength'=>50)); ?>
<h1><?php echo $model->id;?> Frequency Assignment</h1>
<table class="detail-view">
<tr class="odd">
    <td><?php echo FrequencyApplicationEquipment::model()->getAttributeLabel('type_service')?></td>
    <td><?php echo FrequencyApplicationEquipment::model()->getAttributeLabel('type_radio')?></td>
    <td><?php echo FrequencyApplicationEquipment::model()->getAttributeLabel('model')?></td>   
    <td><?php echo FrequencyApplicationEquipment::model()->getAttributeLabel('power')?></td>
    
    
    <td><?php echo CHtml::link('add', '#', array('submit'=>'', 'params'=>array('FrequencyApplicationEquipment[command]'=>'add', 'noValidate'=>true)));?></td>
</tr>
<?php
$class='odd';
foreach($frequencyApplicationEquipmentManager->items as $id=>$frequencyApplicationEquipment):?>

<?php
if ($class=='odd')
	$class='even';
else
	$class='odd';

$this->renderPartial('_assignment', array('id'=>$id, 'frequencyApplicationEquipment'=>$frequencyApplicationEquipment, 'form'=>$form,'class'=>$class));?>

<?php endforeach; ?>
</table>
<?php echo '<br/>';?>
<?php echo '&nbsp;&nbsp;&nbsp;'.CHtml::submitButton('Save',array('name'=>'update')); ?>

&nbsp;&nbsp;
<?php  echo CHtml::Button('Back',array('onClick'=>'history.go(-1)'));?>

<?php $this->endWidget(); ?>


