<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('application_vsat_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->application_vsat_id), array('view', 'id'=>$data->application_vsat_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('operation_name')); ?>:</b>
	<?php echo CHtml::encode($data->operation_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_no')); ?>:</b>
	<?php echo CHtml::encode($data->phone_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('operator_company_name')); ?>:</b>
	<?php echo CHtml::encode($data->operator_company_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fax_no')); ?>:</b>
	<?php echo CHtml::encode($data->fax_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contry_of_registry')); ?>:</b>
	<?php echo CHtml::encode($data->contry_of_registry); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_address')); ?>:</b>
	<?php echo CHtml::encode($data->city_address); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('district')); ?>:</b>
	<?php echo CHtml::encode($data->district); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	*/ ?>

</div>