<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numbering_fee_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->numbering_fee_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registration_fee')); ?>:</b>
	<?php echo CHtml::encode($data->registration_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registration_fee_currency_id')); ?>:</b>
	<?php echo CHtml::encode($data->registration_fee_currency_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('annual_fee')); ?>:</b>
	<?php echo CHtml::encode($data->annual_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('annual_fee_currency_id')); ?>:</b>
	<?php echo CHtml::encode($data->annual_fee_currency_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subscriber_fee')); ?>:</b>
	<?php echo CHtml::encode($data->subscriber_fee); ?>
	<br />


</div>