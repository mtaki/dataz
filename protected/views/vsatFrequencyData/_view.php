<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('application_vsat_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->application_vsat_id), array('view', 'id'=>$data->application_vsat_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('frequency_band')); ?>:</b>
	<?php echo CHtml::encode($data->frequency_band); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_of_issue')); ?>:</b>
	<?php echo CHtml::encode($data->date_of_issue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_of_renewal')); ?>:</b>
	<?php echo CHtml::encode($data->date_of_renewal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emission')); ?>:</b>
	<?php echo CHtml::encode($data->emission); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tolerance')); ?>:</b>
	<?php echo CHtml::encode($data->tolerance); ?>
	<br />


</div>