<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('application_vsat_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->application_vsat_id), array('view', 'id'=>$data->application_vsat_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TCRAID')); ?>:</b>
	<?php echo CHtml::encode($data->TCRAID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('manufacture_name')); ?>:</b>
	<?php echo CHtml::encode($data->manufacture_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('model')); ?>:</b>
	<?php echo CHtml::encode($data->model); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('height_above_ground')); ?>:</b>
	<?php echo CHtml::encode($data->height_above_ground); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('polarization')); ?>:</b>
	<?php echo CHtml::encode($data->polarization); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('directional')); ?>:</b>
	<?php echo CHtml::encode($data->directional); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('circular')); ?>:</b>
	<?php echo CHtml::encode($data->circular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('other')); ?>:</b>
	<?php echo CHtml::encode($data->other); ?>
	<br />

	*/ ?>

</div>