<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'report-form',
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>
	<table>
	<tr><td>Name</td><td colspan='2'><?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>100)); ?></td></tr>
	<tr><td>Group</td><td colspan='2'>
	<?php
	$ms=ReportGroup::model()->findAll();
		$mArray=array();
		$mArray['']='Select';
		foreach($ms as $m){
			$mArray[$m->id]=$m->name;
		}
		echo CHtml::dropDownList('Report[report_group_id]',$model->report_group_id, $mArray);
	?>	
	</td></tr>
	
	<tr><td>File</td><td colspan='2'><?php echo $form->textField($model,'file_name',array('size'=>20,'maxlength'=>50)); ?></td></tr>
	<tr><td>Use Having</td><td colspan='2'>
<?php
	
		$mArray=array();
		$mArray['No']='No';
		$mArray['Yes']='Yes';
		echo CHtml::dropDownList('Report[use_having]',$model->use_having, $mArray);
	?>	
</td></tr>
	<tr><td>SQL<br/><?php echo $form->textArea($model,'sql',array('size'=>20)); ?></td><td colspan='2' valign='top'>SQL Where<BR/><?php echo $form->textArea($model,'sql_where',array('size'=>20)); ?></td></tr>
	<tr><td>SQL Group<BR/><?php echo $form->textArea($model,'sql_group',array('size'=>20)); ?></td><td colspan='2' valign='top'>SQL Order<BR/><?php echo $form->textArea($model,'sql_order',array('size'=>20)); ?></td></tr>
	<tr><td colspan='3'>Parameters</td></tr>
	<tr><td>Parameter</td><td>Type</td><td>Description</td><td>Column</td><td>Condition</td></tr>
	<?php 
	$mArray=array();
	$mArray['']='Select';
	$mArray['text']='Text';
	$mArray['numerical']='Numerical';
	$mArray['date']='Date';	
	$mArray['year']='Year';
	$mArray['quarter']='Quarter';
	$mArray['quarterNumber']='QuarterNumber';
	
	$mArray2=array();
	$mArray2['=']='Equal';
	$mArray2['like']='Contains';
	$mArray2['<']='Less Than';
	$mArray2['>']='Greater Than';
	$mArray2['<=']='Less Than or Equal';
	$mArray2['>=']='Greater Than or Equal';
	for ($i=1;$i<=5;$i++){
		$type='type'.$i;
		$condition='condition'.$i;
		echo "<tr><td valign='top'>
		".$form->textField($model,'field'.$i,array('size'=>10,'maxlength'=>20))."
		</td><td valign='top'>
		".CHtml::dropDownList('Report[type'.$i.']',$model->$type, $mArray)."
		</td><td valign='top'>
		".$form->textField($model,'description'.$i,array('size'=>10,'maxlength'=>50))."
		</td><td valign='top'>
		".$form->textField($model,'column'.$i,array('size'=>10,'maxlength'=>200))."
		</td><td valign='top'>
		".CHtml::dropDownList('Report[condition'.$i.']',$model->$condition, $mArray2)."
		</td></tr>";
	}
	?>
	</table>
	<?php echo CHtml::submitButton('Save'); ?>
<?php $this->endWidget(); ?>

