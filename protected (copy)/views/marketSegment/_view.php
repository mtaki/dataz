<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('licence_category_id')); ?>:</b>
	<?php echo CHtml::encode($data->licence_category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_code')); ?>:</b>
	<?php echo CHtml::encode($data->order_code); ?>
	<br />


</div>