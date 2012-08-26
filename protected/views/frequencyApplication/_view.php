<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('application_date')); ?>:</b>
	<?php echo CHtml::encode($data->application_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('declaration_date')); ?>:</b>
	<?php echo CHtml::encode($data->declaration_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('declaration_signatory')); ?>:</b>
	<?php echo CHtml::encode($data->declaration_signatory); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('declaration_designation')); ?>:</b>
	<?php echo CHtml::encode($data->declaration_designation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('operator_id')); ?>:</b>
	<?php echo CHtml::encode($data->operator_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('purpose')); ?>:</b>
	<?php echo CHtml::encode($data->purpose); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_owner')); ?>:</b>
	<?php echo CHtml::encode($data->ship_owner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_name')); ?>:</b>
	<?php echo CHtml::encode($data->ship_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_registration_number')); ?>:</b>
	<?php echo CHtml::encode($data->ship_registration_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_certificate_issued')); ?>:</b>
	<?php echo CHtml::encode($data->ship_certificate_issued); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_certificate_done')); ?>:</b>
	<?php echo CHtml::encode($data->ship_certificate_done); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_nationality')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_nationality); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_passport_number')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_passport_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_date_birth')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_date_birth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_possess_licence')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_possess_licence); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_call_sign')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_call_sign); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_issuing_authority')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_issuing_authority); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_guardian_name')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_guardian_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_guardian_nationality')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_guardian_nationality); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_guardian_passport_number')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_guardian_passport_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_guardian_town')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_guardian_town); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_guardian_street')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_guardian_street); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_guardian_address')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_guardian_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_referee_1_name')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_referee_1_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_referee_1_address')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_referee_1_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_referee_1_town')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_referee_1_town); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_referee_1_telephone')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_referee_1_telephone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_referee_1_email')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_referee_1_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_guardian_telephone')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_guardian_telephone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_guardian_email')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_guardian_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_guardian_fax')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_guardian_fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_referee_2_name')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_referee_2_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_referee_2_address')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_referee_2_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_referee_2_town')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_referee_2_town); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_referee_2_telephone')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_referee_2_telephone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_referee_2_email')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_referee_2_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_equipment_made')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_equipment_made); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_equipment_model')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_equipment_model); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_equipment_frequency_range')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_equipment_frequency_range); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_equipment_power')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_equipment_power); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_equipment_antenna_make')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_equipment_antenna_make); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_equipment_antenna_gain')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_equipment_antenna_gain); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_pass_morse_test')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_pass_morse_test); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_guardian_sign_date')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_guardian_sign_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amateur_guardian_sign_name')); ?>:</b>
	<?php echo CHtml::encode($data->amateur_guardian_sign_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aircraft_owner')); ?>:</b>
	<?php echo CHtml::encode($data->aircraft_owner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aircraft_type')); ?>:</b>
	<?php echo CHtml::encode($data->aircraft_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aircraft_registration_number')); ?>:</b>
	<?php echo CHtml::encode($data->aircraft_registration_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aircraft_certificate_issued')); ?>:</b>
	<?php echo CHtml::encode($data->aircraft_certificate_issued); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aircraft_inspection_done')); ?>:</b>
	<?php echo CHtml::encode($data->aircraft_inspection_done); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_type_licence')); ?>:</b>
	<?php echo CHtml::encode($data->link_type_licence); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_equipment_make')); ?>:</b>
	<?php echo CHtml::encode($data->link_equipment_make); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_equipment_frequency_band')); ?>:</b>
	<?php echo CHtml::encode($data->link_equipment_frequency_band); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_equipment_frequency_from')); ?>:</b>
	<?php echo CHtml::encode($data->link_equipment_frequency_from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_equipment_frequency_to')); ?>:</b>
	<?php echo CHtml::encode($data->link_equipment_frequency_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_equipment_channel_capacity')); ?>:</b>
	<?php echo CHtml::encode($data->link_equipment_channel_capacity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_equipment_modulation_scheme')); ?>:</b>
	<?php echo CHtml::encode($data->link_equipment_modulation_scheme); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_equipment_frequency_stability')); ?>:</b>
	<?php echo CHtml::encode($data->link_equipment_frequency_stability); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_equipment_power')); ?>:</b>
	<?php echo CHtml::encode($data->link_equipment_power); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_equipment_emission')); ?>:</b>
	<?php echo CHtml::encode($data->link_equipment_emission); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_equipment_receiver_sensitivity')); ?>:</b>
	<?php echo CHtml::encode($data->link_equipment_receiver_sensitivity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_equipment_adjacent_channel_selectivity')); ?>:</b>
	<?php echo CHtml::encode($data->link_equipment_adjacent_channel_selectivity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_equipment_frequency_channels')); ?>:</b>
	<?php echo CHtml::encode($data->link_equipment_frequency_channels); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_equipment_channelization_plan')); ?>:</b>
	<?php echo CHtml::encode($data->link_equipment_channelization_plan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_antenna_make')); ?>:</b>
	<?php echo CHtml::encode($data->link_antenna_make); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_antenna_receiving_gain')); ?>:</b>
	<?php echo CHtml::encode($data->link_antenna_receiving_gain); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_supplier_name_address')); ?>:</b>
	<?php echo CHtml::encode($data->link_supplier_name_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_supplier_postal_address')); ?>:</b>
	<?php echo CHtml::encode($data->link_supplier_postal_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_supplier_telephone')); ?>:</b>
	<?php echo CHtml::encode($data->link_supplier_telephone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_supplier_fax')); ?>:</b>
	<?php echo CHtml::encode($data->link_supplier_fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_supplier_email')); ?>:</b>
	<?php echo CHtml::encode($data->link_supplier_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_supplier_physical_address')); ?>:</b>
	<?php echo CHtml::encode($data->link_supplier_physical_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_supplier_street')); ?>:</b>
	<?php echo CHtml::encode($data->link_supplier_street); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_supplier_plot')); ?>:</b>
	<?php echo CHtml::encode($data->link_supplier_plot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_channels')); ?>:</b>
	<?php echo CHtml::encode($data->link_channels); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_bandwidth')); ?>:</b>
	<?php echo CHtml::encode($data->link_bandwidth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_separation')); ?>:</b>
	<?php echo CHtml::encode($data->link_separation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_transmission_capacity')); ?>:</b>
	<?php echo CHtml::encode($data->link_transmission_capacity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_channelization_plan')); ?>:</b>
	<?php echo CHtml::encode($data->link_channelization_plan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_proposed_date')); ?>:</b>
	<?php echo CHtml::encode($data->link_proposed_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_remarks')); ?>:</b>
	<?php echo CHtml::encode($data->link_remarks); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_equipment_make')); ?>:</b>
	<?php echo CHtml::encode($data->radio_equipment_make); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_equipment_seller_name_address')); ?>:</b>
	<?php echo CHtml::encode($data->radio_equipment_seller_name_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_equipment_fixed_from')); ?>:</b>
	<?php echo CHtml::encode($data->radio_equipment_fixed_from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_equipment_fixed_to')); ?>:</b>
	<?php echo CHtml::encode($data->radio_equipment_fixed_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_equipment_portable_from')); ?>:</b>
	<?php echo CHtml::encode($data->radio_equipment_portable_from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_equipment_portable_to')); ?>:</b>
	<?php echo CHtml::encode($data->radio_equipment_portable_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_equipment_fixed_unit')); ?>:</b>
	<?php echo CHtml::encode($data->radio_equipment_fixed_unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_equipment_portable_unit')); ?>:</b>
	<?php echo CHtml::encode($data->radio_equipment_portable_unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_equipment_fixed_channels')); ?>:</b>
	<?php echo CHtml::encode($data->radio_equipment_fixed_channels); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_equipment_portable_channels')); ?>:</b>
	<?php echo CHtml::encode($data->radio_equipment_portable_channels); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_equipment_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->radio_equipment_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_transmitter_power_fixed')); ?>:</b>
	<?php echo CHtml::encode($data->radio_transmitter_power_fixed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_transmitter_power_portable')); ?>:</b>
	<?php echo CHtml::encode($data->radio_transmitter_power_portable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_transmitter_stability_fixed')); ?>:</b>
	<?php echo CHtml::encode($data->radio_transmitter_stability_fixed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_transmitter_stability_portable')); ?>:</b>
	<?php echo CHtml::encode($data->radio_transmitter_stability_portable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_transmitter_nominal_bandwidth_fixed')); ?>:</b>
	<?php echo CHtml::encode($data->radio_transmitter_nominal_bandwidth_fixed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_transmitter_nominal_bandwidth_portable')); ?>:</b>
	<?php echo CHtml::encode($data->radio_transmitter_nominal_bandwidth_portable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_transmitter_modulation_fixed')); ?>:</b>
	<?php echo CHtml::encode($data->radio_transmitter_modulation_fixed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_transmitter_modulation_portable')); ?>:</b>
	<?php echo CHtml::encode($data->radio_transmitter_modulation_portable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_transmitter_emission_fixed')); ?>:</b>
	<?php echo CHtml::encode($data->radio_transmitter_emission_fixed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_transmitter_emission_portable')); ?>:</b>
	<?php echo CHtml::encode($data->radio_transmitter_emission_portable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_transmitter_harmonics_fixed')); ?>:</b>
	<?php echo CHtml::encode($data->radio_transmitter_harmonics_fixed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_transmitter_harmonics_portable')); ?>:</b>
	<?php echo CHtml::encode($data->radio_transmitter_harmonics_portable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_receiver_sensitivity_fixed')); ?>:</b>
	<?php echo CHtml::encode($data->radio_receiver_sensitivity_fixed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_receiver_sensitivity_portable')); ?>:</b>
	<?php echo CHtml::encode($data->radio_receiver_sensitivity_portable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_receiver_selectivity_fixed')); ?>:</b>
	<?php echo CHtml::encode($data->radio_receiver_selectivity_fixed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_receiver_selectivity_portable')); ?>:</b>
	<?php echo CHtml::encode($data->radio_receiver_selectivity_portable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_receiver_intermediation_fixed')); ?>:</b>
	<?php echo CHtml::encode($data->radio_receiver_intermediation_fixed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_receiver_intermediation_portable')); ?>:</b>
	<?php echo CHtml::encode($data->radio_receiver_intermediation_portable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_receiver_rejection_fixed')); ?>:</b>
	<?php echo CHtml::encode($data->radio_receiver_rejection_fixed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radio_receiver_rejection_portable')); ?>:</b>
	<?php echo CHtml::encode($data->radio_receiver_rejection_portable); ?>
	<br />

	*/ ?>

</div>