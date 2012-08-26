<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('licence_category_id')); ?>:</b>
	<?php echo CHtml::encode($data->licence_category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_service')); ?>:</b>
	<?php echo CHtml::encode($data->type_service); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('application_fee')); ?>:</b>
	<?php echo CHtml::encode($data->application_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('application_fee_currency_id')); ?>:</b>
	<?php echo CHtml::encode($data->application_fee_currency_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('initial_fee')); ?>:</b>
	<?php echo CHtml::encode($data->initial_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('initial_fee_currency_id')); ?>:</b>
	<?php echo CHtml::encode($data->initial_fee_currency_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('annual_fee')); ?>:</b>
	<?php echo CHtml::encode($data->annual_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('annual_fee_currency_id')); ?>:</b>
	<?php echo CHtml::encode($data->annual_fee_currency_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('duration')); ?>:</b>
	<?php echo CHtml::encode($data->duration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_of_licence')); ?>:</b>
	<?php echo CHtml::encode($data->type_of_licence); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('market_segment_id')); ?>:</b>
	<?php echo CHtml::encode($data->market_segment_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('annual_fee_is_percentage')); ?>:</b>
	<?php echo CHtml::encode($data->annual_fee_is_percentage); ?>
	<br />

	*/ ?>

</div>