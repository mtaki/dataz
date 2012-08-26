<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('action')); ?>:</b>
	<?php echo CHtml::encode($data->action); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('table')); ?>:</b>
	<?php echo CHtml::encode($data->table); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('table_id')); ?>:</b>
	<?php echo CHtml::encode($data->table_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creationdate')); ?>:</b>
	<?php echo CHtml::encode($data->creationdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('old_values')); ?>:</b>
	<?php echo CHtml::encode($data->old_values); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('new_values')); ?>:</b>
	<?php echo CHtml::encode($data->new_values); ?>
	<br />

	*/ ?>

</div>