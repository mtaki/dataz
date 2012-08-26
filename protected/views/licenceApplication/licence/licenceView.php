<h1>View Licence </h1>
<table> 
<tr>
<td><?php echo CHtml::Button('List',array('class'=>'myButton','submit'=>Yii::app()->controller->createUrl('licenceList')));?></td>
</tr>
</table>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Detail')); ?>
<?php 
$html="<table  class='detail-view'>";
$html.="<tr align='left' class='odd'><th>Operator:</th><td>".$model->operator->name."</td><th>Issue date:</th><td>$model->issue_date</td></tr>";
$html.="<tr align='left' class='even'><th>Type:</th><td>".$model->licenceCategory->name."</td><th>Market Segment:</th><td>".$model->marketSegment->name."</td></tr>";
$html.="<tr align='left' class='odd'><th>Category:</th><td>".''."</td><th>Duration:</th><td>".$model->duration." Years</td></tr>";
$html.="<tr align='left' class='odd'><th>Status:</th><td>".$model->status."</td><th>Effective Date:</th><td>$model->effective_date</td></tr>";
$html.='</table>';
echo $html;
?>
<?php $this->endWidget(); ?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Payments')); ?>
	<?php $this->renderPartial('//site/payment', array('entityType'=>'licence_application','entityId'=>$model->id,'invoiceType'=>''))?>
<?php $this->endWidget(); ?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'History')); ?>
	<?php $this->renderPartial('//site/history', array('entityType'=>'licence_application','entityId'=>$model->id))?>
<?php $this->endWidget(); ?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Documents')); ?>
	<?php $this->renderPartial('//site/document', array('entityType'=>'licence_application','entityId'=>$model->id))?>
<?php $this->endWidget(); ?>
<!--  h1>View LicenceApplication #<?php echo $model->id; ?></h1>-->

<?php
$tabParameters = array();
foreach($this->clips as $key=>$clip)
    $tabParameters['tab'.(count($tabParameters)+1)] = array('title'=>$key, 'content'=>$clip);
?>
 
<?php $this->widget('system.web.widgets.CTabView', array('tabs'=>$tabParameters)); ?>
