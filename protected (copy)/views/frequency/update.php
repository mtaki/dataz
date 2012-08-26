<?php
$this->breadcrumbs=array(
	'Frequencys'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Frequency', 'url'=>array('index')),
	array('label'=>'Create Frequency', 'url'=>array('create')),
	array('label'=>'View Frequency', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Frequency', 'url'=>array('admin')),
);
?>

<h1>Update Frequency</h1>
<table > 
<tr>
<td><?php echo CHtml::Button('New',array('class'=>'myButton','submit'=>Yii::app()->controller->createUrl('create')));?></td>
<td><?php echo CHtml::Button('View',array('class'=>'myButton','submit'=>Yii::app()->controller->createUrl('view',array('id'=>$model->id))));?></td>
<td><?php echo CHtml::Button('Delete',array('class'=>'myButton','confirm'=>'Are you sure you want to delete this item?','submit'=>Yii::app()->controller->createUrl('delete',array('id'=>$model->id))));?></td>
<td><?php echo CHtml::Button('List',array('class'=>'myButton','submit'=>Yii::app()->controller->createUrl('admin')));?></td>
</tr>
</table>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'frequency-form',
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>
<?php if ($model->frequency_type_id==1){?>
Microwave Frequency
<table>
<tr><td>Operator</td><td>
<?php 
echo $form->hiddenField($model,'operator_id');
$this->widget('CAutoComplete',
          array(
                         //name of the html field that will be generated
             'name'=>'operator_name', 
                         //replace controller/action with real ids
             'url'=>array('operator/autoCompleteLookup'), 
             'max'=>10, //specifies the max number of items to display
 
                         //specifies the number of chars that must be entered 
                         //before autocomplete initiates a lookup
             'minChars'=>2, 
             'delay'=>500, //number of milliseconds before lookup occurs
             'matchCase'=>false, //match case when performing a lookup?
 
                         //any additional html attributes that go inside of 
                         //the input field can be defined here
             'htmlOptions'=>array('size'=>'15'), 
 			 'value'=>$model->operator->name,
             'methodChain'=>".result(function(event,item){\$(\"#Frequency_operator_id\").val(item[1]);})",
             ));
             echo $form->hiddenField($model,'frequency_type_id',array('value'=>$model->frequency_type_id));
             
   ?>
</td></tr>
<tr><td>Transmission System</td>
<td>
<?php $groups=FrequencyTrans::model()->findAll("frequency_type_id=1");
		$groupsArray=array();
		$groupsArray['']='Select';
		foreach($groups as $group){
			$groupsArray[$group->id]=$group->name;
		}
		echo CHtml::dropDownList('Frequency[frequency_trans_id]',$model->frequency_trans_id, $groupsArray);
		

?>
</td></tr>
<tr><td>Band</td><td>
<?php $groups=FrequencyFee::model()->findAll();
		$groupsArray=array();
		$groupsArray['']='Select';
		foreach($groups as $group){
			$groupsArray[$group->id]=$group->band.' - '.$group->description;
		}
		echo CHtml::dropDownList('Frequency[band]',$model->band, $groupsArray);
		

?>
</td></tr>
<tr><td>Description</td><td>
<?php 
echo $form->textField($model,'description');
?></td>
</tr>
<tr><td>Channel Band Width</td><td>
<?php 
echo $form->textField($model,'channel_band_width');
?></td></tr>
<tr><td>First Frequency</td><td>
<?php 
echo $form->textField($model,'frequency_1');
?>

</td></tr>
<tr><td>TX-RX Separation</td><td>
<?php 
echo $form->textField($model,'separation');
?></td></tr>
<tr><td>TX-RX Spacing</td><td>
<?php 
echo $form->textField($model,'tx_rx_spacing');
?></td></tr>

<tr><td>Number of channels</td><td>
<?php 
echo $form->textField($model,'channel');
?>
</td></tr>
<tr><td>Total Band Width</td><td>
<?php 
echo $form->textField($model,'total_band_width');
?> in MHz
</td></tr>
<tr><td valign='top'>Comments</td><td>
<?php 
echo $form->textArea($model,'comments');

?>
</td></tr>
</table>
	
<?php } ?>	
<?php if ($model->frequency_type_id==2){?>
Cellular Frequency
<table>
<tr><td>Operator</td><td>
<?php 
echo $form->hiddenField($model,'operator_id');
$this->widget('CAutoComplete',
          array(
                         //name of the html field that will be generated
             'name'=>'operator_name', 
                         //replace controller/action with real ids
             'url'=>array('operator/autoCompleteLookup'), 
             'max'=>10, //specifies the max number of items to display
 
                         //specifies the number of chars that must be entered 
                         //before autocomplete initiates a lookup
             'minChars'=>2, 
             'delay'=>500, //number of milliseconds before lookup occurs
             'matchCase'=>false, //match case when performing a lookup?
 
                         //any additional html attributes that go inside of 
                         //the input field can be defined here
             'htmlOptions'=>array('size'=>'15'), 
   			 'value'=>$model->operator->name,
             'methodChain'=>".result(function(event,item){\$(\"#Frequency_operator_id\").val(item[1]);})",
             ));
             echo $form->hiddenField($model,'frequency_type_id',array('value'=>$model->frequency_type_id));
             
   ?>
</td></tr>
<tr><td>Technology</td><td>
<?php $groups=FrequencyTrans::model()->findAll("frequency_type_id=2");
		$groupsArray=array();
		$groupsArray['']='Select';
		foreach($groups as $group){
			$groupsArray[$group->id]=$group->name;
		}
		echo CHtml::dropDownList('Frequency[frequency_trans_id]',$model->frequency_trans_id, $groupsArray);
		

?></td></tr>
<tr><td>Band</td><td>
<?php $groups=FrequencyFee::model()->findAll();
		$groupsArray=array();
		$groupsArray['']='Select';
		foreach($groups as $group){
			$groupsArray[$group->id]=$group->band.' - '.$group->description;
		}
		echo CHtml::dropDownList('Frequency[band]',$model->band, $groupsArray);
		

?></td></tr>
<tr><td>Description</td><td>
<?php 
echo $form->textField($model,'description');
?></td>
</tr>
<tr><td>Frequency Band Width</td>
<td><?php 
echo $form->textField($model,'frequency_band_width');
?>
</td></tr>

<tr>
<td>Number of zones</td><td>
<?php 
echo $form->textField($model,'zone');
?></td></tr></table>
<table>
<tr><td>Assigned Frequencies</td><td></td></tr>
<tr><td>
<?php 
echo $form->textField($model,'frequency_1');

?><?php 
echo $form->textField($model,'frequency_2');

?>U/L</td></tr>

<tr><td>
<?php 
echo $form->textField($model,'frequency_3');

?><?php 
echo $form->textField($model,'frequency_4');

?>D/L </td></tr></table>
<table>
<tr><td>Total Band Width</td><td>
<?php 
echo $form->textField($model,'total_band_width');
?> in MHz
</td></tr>
<tr><td valign='top'>Comments</td><td>
<?php 
echo $form->textArea($model,'comments');

?>
</td></tr>
</table>
	
<?php } ?>	
<?php if ($model->frequency_type_id==3){?>
Wireless Frequency
<table>
<tr><td>Operator</td><td>
<?php 
echo $form->hiddenField($model,'operator_id');
$this->widget('CAutoComplete',
          array(
                         //name of the html field that will be generated
             'name'=>'operator_name', 
                         //replace controller/action with real ids
             'url'=>array('operator/autoCompleteLookup'), 
             'max'=>10, //specifies the max number of items to display
 
                         //specifies the number of chars that must be entered 
                         //before autocomplete initiates a lookup
             'minChars'=>2, 
             'delay'=>500, //number of milliseconds before lookup occurs
             'matchCase'=>false, //match case when performing a lookup?
 
                         //any additional html attributes that go inside of 
                         //the input field can be defined here
             'htmlOptions'=>array('size'=>'15'), 
 			 'value'=>$model->operator->name,
             'methodChain'=>".result(function(event,item){\$(\"#Frequency_operator_id\").val(item[1]);})",
             ));
             echo $form->hiddenField($model,'frequency_type_id',array('value'=>$model->frequency_type_id));
            
   ?>
</td></tr>
<tr><td>Technology</td><td>
<?php $groups=FrequencyTrans::model()->findAll("frequency_type_id=3");
		$groupsArray=array();
		$groupsArray['']='Select';
		foreach($groups as $group){
			$groupsArray[$group->id]=$group->name;
		}
		echo CHtml::dropDownList('Frequency[frequency_trans_id]',$model->frequency_trans_id, $groupsArray);
		

?></td></tr>
<tr><td>Band</td><td>
<?php $groups=FrequencyFee::model()->findAll();
		$groupsArray=array();
		$groupsArray['']='Select';
		foreach($groups as $group){
			$groupsArray[$group->id]=$group->band.' - '.$group->description;
		}
		echo CHtml::dropDownList('Frequency[band]',$model->band, $groupsArray);
		

?></td></tr>
<tr><td>Description</td><td>
<?php 
echo $form->textField($model,'description');
?></td>
</tr>
<tr><td>Frequency Band Width</td>
<td><?php 
echo $form->textField($model,'frequency_band_width');
?>
</td></tr>
</table>
<table>
<tr><td>Assigned Frequencies</td><td></td></tr>
<tr><td>
<?php 
echo $form->textField($model,'frequency_1');

?><?php 
echo $form->textField($model,'frequency_2');

?>U/L</td></tr>

<tr><td>
<?php 
echo $form->textField($model,'frequency_3');

?><?php 
echo $form->textField($model,'frequency_4');

?>D/L</td></tr></table>
<table>
<tr><td>Total Band Width</td><td>
<?php 
echo $form->textField($model,'total_band_width');
?> in MHz
</td></tr>
<tr><td valign='top'>Comments</td><td>
<?php 
echo $form->textArea($model,'comments');

?>
</td></tr>
</table>

	
<?php } ?>
<?php echo CHtml::submitButton('Save'); ?>

<?php $this->endWidget(); ?>
