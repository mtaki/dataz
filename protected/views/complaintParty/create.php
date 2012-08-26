<?php
$this->breadcrumbs=array(
	'Complaint Parties'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ComplaintParty', 'url'=>array('index')),
	array('label'=>'Manage ComplaintParty', 'url'=>array('admin')),
);
?>

<h1>New</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>