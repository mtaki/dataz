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
<tr><td>Service Type</td>
<td>
<?php 

	$mArray=array();
		$mArray['']='Select';
		
		$mArray['Postal']='Postal';
		$mArray['Courier']='Courier';
		echo CHtml::dropDownList(get_class($model).'[service]',$model->service, $mArray);
		
?>
</td></tr>
</table>
<script type="text/javascript">

function openOperator() {
var url='';
url='<?php echo Yii::app()->createUrl('operator/simpleView'); ?>';
if(document.getElementById("StatisticsPostalMain_operator_id").value != ''){
	url=url+'/id/'+document.getElementById('StatisticsPostalMain_operator_id').value;
	aWindow = window.open(url,
	       'thewindow','width=800,height=200,location=no,resizable=yes,scrollbars=yes,screenX=20,screenY=20,top=20,left=20');
	}
}
</script>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Customer Base')); ?>
<?php 
$subcrition_base="<B>SUBSCRIPTIONS BASE</B><BR/><table  border='1'  cellspacing=0>\n";
$subcrition_base.="<tr><td><b>Customer Type</b></td><td><b>Number of customers</b></td></tr>\n";

if (!$model->isNewRecord){
	$statisticsPostalBases=StatisticsPostalBase::model()->findAll('main_id='.$model->id);
	$baseArray=array();
	foreach ($statisticsPostalBases as $statisticsPostalBase){
		$baseArray[''.$statisticsPostalBase->customer_type_id]=$statisticsPostalBase->num;
	}
}
$postalCustomerTypes=PostalCustomerType::model()->findAll(array('order'=>'t.id'));
foreach ($postalCustomerTypes as $postalCustomerType){
	$value='';
	if (isset($baseArray[''.$postalCustomerType->id])){
		$value=$baseArray[''.$postalCustomerType->id];
		$value=number_format($value,0);
	}
	$subcrition_base.="<tr><td>".$postalCustomerType->name."</td><td><input type='text'  style='text-align: right' name='base_".$postalCustomerType->id."' value='$value'></td></tr>\n";
}
$subcrition_base.="</table>";
echo $subcrition_base;
?>	
<?php $this->endWidget(); ?>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Posted Items')); ?>
<?php 
//posted items
if (!$model->isNewRecord){
	$statisticsPostalTraffics=StatisticsPostalTraffic::model()->findAll('main_id='.$model->id);
	$trafficArray=array();
	
	foreach ($statisticsPostalTraffics as $statisticsPostalTraffic){
		$trafficArray[$statisticsPostalTraffic->destination_id.'_'.$statisticsPostalTraffic->posted_item_id]=$statisticsPostalTraffic->num;
	}
}
$posted_table="<B>POSTED ITEMS</B><BR/><table border='1' cellspacing=0>";
$posted_table.="<tr><td><b>Destination</b></td>";
$postalPostedItemTypes=PostalPostedItemType::model()->findAll(array('order'=>'t.id'));
foreach ($postalPostedItemTypes as $postalPostedItemType){
		$posted_table.="<td><b>".$postalPostedItemType->name."</b></td>\n";
}
$posted_table.="</tr>";
$airTimeDestinations=AirTimeDestination::model()->findAll(array('order'=>'t.id'));
foreach ($airTimeDestinations as $airTimeDestination){
	$posted_table.="<tr><td>".$airTimeDestination->name."</td>";
	foreach ($postalPostedItemTypes as $postalPostedItemType){
		$value='';
		if (isset($trafficArray[$airTimeDestination->id."_".$postalPostedItemType->id])){
			$value=$trafficArray[$airTimeDestination->id."_".$postalPostedItemType->id];
			$value=number_format($value,0);
		}
		$posted_table.="<td><input type='text'  style='text-align: right' size='10' name='posted_".$airTimeDestination->id."_".$postalPostedItemType->id."' value='".$value."'></td>\n";
	}
	$posted_table.="</tr>";
}
$posted_table.="</table>";
echo $posted_table;

?>	
<?php $this->endWidget(); ?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Delivered Items')); ?>
<div style=" background : #ffffff; color : #000000; padding : 4px; width : 800px; height : 500px; overflow : auto; ">
<?php 
//Delivered items
if (!$model->isNewRecord){
	$statisticsPostalMasseges=StatisticsPostalMasseges::model()->findAll('main_id='.$model->id);
	$messageArray=array();
	
	foreach ($statisticsPostalMasseges as $statisticsPostalMassege){
		$messageArray[$statisticsPostalMassege->destination_id.'_'.$statisticsPostalMassege->posted_item_id.'_h']=$statisticsPostalMassege->h_num;
		$messageArray[$statisticsPostalMassege->destination_id.'_'.$statisticsPostalMassege->posted_item_id.'_o']=$statisticsPostalMassege->o_num;
		$messageArray[$statisticsPostalMassege->destination_id.'_'.$statisticsPostalMassege->posted_item_id.'_plb']=$statisticsPostalMassege->plb_num;
	}
}

$delivered_table="<B>DELIVERED ITEMS</B><BR/><table border='1' cellspacing=0>";
$delivered_table.="<tr><td><b>Origin</b></td>";
$postalPostedItemTypes=PostalPostedItemType::model()->findAll(array('order'=>'t.id'));
foreach ($postalPostedItemTypes as $postalPostedItemType){
	$delivered_table.="<td><b>".$postalPostedItemType->name."</b><BR/></td>\n";
}
$delivered_table.="</tr>";
//$rs_delivered2=$db->Execute("SELECT ID, NAME FROM AIR_TIME_DESTINATION  WHERE ID <> 1 ORDER BY AIR_TIME_DESTINATION.ID");
$airTimeDestinations=AirTimeDestination::model()->findAll(array('order'=>'t.id','where'=>'id <> 1'));
$postalPostedItemTypes=PostalPostedItemType::model()->findAll(array('order'=>'t.id'));
foreach ($airTimeDestinations as $airTimeDestination){
	$delivered_table.="<tr><td>".$airTimeDestination->name."</td>";
	foreach ($postalPostedItemTypes as $postalPostedItemType){
		$value_o='';
		$value_h='';
		$value_plb='';
		if (isset($messageArray[$airTimeDestination->id."_".$postalPostedItemType->id."_o"])){
			$value_o=$messageArray[$airTimeDestination->id."_".$postalPostedItemType->id."_o"];
			$value_o=number_format($value_o,0);
		}
		if (isset($messageArray[$airTimeDestination->id."_".$postalPostedItemType->id."_h"])){
			$value_h=$messageArray[$airTimeDestination->id."_".$postalPostedItemType->id."_h"];
			$value_h=number_format($value_h,0);
		}
		if (isset($messageArray[$airTimeDestination->id."_".$postalPostedItemType->id."_plb"])){
			$value_plb=$messageArray[$airTimeDestination->id."_".$postalPostedItemType->id."_plb"];
			$value_plb=number_format($value_plb,0);
		}
			
		$delivered_table.="<td><table width='100%'><tr>
			<tr><td>H</td><td width='33%'><input type='text'  style='text-align: right'  size='10' name='delivered_".$airTimeDestination->id."_".$postalPostedItemType->id."_h' value='$value_h'></td></tr>
			<tr><td>O</td><td width='33%'><input type='text'  style='text-align: right' size='10' name='delivered_".$airTimeDestination->id."_".$postalPostedItemType->id."_o' value='$value_o'></td></tr>
			<tr><td>PLB</td><td><input type='text'  style='text-align: right'  size='10' name='delivered_".$airTimeDestination->id."_".$postalPostedItemType->id."_plb' value='$value_plb'></td></tr>
			</table></td>\n";
		
	}
	$delivered_table.="</tr>";
}
$delivered_table.="</table><BR/>Key: H- Home delivery,   O - Office delivery, PLB - Private letter box delivery";
echo $delivered_table;
?>	
</div>
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
