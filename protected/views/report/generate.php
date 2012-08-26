<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'report-form',
	'enableAjaxValidation'=>false,
)); ?>
	<h1>Generate Report</h1>
	<?php echo $form->errorSummary($model); ?>
	<BR /><?php echo $model->name; ?>
	<table>
	<?php 
	$model=Report::model()->findByPk($_GET['id']);
	for ($i=1;$i<=5;$i++){
		$field='field'.$i;
		$type='type'.$i;
		$type=$model->$type;
		if (!empty($model->$field)){
			$name='input'.$i;
			$value='';
			if(!empty($_POST[$name]))
				$value=$_POST[$name];
			
			if ($type=='date'){
				echo "<tr><td valign='top'>".$model->$field."</td><td valign='top'>";
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			        'name'=>$name,
			        'value'=>$value,
			        'options'=>array(
			                'dateFormat'=>'dd-mm-yy',
			                'showAnim'=>'slideDown',
			                'showButtonPanel'=>'true',
			                'constrainInput'=>'false',
					),
					'htmlOptions'=>array('size'=>15), 
					)
			     );
				echo  "</td></tr>";
			}
			if ($type=='year'){
				echo "<tr><td valign='top'>".$model->$field."</td><td valign='top'>";
				echo "<select name=$name>";
				echo "<option value=''>Select Value</option>";
				for($k=date('Y');$k>=2000;$k--){
					echo "<option value='$k'>$k</option>";
				}
				echo "</select>";
				echo  "</td></tr>";
			}
			if ($type=='quarter'){
				echo "<tr><td valign='top'>".$model->$field."</td><td valign='top'>";
				echo "<select name=$name>";
				echo "<option value=''>Select Value</option>";
				echo "<option value='1'>First Quarter</option>";
				echo "<option value='2'>Second Quarter</option>";
				echo "<option value='3'>Third Quarter</option>";
				echo "<option value='4'>Fourth Quarter</option>";
				echo "</select>";
				echo  "</td></tr>";
			}
			if ($type=='quarterNumber'){
				echo "<tr><td valign='top'>".$model->$field."</td><td valign='top'>";
				echo "<select name=$name>";
				echo "<option value=''>Select Value</option>";
				echo "<option value='1'>First Quarter</option>";
				echo "<option value='2'>Second Quarter</option>";
				echo "<option value='3'>Third Quarter</option>";
				echo "<option value='4'>Fourth Quarter</option>";
				echo "</select>";
				echo  "</td></tr>";
			}
			if ($type=='text' || $type=='numerical'){
				echo "<tr><td valign='top'>".$model->$field."</td><td valign='top'>
				".CHtml::textField($name,$value,array('size'=>15))."
				</tr>";
			}
		}
	}
	?>
	<tr><td>Export</td><td>
	<select name='export'><option value='excel'>Excel</option><option value='pdf'>PDF</option></select>
	</td>
	</tr>
	<tr><td>Custom Title</td><td>
	<input name='customTitle'/>
	</td>
	</tr>
	</table>
	<?php echo CHtml::submitButton('Generate Report',array('name'=>'generateReport')) ?>
<?php $this->endWidget(); ?>

