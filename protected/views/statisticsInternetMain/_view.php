<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('operator_id')); ?>:</b>
	<?php echo CHtml::encode($data->operator_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('st_year')); ?>:</b>
	<?php echo CHtml::encode($data->st_year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('st_month')); ?>:</b>
	<?php echo CHtml::encode($data->st_month); ?>
	<br />


</div>