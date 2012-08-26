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
if(document.getElementById("StatisticsTelecomMain_operator_id").value != ''){
	url=url+'/id/'+document.getElementById('StatisticsTelecomMain_operator_id').value;
	aWindow = window.open(url,
	       'thewindow','width=800,height=200,location=no,resizable=yes,scrollbars=yes,screenX=20,screenY=20,top=20,left=20');
	}
}
</script>
<script type="text/javascript">
function thousandSeparator(n,sep) {
	var sRegExp = new RegExp('(-?[0-9]+)([0-9]{3})'),
	sValue=n+'';

	if (sep === undefined) {sep=',';}
	while(sRegExp.test(sValue)) {
		sValue = sValue.replace(sRegExp, '$1'+sep+'$2');
	}
	return sValue;
}
</script>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Subscriptions Base')); ?>
<?php 
$subcrition_base="<B>SUBSCRIPTIONS BASE</B><BR/><table  border='1'  cellspacing=0>\n";
$subcrition_base.="<tr><td><b>Service</b></td><td><b>Number of Subscriptions</b></td></tr>\n";

if (!$model->isNewRecord){
	$statisticsTelecomBases=StatisticsTelecomBase::model()->findAll('main_id='.$model->id);
	$basearr=array();
	foreach ($statisticsTelecomBases as $statisticsTelecomBase){
		$basearr[''.$statisticsTelecomBase->service_id]=$statisticsTelecomBase->num;
	}
}
$telecomServices=TelecomService::model()->findAll(array('order'=>'t.id'));
foreach ($telecomServices as $telecomService){
	$value='';
	if (isset($basearr[''.$telecomService->id])){
		$value=$basearr[''.$telecomService->id];
		$value=number_format($value,0);
	}
	$subcrition_base.="<tr><td>".$telecomService->name."</td><td><input type='text' style='text-align: right' id='base_".$telecomService->id."'  name='base_".$telecomService->id."' value='$value' onchange='document.getElementById(this.id).value=thousandSeparator(document.getElementById(this.id).value)' /></td></tr>\n";
}
$subcrition_base.="</table>";
echo $subcrition_base;
?>
	
<?php $this->endWidget(); ?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Traffic Air Time in Minutes')); ?>
<?php 
//traffic air time
if (!$model->isNewRecord){
	$statisticsTelecomTraffics=StatisticsTelecomTraffic::model()->findAll('main_id='.$model->id);
	$trafficArray=array();
	foreach ($statisticsTelecomTraffics as $statisticsTelecomTraffic){
		$trafficArray[$statisticsTelecomTraffic->destination_id.'_'.$statisticsTelecomTraffic->movement_id]=$statisticsTelecomTraffic->num;				
	}
	
}
$traffic="<B>TRAFFIC AIR TIME</B><BR/><table border='1'  cellspacing=0>\n";
$traffic.="<tr><td><b>Destination</b></td>\n";
$airTimeMovements=AirTimeMovement::model()->findAll(array('order'=>'t.id'));
	foreach ($airTimeMovements as $airTimeMovement){
		$traffic.="<td><b>".$airTimeMovement->name."</b></td>\n";
	}
$traffic.="</tr>\n";
$airTimeDestinations=AirTimeDestination::model()->findAll(array('order'=>'t.id'));
foreach ($airTimeDestinations as $airTimeDestination){
	$traffic.="<tr><td>".$airTimeDestination->name."</td>\n";
	foreach ($airTimeMovements as $airTimeMovement){	
		$value= (isset($trafficArray[$airTimeDestination->id.'_'.$airTimeMovement->id]))?$trafficArray[$airTimeDestination->id.'_'.$airTimeMovement->id]:'';
		if (!empty($value))
			$value=number_format($value,0);
		$traffic.="<td><input type='text' style='text-align: right' size='10' name='traffic_".$airTimeDestination->id."_".$airTimeMovement->id."'  id='traffic_".$airTimeDestination->id."_".$airTimeMovement->id."' value='$value'  onchange='document.getElementById(this.id).value=thousandSeparator(document.getElementById(this.id).value)' /></td>\n";
	}
	$traffic.="</tr>";
}
$traffic.="</table>";
echo $traffic;
?>
<?php $this->endWidget(); ?>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Short Messages')); ?>
<?php 

//number of messages
if (!$model->isNewRecord){
	$statisticsTelecomMasseges=StatisticsTelecomMasseges::model()->findAll('main_id='.$model->id);
	$messageArray=array();
	foreach ($statisticsTelecomMasseges as $statisticsTelecomMassege){
		$messageArray[$statisticsTelecomMassege->destination_id.'_'.$statisticsTelecomMassege->movement_id]=$statisticsTelecomMassege->num;				
	}
	
}
//messages
$message_table="<B>Number of Messages</B><BR/><table border='1' cellspacing=0>";
$message_table.="<tr><td><b>Destination</b></td>";

$messageMovements=MessageMovement::model()->findAll(array('condition'=>"name like '%SMS%'",'order'=>'t.id'));
	foreach ($messageMovements as $messageMovement){
		$message_table.="<td><b>".$messageMovement->name."</b></td>\n";
	}
$message_table.="</tr>";
foreach ($airTimeDestinations as $airTimeDestination){
	$message_table.="<tr><td>".$airTimeDestination->name."</td>";
	
	foreach ($messageMovements as $messageMovement){
		$value= (isset($messageArray[$airTimeDestination->id.'_'.$messageMovement->id]))?$messageArray[$airTimeDestination->id.'_'.$messageMovement->id]:'';
		if (!empty($value))
			$value=number_format($value,0);
		$message_table.="<td><input style='text-align: right' type='text' size='10' name='message_".$airTimeDestination->id."_".$messageMovement->id."'  id='message_".$airTimeDestination->id."_".$messageMovement->id."' value='$value' onchange='document.getElementById(this.id).value=thousandSeparator(document.getElementById(this.id).value)'/></td>\n";
	}
	$message_table.="</tr>";
}
$message_table.="</table>";	
echo $message_table;
?>
<?php $this->endWidget(); ?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Multimedia Messages')); ?>
<?php 

//number of messages
if (!$model->isNewRecord){
	$statisticsTelecomMasseges=StatisticsTelecomMasseges::model()->findAll('main_id='.$model->id);
	$messageArray=array();
	foreach ($statisticsTelecomMasseges as $statisticsTelecomMassege){
		$messageArray[$statisticsTelecomMassege->destination_id.'_'.$statisticsTelecomMassege->movement_id]=$statisticsTelecomMassege->num;				
	}
	
}
//messages
$message_table="<B>Number of Messages</B><BR/><table border='1' cellspacing=0>";
$message_table.="<tr><td><b>Destination</b></td>";

$messageMovements=MessageMovement::model()->findAll(array('condition'=>"name like '%MMS%'",'order'=>'t.id'));
	foreach ($messageMovements as $messageMovement){
		$message_table.="<td><b>".$messageMovement->name."</b></td>\n";
	}
$message_table.="</tr>";
foreach ($airTimeDestinations as $airTimeDestination){
	$message_table.="<tr><td>".$airTimeDestination->name."</td>";
	
	foreach ($messageMovements as $messageMovement){
		$value= (isset($messageArray[$airTimeDestination->id.'_'.$messageMovement->id]))?$messageArray[$airTimeDestination->id.'_'.$messageMovement->id]:'';
		if (!empty($value))
			$value=number_format($value,0);
		$message_table.="<td><input style='text-align: right' type='text' size='10' name='message_".$airTimeDestination->id."_".$messageMovement->id."'  id='message_".$airTimeDestination->id."_".$messageMovement->id."' value='$value' onchange='document.getElementById(this.id).value=thousandSeparator(document.getElementById(this.id).value)'/></td>\n";
	}
	$message_table.="</tr>";
}
$message_table.="</table>";	
echo $message_table;
?>
<?php $this->endWidget(); ?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Tariffs')); ?>
<?php 
	//Tariffs
	if (!$model->isNewRecord){
		$statisticsTelecomTariffs=StatisticsTelecomTariff::model()->findAll('main_id='.$model->id);
		$tariffArray=array();
		foreach ($statisticsTelecomTariffs as $statisticsTelecomTariff){
			$tariffArray[$statisticsTelecomTariff->tariff_id]=$statisticsTelecomTariff->num;				
		}
		
	}
	
	
	$tariffs="<B>PREPAID VOICE TELECOM TARIFFS</B><BR/>
(Without VAT and Excise Duty)<BR/>";

$table1="<table  border='1'  cellspacing=0>

<tr><td><b>Tariff Type</b></td><td><b>Charge</b></td></tr>\n";
$telecomTariffs=TelecomTariff::model()->findAll(array('order'=>'t.id','condition'=>"CATEGORY='NATIONAL TARIFFS'"));
foreach ($telecomTariffs as $telecomTariff){
	$value= (isset($tariffArray[$telecomTariff->id]))?$tariffArray[$telecomTariff->id]:'';
	if (!empty($value))
			$value=number_format($value,0);
	$table1.="<tr><td>".$telecomTariff->name."</td><td><input style='text-align: right' type='text' name='tariff_".$telecomTariff->id."'  id='tariff_".$telecomTariff->id."'  value='$value' onchange='document.getElementById(this.id).value=thousandSeparator(document.getElementById(this.id).value)'/></td></tr>\n";
}
$table1.="</table>\n";

$table2="<table  border='1'  cellspacing=0>

<tr><td><b>Tariff Type</b></td><td><b>Charge</b></td></tr>\n";
$telecomTariffs=TelecomTariff::model()->findAll(array('order'=>'t.id','condition'=>"CATEGORY='INTERNATIONAL TARIFFS'"));
foreach ($telecomTariffs as $telecomTariff){
	$value= (isset($tariffArray[$telecomTariff->id]))?$tariffArray[$telecomTariff->id]:'';
	if (!empty($value))
			$value=number_format($value,0);
	$table2.="<tr><td>".$telecomTariff->name."</td><td><input style='text-align: right'  type='text' name='tariff_".$telecomTariff->id."' id='tariff_".$telecomTariff->id."'  value='$value' onchange='document.getElementById(this.id).value=thousandSeparator(document.getElementById(this.id).value)'/></td></tr>\n";
}
$table2.="</table>";
$tariffs.="<table><tr><td>NATIONAL TARIFFS</td><td>INTERNATIONAL TARIFFS</td></tr><tr><td>$table1</td><td>$table2</td></tr></table>\n";
echo $tariffs;	
	
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
<P></P>

