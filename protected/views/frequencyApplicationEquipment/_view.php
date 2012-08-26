<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('application_id')); ?>:</b>
	<?php echo CHtml::encode($data->application_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_service')); ?>:</b>
	<?php echo CHtml::encode($data->type_service); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_radio')); ?>:</b>
	<?php echo CHtml::encode($data->type_radio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('model')); ?>:</b>
	<?php echo CHtml::encode($data->model); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('power')); ?>:</b>
	<?php echo CHtml::encode($data->power); ?>
	<br />


</div>