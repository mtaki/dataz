<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->station_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fee')); ?>:</b>
	<?php echo CHtml::encode($data->fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fee_currency')); ?>:</b>
	<?php echo CHtml::encode($data->fee_currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('formula')); ?>:</b>
	<?php echo CHtml::encode($data->formula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grouped')); ?>:</b>
	<?php echo CHtml::encode($data->grouped); ?>
	<br />


</div>