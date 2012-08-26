<?php
$html="<table width='600' class='detail-view'>";
$html.="<tr align='left' class='odd'><th>Operator</th><td>$model->name</td><th>Address</th><td>$model->address</td></tr>";
$html.="<tr align='left' class='even'><th>Telephone</th><td>$model->telephone</td><th>Mobile</th><td>$model->mobile</td></tr>";
$html.="<tr align='left' class='odd'><th>Town</th><td>$model->town</td><th>Email</th><td>$model->email</td></tr>";
$html.="</table>";
echo $html;
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'numbering-application-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php echo $form->hiddenField($model,'name'); ?>
<?php echo CHtml::submitButton('Generate Annual Fee'); ?>
	
<?php $this->endWidget(); ?>