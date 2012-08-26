

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'frequency-application-link-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<div class="row">
		<?php echo $form->labelEx($model,'frequency_application_id'); ?>
		<?php echo $form->textField($model,'frequency_application_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'frequency_application_id'); ?>
	</div>
	
<table width="823"  border="1"  id="assignment_table">

<tr><td width="30">Sno</td>
<td >Parameter</td><td width="135">Station A</td>
<td width="173">Station B</td>
</tr>

<tr><td>1</td>
<td width="516">Exact site name of the station/ antenna tower location</td>
<td width="135"><?php echo $form->textField($model,'station_a_name',array('size'=>20,'maxlength'=>50)); ?>
	<?php echo $form->error($model,'station_a_name'); ?></td>
<td><?php echo $form->textField($model,'station_b_name',array('size'=>20,'maxlength'=>50)); ?>
	<?php echo $form->error($model,'station_b_name'); ?></td>
</tr>

<tr><td>2</td><td>Geographical location Longitude (deg/min/sec)</td>
<td><?php echo $form->textField($model,'station_a_longitude'); ?>
	<?php echo $form->error($model,'station_a_longitude'); ?></td>
<td><?php echo $form->textField($model,'station_b_longitude'); ?>
	<?php echo $form->error($model,'station_b_longitude'); ?></td>
</tr>

<tr><td>3</td><td>Geographical location Latitude (deg/min/sec)</td>
<td><?php echo $form->textField($model,'station_a_latitude'); ?>
		<?php echo $form->error($model,'station_a_latitude'); ?></td>
<td><?php echo $form->textField($model,'station_b_latitude'); ?>
	<?php echo $form->error($model,'station_b_latitude'); ?></td>
</tr>

<tr><td>4</td><td>Antenna Size(m)</td>
<td><?php echo $form->textField($model,'station_a_antenna_size'); ?>
	<?php echo $form->error($model,'station_a_antenna_size'); ?></td>
<td><?php echo $form->textField($model,'station_b_antenna_size'); ?>
	<?php echo $form->error($model,'station_b_antenna_size'); ?></td>
</tr>

<tr><td>5</td><td>Height of antenna above ground level (agl)</td>
<td><?php echo $form->textField($model,'station_a_agl'); ?>
		<?php echo $form->error($model,'station_a_agl'); ?></td>
<td><?php echo $form->textField($model,'station_b_agl'); ?>
		<?php echo $form->error($model,'station_b_agl'); ?></td>
</tr>


<tr><td>6</td><td>Height of antenna above sea level (asl)</td>
<td><?php echo $form->textField($model,'station_a_asl'); ?>
	<?php echo $form->error($model,'station_a_asl'); ?></td>
<td><?php echo $form->textField($model,'station_b_asl'); ?>
	<?php echo $form->error($model,'station_b_asl'); ?></td>
</tr>

<tr><td>7</td><td>Length of Hop from station A to B (Km)</td>
<td><?php echo $form->textField($model,'length'); ?>
		<?php echo $form->error($model,'length'); ?></td><td>Station B</td></tr>

<tr><td>8</td><td>Antenna type</td>
<td><?php echo $form->textField($model,'station_a_antenna_type',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'station_a_antenna_type'); ?></td>
<td><?php echo $form->textField($model,'station_b_antenna_type',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'station_b_antenna_type'); ?></td>
</tr>


<tr><td>9</td><td>Antenna gain</td>
<td><?php echo $form->textField($model,'station_a_antenna_gain',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'station_a_antenna_gain'); ?></td>
<td><?php echo $form->textField($model,'station_b_antenna_gain',array('size'=>30,'maxlength'=>30)); ?>
	<?php echo $form->error($model,'station_b_antenna_gain'); ?></td>
</tr>

<tr><td>10</td><td>Transmitter output power (Watts)</td>
<td><?php echo $form->textField($model,'station_a_power'); ?>
	<?php echo $form->error($model,'station_a_power'); ?></td>
<td><?php echo $form->textField($model,'station_b_power'); ?>
	<?php echo $form->error($model,'station_b_power'); ?></td>
</tr>

<tr><td>11</td><td>Effective radiated power (EIRP) (Watts)</td>
<td><?php echo $form->textField($model,'station_a_effective_power'); ?>
	<?php echo $form->error($model,'station_a_effective_power'); ?></td>
<td><?php echo $form->textField($model,'station_b_effective_power'); ?>
	<?php echo $form->error($model,'station_b_effective_power'); ?></td>
</tr>

<tr><td>12</td><td>Beam width</td>
<td><?php echo $form->textField($model,'station_a_beam_width'); ?>
	<?php echo $form->error($model,'station_a_beam_width'); ?></td>
<td><?php echo $form->textField($model,'station_b_beam_width'); ?>
	<?php echo $form->error($model,'station_b_beam_width'); ?></td>
</tr>

<tr><td>13</td><td>Antenna polarization</td>
<td><?php echo $form->textField($model,'station_a_polarization',array('size'=>10,'maxlength'=>30)); ?>
	<?php echo $form->error($model,'station_a_polarization'); ?></td>
<td><?php echo $form->textField($model,'station_b_polarization',array('size'=>10,'maxlength'=>30)); ?>
	<?php echo $form->error($model,'station_b_polarization'); ?></td>
</tr>

<tr><td>14</td><td>Azimuth (degrees)</td>
<td><?php echo $form->textField($model,'station_a_azimuth'); ?>
	<?php echo $form->error($model,'station_a_azimuth'); ?></td><td><?php echo $form->textField($model,'station_b_azimuth'); ?>
	<?php echo $form->error($model,'station_b_azimuth'); ?></td>
</tr>

<tr><td>15</td><td>T/T channel spacing (bandwidth) (MHz) desired</td>
<td><?php echo $form->textField($model,'station_a_channel_spacing'); ?>
	<?php echo $form->error($model,'station_a_channel_spacing'); ?></td>
<td><?php echo $form->textField($model,'station_b_channel_spacing'); ?>
	<?php echo $form->error($model,'station_b_channel_spacing'); ?></td>
</tr>

<tr><td>16</td><td>T/R separation desired</td>
<td><?php echo $form->textField($model,'station_a_tr_separation'); ?>
		<?php echo $form->error($model,'station_a_tr_separation'); ?></td>
<td><?php echo $form->textField($model,'station_b_tr_separation'); ?>
		<?php echo $form->error($model,'station_b_tr_separation'); ?></td>
</tr>

<tr><td>17</td><td>ystem capacity (Mbps) desired
</td><td><?php echo $form->textField($model,'station_a_tr_capacity'); ?>
		<?php echo $form->error($model,'station_a_tr_capacity'); ?></td>
		<td><?php echo $form->textField($model,'station_b_tr_capacity'); ?>
		<?php echo $form->error($model,'station_b_tr_capacity'); ?></td></tr>

<tr><td height="25">18</td>
<td>No. of Channels or configuration (e.g. for 1+0; or1+N system) desired</td>
<td><?php echo $form->textField($model,'station_a_channels'); ?>
	<?php echo $form->error($model,'station_a_channels'); ?></td>
<td><?php echo $form->textField($model,'station_b_channels'); ?>
<?php echo $form->error($model,'station_b_channels'); ?></td>
</tr>

</table>
	

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

