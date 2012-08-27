<?php
$this->breadcrumbs=array(
	'Application Vsats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ApplicationVsat', 'url'=>array('index')),
	array('label'=>'Manage ApplicationVsat', 'url'=>array('admin')),
);
?>

<h1>Create ApplicationVsat</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'a'=>$a,'c'=>$c, 
            'oparationAddress'=>$oparationAddress,
            'billingAddress'=>$billingAddress,
            'siteData'=>$siteData,
           // 'transmitterData'=>$transmitterData,
            'antennaData'=>$antennaData,
            'frequencyData'=>$frequencyData)); ?>
