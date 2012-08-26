
<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.op-form').toggle();
	return false;
});
");
?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Operator')); ?>
<?php 
$html="<table width='600' class='detail-view'>";
$html.="<tr align='left' class='odd'><th>Operator</th><td>$model->name</td><th>Address</th><td>$model->address</td></tr>";
$html.="<tr align='left' class='even'><th>Telephone</th><td>$model->telephone</td><th>Mobile</th><td>$model->mobile</td></tr>";
$html.="<tr align='left' class='odd'><th>Town</th><td>$model->town</td><th>Email</th><td>$model->email</td></tr>";
$html.="</table>";
echo $html;
?>
<p>
<?php echo CHtml::link('Full Details','#',array('class'=>'search-button')); ?>
<div class="op-form" style="display:none">
<?php $this->renderPartial('//operator/view', array('model'=>$model))?>
</div>

<?php $this->endWidget(); ?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Payments')); ?>
	<?php $this->renderPartial('//site/payment2', array('operatorId'=>$model->id));?>
<?php $this->endWidget(); ?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Licences')); ?>
	<?php 
		$html="<table width='600' class='detail-view'>";
$html.="<tr align='left' style=\"background-color:#D7DEEE;\"><th>Licence Number</th><th>Type</th><th>Market Segments</th><th>Issue date</th><th>Duration</th><th>Status</th></tr>";
$las=LicenceApplication::model()->with('licenceCategory')->findAll("operator_id=".$model->id." and is_licence=1");
foreach ($las as $la){
	$html.="<tr align='left' class='odd'><td>$la->num</td><td>".$la->licenceCategory->name."</td><td>".$la->getMarketSegments()."</td><td>$la->issue_date</td><td>$la->duration</td><td>$la->status</td></tr>";
	
}
$html.="</table>";

echo $html;
	?>
<?php $this->endWidget(); ?>

<h1>View Licencee [<?php echo $model->name; ?>]</h1>

<table> 
<tr>
<td><?php echo CHtml::Button('List',array('class'=>'myButton','submit'=>Yii::app()->controller->createUrl('licenceeList')));?></td>
</tr>
</table>
<?php
$tabParameters = array();
foreach($this->clips as $key=>$clip)
    $tabParameters['tab'.(count($tabParameters)+1)] = array('title'=>$key, 'content'=>$clip);
?>
 
<?php $this->widget('system.web.widgets.CTabView', array('tabs'=>$tabParameters)); ?>