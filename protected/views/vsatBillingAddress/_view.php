<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('application_vsat_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->application_vsat_id), array('view', 'id'=>$data->application_vsat_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_of_accounting')); ?>:</b>
	<?php echo CHtml::encode($data->name_of_accounting); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('a_phone_no')); ?>:</b>
	<?php echo CHtml::encode($data->a_phone_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('a_fax_no')); ?>:</b>
	<?php echo CHtml::encode($data->a_fax_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_of_sp')); ?>:</b>
	<?php echo CHtml::encode($data->name_of_sp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sp_phone_no')); ?>:</b>
	<?php echo CHtml::encode($data->sp_phone_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sp_fax_no')); ?>:</b>
	<?php echo CHtml::encode($data->sp_fax_no); ?>
	<br />


</div>