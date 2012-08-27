<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_number')); ?>:</b>
	<?php echo CHtml::encode($data->file_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('classification')); ?>:</b>
	<?php echo CHtml::encode($data->classification); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_1')); ?>:</b>
	<?php echo CHtml::encode($data->status_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_2')); ?>:</b>
	<?php echo CHtml::encode($data->status_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_3')); ?>:</b>
	<?php echo CHtml::encode($data->status_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_4')); ?>:</b>
	<?php echo CHtml::encode($data->status_4); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status_date_1')); ?>:</b>
	<?php echo CHtml::encode($data->status_date_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_date_2')); ?>:</b>
	<?php echo CHtml::encode($data->status_date_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_date_3')); ?>:</b>
	<?php echo CHtml::encode($data->status_date_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_date_4')); ?>:</b>
	<?php echo CHtml::encode($data->status_date_4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('application_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->application_type_id); ?>
	<br />

	*/ ?>

</div>