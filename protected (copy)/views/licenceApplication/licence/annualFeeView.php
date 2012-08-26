<?php

?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Detail')); ?>
<?php 
$html="<table  class='detail-view'>";
$html.="<tr align='left' class='odd'><th>Operator:</th><td>".$model->operator->name."</td><th>Application Date:</th><td>$model->application_date</td></tr>";
$html.="<tr align='left' class='even'><th>Type:</th><td>".$model->licenceCategory->name."</td><th>Market Segment:</th><td>".$model->marketSegment->name."</td></tr>";
$html.="<tr align='left' class='odd'><th>Issue date:</th><td>".$model->issue_date."</td><th>Effective Date:</th><td>$model->effective_date</td></tr>";
$html.="<tr align='left' class='even'><th>Duration:</th><td>".$model->duration." Years</td><th>&nbsp;</th><td>&nbsp;</td></tr>";
$html.='</table>';
echo $html;
?>
<?php $this->endWidget(); ?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Payments')); ?>
	<?php $this->renderPartial('//site/payment', array('entityType'=>'licence_application','entityId'=>$model->id,'invoiceType'=>''))?>
<?php $this->endWidget(); ?>

<h1>Genarate Annual Fee </h1>

<?php
$tabParameters = array();
foreach($this->clips as $key=>$clip)
    $tabParameters['tab'.(count($tabParameters)+1)] = array('title'=>$key, 'content'=>$clip);
?>
 
<?php $this->widget('system.web.widgets.CTabView', array('tabs'=>$tabParameters)); ?>
