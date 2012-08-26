<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('annual_fee')); ?>:</b>
	<?php echo CHtml::encode($data->annual_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('annual_fee_currency_id')); ?>:</b>
	<?php echo CHtml::encode($data->annual_fee_currency_id); ?>
	<br />


</div>