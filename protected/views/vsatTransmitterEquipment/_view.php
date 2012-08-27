<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('application_vsat_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->application_vsat_id), array('view', 'id'=>$data->application_vsat_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TCRAID')); ?>:</b>
	<?php echo CHtml::encode($data->TCRAID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_approval_number')); ?>:</b>
	<?php echo CHtml::encode($data->type_approval_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('manufacture_name')); ?>:</b>
	<?php echo CHtml::encode($data->manufacture_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('model')); ?>:</b>
	<?php echo CHtml::encode($data->model); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial_number')); ?>:</b>
	<?php echo CHtml::encode($data->serial_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transmitter_power')); ?>:</b>
	<?php echo CHtml::encode($data->transmitter_power); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('effective_radiated_power')); ?>:</b>
	<?php echo CHtml::encode($data->effective_radiated_power); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('equipment_manual_attached')); ?>:</b>
	<?php echo CHtml::encode($data->equipment_manual_attached); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_class')); ?>:</b>
	<?php echo CHtml::encode($data->station_class); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remark')); ?>:</b>
	<?php echo CHtml::encode($data->remark); ?>
	<br />

	*/ ?>

</div>