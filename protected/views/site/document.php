<?php
$html="<table  class=\"detail-view\"><tr  style=\"background-color:#D7DEEE;\"><td>Name</td><td>Stage/Action</td></tr>";
$condition="entity_type='$entityType' and entity_id=$entityId";
$documents=Document::model()->findAll(array('condition'=>$condition,'order'=>'t.id'));
foreach ($documents as $document) {
	$html.="<tr class='odd'><td><a href='".Yii::app()->request->baseUrl."/uploads/"."$document->path' target='_blank'>$document->name</a></td><td>".$document->stage."</td></tr>";
}
$html.="</table>";
echo $html;
?>