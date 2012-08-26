<div class="form">

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>General Information</strong></legend>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Applicant</td>

    <td>
    
    <?php echo $model->applicant->name; ?></td>
    <td>Application date</td>

    <td>
    <?php echo $model->application_date;?>

    </td>
      </tr>
 
  </table>

</fieldset>
<?php if($model->frequency_application_type_id==1) {  //amateur station?>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>TYPE OF AMATEUR LICENCE APPLIED FOR</strong></legend>
<?php echo $model->amateurType->name;?>
</fieldset>	

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>PARTICULARS OF APPLICANT</strong></legend>
<table>
<tr>
<td>Nationality</td><td><?php echo $model->amateur_nationality; ?></td>
</tr>
<tr>
<td>Passport number</td><td><?php echo $model->amateur_passport_number; ?></td>
</tr>
<tr>
<td>Applicant date of birth</td><td><?php echo $model->amateur_date_birth;?></td>
</tr>
<tr>
<td>Do you possess a current Amateur licence?<td><?php echo $model->amateur_possess_licence?"Yes":"No"; ?></td>
</tr>
<tr>
<td>If yes give Call sign</td><td><?php echo $model->amateur_call_sign; ?></td>
</tr>
<tr>
<td>License issuing Authority</td><td><?php echo $model->amateur_issuing_authority; ?></td>
</tr>
</table>
</fieldset>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>PARENT/GUARDIAN CONTACT</strong></legend>
<table>
<tr>
<td>Name of Parent/ Guardian</td><td><?php echo $model->amateur_guardian_name; ?></td>
</tr>
<tr>
<td>Nationality</td><td><?php echo $model->amateur_guardian_nationality; ?></td>
</tr>
<tr>
<td>Passport number</td><td><?php echo $model->amateur_guardian_passport_number; ?></td>
</tr>
<tr>
<td>Physical Address: Town</td><td><?php echo $model->amateur_guardian_town; ?> Sreet <?php echo $model->amateur_guardian_street; ?></td>
</tr>
<tr>
<td>Postal Address:</td><td><?php echo $model->amateur_guardian_address; ?></td>
</tr>
<tr>
<td>Telephone</td><td><?php echo $model->amateur_guardian_telephone; ?></td>
</tr>
<tr>
<td>Email</td><td><?php echo $model->amateur_guardian_email; ?></td>
</tr>
<tr>
<td>Fax</td><td><?php echo $model->amateur_guardian_fax; ?></td>
</tr>
</table>
</fieldset>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>REFEREES FOR THE APPLICANT</strong></legend>
<B>First Referee</B>
<table>
<tr>
<td>Name</td><td><?php echo $model->amateur_referee_1_name; ?></td>
</tr>
<tr>
<td>P.O. Box</td><td><?php echo $model->amateur_referee_1_address; ?></td>
</tr>
<tr>
<td>Town</td><td><?php echo $model->amateur_referee_1_town; ?></td>
</tr>
<tr>
<td>Telephone</td><td><?php echo $model->amateur_referee_1_telephone; ?></td>
</tr>
<tr>
<td>Email</td><td><?php echo $model->amateur_referee_1_email; ?></td>
</tr>
</table>
<B>Second Referee</B>
<table>
<tr>
<td>Name</td><td><?php echo $model->amateur_referee_2_name; ?></td>
</tr>
<tr>
<td>P.O. Box</td><td><?php echo $model->amateur_referee_2_address; ?></td>
</tr>
<tr>
<td>Town</td><td><?php echo $model->amateur_referee_2_town; ?></td>
</tr>
<tr>
<td>Telephone</td><td><?php echo $model->amateur_referee_2_telephone; ?></td>
</tr>
<tr>
<td>Email</td><td><?php echo $model->amateur_referee_2_email; ?></td>
</tr>
</table>
</fieldset>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>RADIO AMATEUR TRANSMIT SECTION TO BE USED</strong></legend>
<table>
<tr>
<td>Make & Type of equipment</td><td><?php echo $model->amateur_equipment_made; ?></td>
</tr>
<tr>
<td>Model</td><td><?php echo $model->amateur_equipment_model; ?></td>
</tr>
<tr>
<td>Frequency ranges covered</td><td><?php echo $model->amateur_equipment_frequency_range; ?></td>
</tr>
<tr>
<td>Maximum Transmit Output Power (in watts)</td><td><?php echo $model->amateur_equipment_power; ?></td>
</tr>
<tr>
<td>Antenna Make & Type</td><td><?php echo $model->amateur_equipment_antenna_make; ?></td>
</tr>
<tr>
<td>Antenna Gain</td><td><?php echo $model->amateur_equipment_antenna_gain; ?></td>
</tr>
</table>
</fieldset>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>EVIDENCE FOR AMATEUR RADIO TRAINING</strong></legend>
<table>
<tr>
<td>Have you pass any Morse test for Radio amateur?</td><td><?php echo $model->amateur_pass_morse_test?"Yes":"No"; ?></td>
</tr>
</table>
</fieldset>
<?php } //end of amateur station?>

<?php if ($model->frequency_application_type_id==2) {  //ship station?>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>INFORMATION ON THE APPLICANT</strong></legend>
<table>
<tr>
<td>Purpose for which this service is required</td><td><?php echo $model->purpose; ?>
</td>
</tr>
</table>
</fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>INFORMATION ON THE SHIP STATION</strong></legend>
<table>
<tr>
<td>Name of Address of Ship Owner</td><td><?php echo $model->ship_owner; ?>
</td>
</tr>
<tr>
<td>Name of the Ship</td><td><?php echo $model->ship_name; ?>
</td>
</tr>
<tr>
<td>Type of Ship</td><td><?php echo $model->ship_type; ?>
</td>
</tr>
<tr>
<td>Ship Registration Number</td><td><?php echo $model->ship_registration_number; ?>
</td>
</tr>
</table>
</fieldset>


<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Details of Radio Equipment fitted in the Ship</strong></legend>

</fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Certification of Seaworthiness and Survey certificate</strong></legend>
<table>
<tr>
<td>Seaworthiness conducted and certification issued?</td><td><?php echo $model->ship_certificate_issued; ?></td>
</tr>
<tr>
<td>Inspection of the Ship conducted and Survey report form issued?</td><td><?php echo $model->ship_certificate_done; ?></td>
</tr>
</table>
</fieldset>
<?php }?>

<?php if ($model->frequency_application_type_id==3) {  //aircfta station?>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>INFORMATION ON THE APPLICANT</strong></legend>
<table>
<tr>
<td>Purpose for which this service is required</td><td><?php echo $model->purpose; ?>
</td>
</tr>
</table>
</fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>INFORMATION ON THE AIRCRAFT STATION</strong></legend>
<table>
<tr>
<td>Name and Address of Aircraft Owner</td><td><?php echo $model->aircraft_owner; ?>
</td>
</tr>

<tr>
<td>Type of Aircraft</td><td><?php echo $model->aircraft_type; ?>
</td>
</tr>

<tr>
<td>Aircraft Registration Number</td><td><?php echo $model->aircraft_registration_number; ?>
</td>
</tr>
</table>
</fieldset>


<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Radio Equipment fitted in the Aircraft</strong></legend>

</fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Certification of Airworthiness and Inspection Request of the Aircraft by
the Tanzania Civil Aviation Authority
</strong></legend>
<table>
<tr>
<td>Airworthiness conducted and certification issued?</td><td><?php echo $model->aircraft_certificate_issued; ?></td>
</tr>
<tr>
<td>Inspection of the Aircraft conducted and Aircraft radio station
inspection report form issued?
</td><td><?php echo $model->aircraft_inspection_done; ?></td>
</tr>
</table>
</fieldset>
<?php }?>

<?php if ($model->frequency_application_type_id==4) {  //radio station?>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>PURPOSE:</strong></legend>
<table>
<tr valign='top'>
<td>Purpose of Radio Service:</td><td><?php echo $model->purpose; ?>
</td>
</tr>
</table>
</fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>B: EQUIPMENT GENERAL SPECIFICATIONS</strong></legend>
<table>
<tr valign='top'>
<td>Make and Type:</td><td colspan='3'><?php echo $model->radio_equipment_make; ?></td>
</tr>
<tr valign='top'>
<td>Seller’s Name and Address:</td>
<td colspan='3'><?php echo $model->radio_equipment_seller_name_address; ?></td>
</tr>
<tr>
<td colspan='4'>Frequency Range:</td>
</tr>
<tr valign='top'>

<td>Fixed/mobile:
</td><td>From <?php echo $model->radio_equipment_fixed_from; ?>
To <?php echo $model->radio_equipment_fixed_to; ?>
 <?php echo $model->radio_equipment_fixed_unit;?></td>

</tr>
<tr>
<td>Portable:</td>
<td>From <?php echo $model->radio_equipment_portable_from; ?>
To <?php echo $model->radio_equipment_portable_to; ?>
 <?php echo $model->radio_equipment_portable_unit;
?>	
</td>
</tr>

<tr>
<td colspan='4'>Number of channels:</td>
</tr>
<tr valign='top'>

<td>Fixed/mobile:
</td><td> <?php echo $model->radio_equipment_fixed_channels; ?>

</tr>
<tr>
<td>Portable:</td>
<td> <?php echo $model->radio_equipment_portable_channels; ?>
</td>
</tr>
<tr>
<td >Type of Equipment:</td>
<td colspan='3'><?php echo $model->radio_equipment_type_id;?>	
</td>
</tr>
</table>
</fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>C: TECHNICAL SPECIFICATIONS</strong></legend>
<table>
<tr><td colspan='4'><B>Transmitter</B></td></tr>
<tr><td colspan='4'>Output power (e.r.p)</td></tr>
<tr valign='top'>
<td>Fixed/mobile:</td>
<td> <?php echo $model->radio_transmitter_power_fixed; ?>
<td>Portable:</td>
<td> <?php echo $model->radio_transmitter_power_portable; ?>
</tr>

<tr><td colspan='4'>Frequency stability</td></tr>
<tr valign='top'>
<td>Fixed/mobile:</td>
<td> <?php echo $model->radio_transmitter_stability_fixed; ?>
<td>Portable:</td>
<td> <?php echo $model->radio_transmitter_stability_portable; ?>
</tr>

<tr><td colspan='4'>Nominal bandwidth</td></tr>
<tr valign='top'>
<td>Fixed/mobile:</td>
<td> <?php echo $model->radio_transmitter_nominal_bandwidth_fixed; ?>
<td>Portable:</td>
<td> <?php echo $model->radio_transmitter_nominal_bandwidth_portable; ?>
</tr>

<tr><td colspan='4'>Type of Modulation</td></tr>
<tr valign='top'>
<td>Fixed/mobile:</td>
<td> <?php echo $model->radio_transmitter_modulation_fixed; ?>
<td>Portable:</td>
<td> <?php echo $model->radio_transmitter_modulation_portable; ?>
</tr>

<tr><td colspan='4'>Class of Emission</td></tr>
<tr valign='top'>
<td>Fixed/mobile:</td>
<td> <?php echo $model->radio_transmitter_emission_fixed; ?>
<td>Portable:</td>
<td> <?php echo $model->radio_transmitter_emission_portable; ?>
</tr>

<tr><td colspan='4'>Spurious harmonics</td></tr>
<tr valign='top'>
<td>Fixed/mobile:</td>
<td> <?php echo $model->radio_transmitter_harmonics_fixed; ?>
<td>Portable:</td>
<td> <?php echo $model->radio_transmitter_harmonics_portable; ?>
</tr>



<tr><td colspan='4'><B>Receiver</B></td></tr>
<tr><td colspan='4'>Sensitivity:</td></tr>
<tr valign='top'>
<td>Fixed/mobile:</td>
<td> <?php echo $model->radio_receiver_sensitivity_fixed; ?>
<td>Portable:</td>
<td> <?php echo $model->radio_receiver_sensitivity_portable; ?>
</tr>

<tr><td colspan='4'>Selectivity:</td></tr>
<tr valign='top'>
<td>Fixed/mobile:</td>
<td> <?php echo $model->radio_receiver_selectivity_fixed; ?>
<td>Portable:</td>
<td> <?php echo $model->radio_receiver_selectivity_portable; ?>
</tr>

<tr><td colspan='4'>Intermediation:</td></tr>
<tr valign='top'>
<td>Fixed/mobile:</td>
<td> <?php echo $model->radio_receiver_intermediation_fixed; ?>
<td>Portable:</td>
<td> <?php echo $model->radio_receiver_intermediation_portable; ?>
</tr>

<tr><td colspan='4'>Spurious rejection:</td></tr>
<tr valign='top'>
<td>Fixed/mobile:</td>
<td> <?php echo $model->radio_receiver_rejection_fixed; ?>
<td>Portable:</td>
<td> <?php echo $model->radio_receiver_rejection_portable; ?>
</tr>

</table>
</fieldset>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>D: ANTENNA:</strong></legend>
<table>
<tr><td>Type of antenna:</td><td><?php echo $model->radio_antenna_type; ?></td></tr>
<tr><td>Antenna gain:</td><td><?php echo $model->radio_antenna_gain; ?></td></tr>
<tr><td>Polarization:</td><td><?php echo $model->radio_antenna_polarization; ?></td></tr>
<tr><td>Azimuth of maximum radiation in degrees:</td><td><?php echo $model->radio_antenna_azimuth; ?></td></tr>
<tr><td>Angular with of radiation mainlobe in degrees:</td><td><?php echo $model->radio_antenna_angular; ?></td></tr>
<tr><td>Antenna height above ground level</td><td><?php echo $model->radio_antenna_height; ?></td></tr>
<tr><td>Site elevation above ground level</td><td><?php echo $model->radio_antenna_site_elevation; ?></td></tr>
</table>
</fieldset>

<fieldset style="-moz-border-radius: 0.4em;">

<legend><strong>E: LOCATION:</strong></legend>
<table>
<tr><td colspan='4' >Number and type of stations:</td></tr>
<tr>
<td>Fixed:<?php echo $model->radio_number_fixed; ?></td>
<td>Repeater:<?php echo $model->radio_number_mobile; ?></td>
<td>Mobile:<?php echo $model->radio_number_repeater; ?></td>
<td>Portable:<?php echo $model->radio_number_portable; ?></td>
</tr>
<tr>
<td colspan='2'>Length of circuit in kilometers</td><td colspan='2'><?php echo $model->radio_length; ?></td>
</tr>
<tr>
<td colspan='2'>Areas of Operation
</td><td colspan='2'><?php echo $model->radio_area; ?></td>
</tr>
<tr>
<td colspan='2'>Exact antenna site
</td><td colspan='2' valign="top"><?php echo $model->radio_exact_antenna_site; ?></td>
</tr>
<tr>
<td colspan='2'>Location of antenna
</td><td colspan='2'><?php echo $model->radio_location_antenna; ?></td>
</tr>
</table>
</fieldset>

<fieldset style="-moz-border-radius: 0.4em;">

<legend><strong>F:</strong></legend>
<table>
<tr><td>Maximum hours of Operation</td><td>From <?php echo $model->radio_hours_from; ?>To <?php echo $model->radio_hours_to; ?></td></tr>
</table>
</fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>G:</strong></legend>
<table>
<tr><td valign="top">Any other remarks</td>
<td><?php echo $model->radio_other_remarks; ?></td></tr>
</table>
</fieldset>
<?php }?>

<?php if ($model->frequency_application_type_id==5) {  //links?>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>B. PURPOSE FOR WHICH FREQUENCY ALLOCATION OR ASSIGNMENT IS
  REQUIRED
</strong></legend>
<table>
<tr><td>Purpose:</td><td>
 <?php 

	
		$mArray=array();
		$mArray['']='Select';
		$mArray['New frequency allocation']='New frequency allocation';
		$mArray['Additional frequency assignment']='Additional frequency assignment';
		
		echo CHtml::dropDownList('FrequencyApplication[purpose]',$model->purpose, $mArray);
?></td></tr>
<tr><td>Type of Licence:</td><td>
 <?php echo $model->link_type_licence; ?></td></tr>
</table>
</fieldset>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>C.RADIOCOMMUNICATION NETWORK DETAILS</strong></legend>
<table>
<tr><td colspan='2'><B>C.1 Radio Equipment Details:</B></td></tr>
<tr><td>Make and Type:</td><td><?php echo $model->link_equipment_make; ?></td></tr>
<tr><td>Frequency band (GHz):</td><td><?php echo $model->link_equipment_frequency_band; ?></td></tr>
<tr><td>Operating frequency range (MHz):</td><td><?php echo $model->link_equipment_frequency_from; ?><?php echo $model->link_equipment_frequency_from; ?></td></tr>
<tr><td>Channel Transmission Capacity (Mbps):</td><td><?php echo $model->link_equipment_channel_capacity; ?></td></tr>
<tr><td>Modulation Scheme:</td><td><?php echo $model->link_equipment_modulation_scheme; ?></td></tr>
<tr><td>Frequency Stability:</td><td><?php echo $model->link_equipment_frequency_stability; ?></td></tr>
<tr><td>Transmit power output to antenna (Watts):</td><td><?php echo $model->link_equipment_power; ?></td></tr>
<tr><td>Radiated spurious emissions:</td><td><?php echo $model->link_equipment_emission; ?></td></tr>
<tr><td>Receiver sensitivity:</td><td><?php echo $model->link_equipment_receiver_sensitivity; ?></td></tr>
<tr><td>Receiver adjacent channel selectivity:</td><td><?php echo $model->link_equipment_adjacent_channel_selectivity; ?></td></tr>
<tr><td>Number of frequency channels required:</td><td><?php echo $model->link_equipment_frequency_channels; ?></td></tr>
<tr><td>Channelization Plan required:</td><td><?php echo $model->link_equipment_channelization_plan; ?></td></tr>


<tr><td colspan='2'><B>C2. Antenna Details</B></td></tr>
<tr><td>Type and Make of Transmit/Receive antenna:</td><td><?php echo $model->link_antenna_make; ?></td></tr>
<tr><td>Receiving antenna gain (in dB/dBi):</td><td><?php echo $model->link_antenna_receiving_gain; ?></td></tr>
</table>
</fieldset>


<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>D. Radio Equipment Supply Information:</strong></legend>
<table>
<tr valign="top"><td colspan="2">Name and Address of the supplier:</td>
<td colspan="2">
<?php echo $model->link_supplier_name_address; ?></td>
</tr>
<tr valign="top"><td colspan="2">Postal Address:</td>
<td colspan="2">
<?php echo $model->link_supplier_postal_address; ?></td>
</tr>

<tr valign="top"><td>Business Telephone:</td>
<td>
<?php echo $model->link_supplier_telephone; ?></td>
<td>
Fax:<?php echo $model->link_supplier_fax; ?></td>
<td>
Email:<?php echo $model->link_supplier_email; ?></td>
</tr>
<tr valign="top">
<td>Physical Address:</td>
<td colspan='3'>
<?php echo $model->link_supplier_physical_address; ?></td>
<td>
</tr>
<tr>
<td>Road/street:</td>
<td>
<?php echo $model->link_supplier_street; ?></td>
<td>
<td>Plot No:</td>
<td>
<?php echo $model->link_supplier_plot; ?></td>
<td>
</tr>
</table>
</fieldset>


<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>E. PROPOSED NETWORK ACCESS AND/OR TRANSMISSION FREQUENCY LINKS</strong></legend>
<table>
<tr>
<td>Number of frequency channels required:</td>
<td><?php echo $model->link_channels; ?></td>
</tr>
<tr>
<td>RF channel bandwidth required:</td>
<td><?php echo $model->link_bandwidth; ?></td>
</tr>
<tr>
<td>Transmit/receive separation:</td>
<td><?php echo $model->link_separation; ?></td>
</tr>
<tr>
<td>Channel transmission capacity (Mbps):</td>
<td><?php echo $model->link_transmission_capacity; ?></td>
</tr>
<tr>
<td>Channelization plan required:</td>
<td><?php echo $model->link_channelization_plan; ?></td>
</tr>
</table>
</fieldset>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>F. DETAILS OF PROPOSED NETWORK ACCESS AND/OR TRANSDMISSION LINKS</strong></legend>

</fieldset>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>G. Miscellaneous Information</strong></legend>
<table>
<tr>
<td>Proposed date of putting into use:</td>
<td><?php echo $mode->link_proposed_date;?></td>
</tr>
<tr>
<td>Any Remarks</td>
<td><?php echo $model->link_proposed_date; ?></td>
</tr>
</table>
</fieldset>
<?php }?>




	
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Particulars of Authorised person who filled the application form</strong></legend>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Name</td>
    <td><?php echo $model->declaration_signatory; ?></td>
    <td>Date</td>

    <td>
    <?php echo $model->declaration_date; ?>
    </td>
  </tr>
  <tr>
    <td>Designation</td>
    <td><?php echo $model->declaration_designation; ?>
    </td>
    <td></td>
    <td></td>
  </tr>

  </table>
  </fieldset>
	

</div>
