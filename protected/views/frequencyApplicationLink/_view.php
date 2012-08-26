<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('frequency_application_id')); ?>:</b>
	<?php echo CHtml::encode($data->frequency_application_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_a_name')); ?>:</b>
	<?php echo CHtml::encode($data->station_a_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_b_name')); ?>:</b>
	<?php echo CHtml::encode($data->station_b_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_a_longitude')); ?>:</b>
	<?php echo CHtml::encode($data->station_a_longitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_a_latitude')); ?>:</b>
	<?php echo CHtml::encode($data->station_a_latitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_b_longitude')); ?>:</b>
	<?php echo CHtml::encode($data->station_b_longitude); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('station_b_latitude')); ?>:</b>
	<?php echo CHtml::encode($data->station_b_latitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_a_antenna_size')); ?>:</b>
	<?php echo CHtml::encode($data->station_a_antenna_size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_b_antenna_size')); ?>:</b>
	<?php echo CHtml::encode($data->station_b_antenna_size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_a_agl')); ?>:</b>
	<?php echo CHtml::encode($data->station_a_agl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_b_agl')); ?>:</b>
	<?php echo CHtml::encode($data->station_b_agl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_a_asl')); ?>:</b>
	<?php echo CHtml::encode($data->station_a_asl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_b_asl')); ?>:</b>
	<?php echo CHtml::encode($data->station_b_asl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('length')); ?>:</b>
	<?php echo CHtml::encode($data->length); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_a_antenna_type')); ?>:</b>
	<?php echo CHtml::encode($data->station_a_antenna_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_b_antenna_type')); ?>:</b>
	<?php echo CHtml::encode($data->station_b_antenna_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_a_antenna_gain')); ?>:</b>
	<?php echo CHtml::encode($data->station_a_antenna_gain); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_b_antenna_gain')); ?>:</b>
	<?php echo CHtml::encode($data->station_b_antenna_gain); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_a_power')); ?>:</b>
	<?php echo CHtml::encode($data->station_a_power); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_b_power')); ?>:</b>
	<?php echo CHtml::encode($data->station_b_power); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_a_effective_power')); ?>:</b>
	<?php echo CHtml::encode($data->station_a_effective_power); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_b_effective_power')); ?>:</b>
	<?php echo CHtml::encode($data->station_b_effective_power); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_a_beam_width')); ?>:</b>
	<?php echo CHtml::encode($data->station_a_beam_width); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_b_beam_width')); ?>:</b>
	<?php echo CHtml::encode($data->station_b_beam_width); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_a_polarization')); ?>:</b>
	<?php echo CHtml::encode($data->station_a_polarization); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_b_polarization')); ?>:</b>
	<?php echo CHtml::encode($data->station_b_polarization); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_a_azimuth')); ?>:</b>
	<?php echo CHtml::encode($data->station_a_azimuth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_b_azimuth')); ?>:</b>
	<?php echo CHtml::encode($data->station_b_azimuth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_a_channel_spacing')); ?>:</b>
	<?php echo CHtml::encode($data->station_a_channel_spacing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_b_channel_spacing')); ?>:</b>
	<?php echo CHtml::encode($data->station_b_channel_spacing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_a_tr_separation')); ?>:</b>
	<?php echo CHtml::encode($data->station_a_tr_separation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_b_tr_separation')); ?>:</b>
	<?php echo CHtml::encode($data->station_b_tr_separation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_a_tr_capacity')); ?>:</b>
	<?php echo CHtml::encode($data->station_a_tr_capacity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_b_tr_capacity')); ?>:</b>
	<?php echo CHtml::encode($data->station_b_tr_capacity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_a_channels')); ?>:</b>
	<?php echo CHtml::encode($data->station_a_channels); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('station_b_channels')); ?>:</b>
	<?php echo CHtml::encode($data->station_b_channels); ?>
	<br />

	*/ ?>

</div>