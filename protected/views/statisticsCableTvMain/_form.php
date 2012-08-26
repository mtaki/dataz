<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'statistics-telecom-main-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
<table>
<tr><td>Operator</td>
<td>
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
 			 'value'=>(empty($model->operator_id))?'':$model->operator->name,
             'methodChain'=>".result(function(event,item){\$(\"#".get_class($model)."_operator_id\").val(item[1]);})",
             ));
    ?>
    <input type="button" onclick="openOperator();" value='View Contact Person'/>
</td></tr>
<tr><td>Year</td>
<td>
<?php 

	$mArray=array();
		$mArray['']='Select';
		
		$year=date('Y');
		for ($i=$year;$i>=1995;$i--){
			
			$mArray[$i]=$i;
		}
		echo CHtml::dropDownList(get_class($model).'[st_year]',$model->st_year, $mArray);
		
?>
</td></tr>
<tr><td>Month</td>
<td>
<?php 

	$mArray=array();
		$mArray['']='Select';
		
		$year=date('Y');
		for ($i=1;$i<=12;$i++){
			
			$mArray[$i]=date("M", mktime(0, 0, 0, $i));
		}
		echo CHtml::dropDownList(get_class($model).'[st_month]',$model->st_month, $mArray);
		
?>
</td></tr>
</table>
<script type="text/javascript">

function openOperator() {
var url='';
url='<?php echo Yii::app()->createUrl('operator/simpleView'); ?>';
if(document.getElementById("StatisticsCableTvMain_operator_id").value != ''){
	url=url+'/id/'+document.getElementById('StatisticsCableTvMain_operator_id').value;
	aWindow = window.open(url,
	       'thewindow','width=800,height=200,location=no,resizable=yes,scrollbars=yes,screenX=20,screenY=20,top=20,left=20');
	}
}
</script>
<?php 
if (!$model->isNewRecord){
	$statisticsCableTvBases=StatisticsCableTvBase::model()->findAll('main_id='.$model->id);
	$basearr=array();
	foreach ($statisticsCableTvBases as $statisticsCableTvBase){
		$basearr[''.$statisticsCableTvBase->subscriber_type_id]=$statisticsCableTvBase->num;
	}
}
$html="";
$subcrition_base="<table  border='1'  cellspacing=0>";
$subcrition_base.="<tr><td><b>Number/Bundle of Stations</b></td><td><b>Number of Subscribers</b></td></tr>";
$statisticsCableTypes=StatisticsCableType::model()->findAll(array('order'=>'t.id'));
foreach ($statisticsCableTypes as $statisticsCableType){
	$value='';
	if(isset($basearr[''.$statisticsCableType->id])){
		$value=$basearr[''.$statisticsCableType->id];
		$value=number_format($value,0);
	}
	$subcrition_base.="<tr><td>".$statisticsCableType->name."</td><td><input  style='text-align: right' type='text' name='base_m_".$statisticsCableType->id."' value='$value'/></td></tr>";
}
$subcrition_base.="</table>";
$html=$subcrition_base;
echo  $html;
?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Save',array('name'=>($model->isNewRecord)?'create':'update')); ?>
		<?php
		if (!$model->isNewRecord)
			 echo CHtml::Button('Add New Record',array('submit'=>Yii::app()->controller->createUrl('create')));?>
		<?php echo CHtml::Button('Find Record',array('submit'=>Yii::app()->controller->createUrl('admin')));?>
	</div>

<?php $this->endWidget(); ?>
