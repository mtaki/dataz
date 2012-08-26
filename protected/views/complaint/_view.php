<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('complainant_id')); ?>:</b>
	<?php echo CHtml::encode($data->complainant_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('respondent_id')); ?>:</b>
	<?php echo CHtml::encode($data->respondent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relief')); ?>:</b>
	<?php echo CHtml::encode($data->relief); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('verification_comp_signatory')); ?>:</b>
	<?php echo CHtml::encode($data->verification_comp_signatory); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('verification_comp_date')); ?>:</b>
	<?php echo CHtml::encode($data->verification_comp_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('verification_appl_date')); ?>:</b>
	<?php echo CHtml::encode($data->verification_appl_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('verification_tcra_signatory')); ?>:</b>
	<?php echo CHtml::encode($data->verification_tcra_signatory); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('verification_tcra_date')); ?>:</b>
	<?php echo CHtml::encode($data->verification_tcra_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('verification_resp_signatory')); ?>:</b>
	<?php echo CHtml::encode($data->verification_resp_signatory); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('verification_resp_date')); ?>:</b>
	<?php echo CHtml::encode($data->verification_resp_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('complaint_types')); ?>:</b>
	<?php echo CHtml::encode($data->complaint_types); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stage')); ?>:</b>
	<?php echo CHtml::encode($data->stage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relief_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->relief_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('responce')); ?>:</b>
	<?php echo CHtml::encode($data->responce); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('verification')); ?>:</b>
	<?php echo CHtml::encode($data->verification); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('region_id')); ?>:</b>
	<?php echo CHtml::encode($data->region_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sector_id')); ?>:</b>
	<?php echo CHtml::encode($data->sector_id); ?>
	<br />

	*/ ?>

</div>