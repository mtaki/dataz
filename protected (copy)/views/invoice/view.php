<h1>View Invoice</h1>

<table class="detail-view">
	<tr class="odd"><td>Operator</td><td>
	<?php 
echo $model->operator->name;
?>
	
	</td></tr>
	
	<tr class='even'><td>Description</td><td><?php echo $model->description;?></td></tr>
	<tr class='odd'><td>Currency</td><td>
	<?php 
	
		echo $model->currency->name;
?>
	</td></tr>
	<tr class='even'><td>Date</td><td>
	<?php echo $model->day;
?>
	
	</td></tr>
	</table>
Items
<table class='detail-view'>
<tr style="background-color:#D7DEEE;"><td>Description</td><td>Amount</td></tr>
<?php 
$class='odd';
foreach ($model->invoiceDetails as $d){
	echo "<tr class='$class'><td>$d->description</td><td align='right'>".number_format($d->amount,2)." ".$model->currency->name."</td></tr>";
	if ($class=='odd')
		$class='even';
	else 
		$class='odd';
}
?>
</table>
<?php 
if(strcasecmp($model->in_epicor,'no')==0){
	echo CHtml::Button('Send to Account',array('submit'=>Yii::app()->createUrl('invoice/epicor',array('id'=>$model->id))));
	echo '&nbsp;&nbsp;'.CHtml::Button('Edit',array('submit'=>Yii::app()->createUrl('invoice/update',array('id'=>$model->id))));
}
?>
<?php 
$url=Yii::app()->createUrl('site/printDocs',array('id'=>$model->id,'file'=>'invoice.rtf.php'));
	echo $button1="<input type='button' onclick=\"document.location='$url';\" value='Preview Invoice'/>";
?>
