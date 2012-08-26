<?php
$this->breadcrumbs=array(
	'Message Movements'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MessageMovement', 'url'=>array('index')),
	array('label'=>'Manage MessageMovement', 'url'=>array('admin')),
);
?>

<h1>Create Message Movement</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>