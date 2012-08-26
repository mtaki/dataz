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
if(document.getElementById("StatisticsInternetMain_operator_id").value != ''){
	url=url+'/id/'+document.getElementById('StatisticsInternetMain_operator_id').value;
	aWindow = window.open(url,
	       'thewindow','width=800,height=200,location=no,resizable=yes,scrollbars=yes,screenX=20,screenY=20,top=20,left=20');
	}
}
</script>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Subscriptions Base')); ?>
<?php
if (!$model->isNewRecord){
	$statisticsInternetBases=StatisticsInternetBase::model()->findAll('main_id='.$model->id);
	$basearr=array();
	foreach ($statisticsInternetBases as $statisticsInternetBase){
		$basearr[$statisticsInternetBase->subscriber_type_id.'_cafe']=$statisticsInternetBase->num_cafe;
		$basearr[$statisticsInternetBase->subscriber_type_id.'_business']=$statisticsInternetBase->num_business;
		$basearr[$statisticsInternetBase->subscriber_type_id.'_resident']=$statisticsInternetBase->num_resident;
	}
}
$subcrition_base="<B>INTERNET AND OTHER DATA SERVICES SUBSCRIBER BASE</B><BR/><table  border='1'  cellspacing=0>";
$subcrition_base.="<tr><td><b>Subscriber type</b></td><td><b>Number of Internet cafes</b></td><td><b>Number of Business firms</b></td><td><b>Number of Individuals/Households</b></td></tr>";

$internetSubscriberTypes=InternetSubscriberType::model()->findAll(array('order'=>'t.id'));
foreach ($internetSubscriberTypes as $internetSubscriberType){
	$num_cafe=$num_business=$num_resident='';
	if (isset($basearr[$internetSubscriberType->id.'_cafe'])){
		$num_cafe=$basearr[$internetSubscriberType->id.'_cafe'];
		$num_cafe=number_format($num_cafe,0);
	}
	if (isset($basearr[$internetSubscriberType->id.'_business'])){
		$num_business=$basearr[$internetSubscriberType->id.'_business'];
		$num_business=number_format($num_business,0);
	}
	if (isset($basearr[$internetSubscriberType->id.'_resident'])){
		$num_resident=$basearr[$internetSubscriberType->id.'_resident'];
		$num_resident=number_format($num_resident,0);
	}	
		
	$subcrition_base.="<tr><td>".$internetSubscriberType->name."</td><td><input size='10'  style='text-align: right' type='text' name='base_cafe_".$internetSubscriberType->id."' value='$num_cafe' /></td><td><input size='10'  style='text-align: right'  type='text' name='base_business_".$internetSubscriberType->id."' value='$num_business' /></td><td><input size='10' type='text'  style='text-align: right' name='base_resident_".$internetSubscriberType->id."' value='$num_resident'></td></tr>\n";
	
}
$subcrition_base.="</table>";
echo $subcrition_base;
?>
<?php $this->endWidget(); ?>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Bandwidth Capacity')); ?>
<?php 
if (!$model->isNewRecord){
	$statisticsInternetTariffs=StatisticsInternetTariff::model()->findAll('main_id='.$model->id);
	$tariffArray=array();
	foreach ($statisticsInternetTariffs as $statisticsInternetTariff){
		$tariffArray[$statisticsInternetTariff->subscriber_type_id.'_actual']=$statisticsInternetTariff->actual;
		$tariffArray[$statisticsInternetTariff->subscriber_type_id.'_used']=$statisticsInternetTariff->used;
	}
}

$fee="<table  border='1'  cellspacing=0>";
$fee.="<tr><td><b>Type of Link</b></td><td><b>Actual</b></td><td><b>Used</b></td></tr>";


$internetSubscriberTypes=InternetLinkType::model()->findAll(array('order'=>'t.id'));

foreach ($internetSubscriberTypes as $internetSubscriberType){
	
	$fee_amount='';
	$charge_amount='';
	$actual=$used='';
	if (isset($tariffArray[$internetSubscriberType->id.'_actual'])){
		$actual=$tariffArray[$internetSubscriberType->id.'_actual'];
		$actual=number_format($actual,0);
	}
		
	if (isset($tariffArray[$internetSubscriberType->id.'_used'])){
		$used=$tariffArray[$internetSubscriberType->id.'_used'];
		$used=number_format($used,0);
	}
		
	$fee.="<tr><td>".$internetSubscriberType->name."</td><td><input size='10' type='text'  style='text-align: right'  name='actual_".$internetSubscriberType->id."' value='$actual'></td><td><input size='10' type='text'  style='text-align: right'  name='used_".$internetSubscriberType->id."' value='$used'></td></tr>\n";
	
}
$fee.="</table>";	
echo $fee;
?>
<?php $this->endWidget(); ?>

<?php
$tabParameters = array();
foreach($this->clips as $key=>$clip)
    $tabParameters['tab'.(count($tabParameters)+1)] = array('title'=>$key, 'content'=>$clip);
?>
 
<?php $this->widget('system.web.widgets.CTabView', array('tabs'=>$tabParameters)); ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Save',array('name'=>($model->isNewRecord)?'create':'update')); ?>
		<?php
		if (!$model->isNewRecord)
			 echo CHtml::Button('Add New Record',array('submit'=>Yii::app()->controller->createUrl('create')));?>
		<?php echo CHtml::Button('Find Record',array('submit'=>Yii::app()->controller->createUrl('admin')));?>
	</div>

<?php $this->endWidget(); ?>
