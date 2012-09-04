<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('application_vsat_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->application_vsat_id), array('view', 'id'=>$data->application_vsat_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_number')); ?>:</b>
	<?php echo CHtml::encode($data->site_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_name')); ?>:</b>
	<?php echo CHtml::encode($data->site_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location_place_name')); ?>:</b>
	<?php echo CHtml::encode($data->location_place_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_deg')); ?>:</b>
	<?php echo CHtml::encode($data->log_deg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_min')); ?>:</b>
	<?php echo CHtml::encode($data->log_min); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_secs')); ?>:</b>
	<?php echo CHtml::encode($data->log_secs); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('lat_deg')); ?>:</b>
	<?php echo CHtml::encode($data->lat_deg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lat_min')); ?>:</b>
	<?php echo CHtml::encode($data->lat_min); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lat_secs')); ?>:</b>
	<?php echo CHtml::encode($data->lat_secs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('region')); ?>:</b>
	<?php echo CHtml::encode($data->region); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_elevation')); ?>:</b>
	<?php echo CHtml::encode($data->site_elevation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remark')); ?>:</b>
	<?php echo CHtml::encode($data->remark); ?>
	<br />

	*/ ?>

</div>