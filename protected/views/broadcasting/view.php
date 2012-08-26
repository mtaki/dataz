<h1>View Frequency </h1>
<?php if ($model->frequency_type_id==1){?>
<table class='detail-view'>
<tr class='odd'><td>Operator</td><td>
<?php echo $model->operator->name;?>
</td></tr>
<tr class='even'><td>Transmission System</td>
<td>
<?php echo $model->frequencyTransmission->name;?>
</td></tr>
<tr class='odd'><td>Frequency Band</td><td>
<?php echo $model->band;?>
</td></tr>
<tr class='even'><td>Channel Band Width</td><td>
<?php echo $model->channel_band_width;?>
</td></tr>
<tr class='odd'><td>TX-RX Separation</td><td>
<?php echo $model->separation;?>
</td></tr>
<tr class='odd'><td>TX-RX Spacing</td><td>
<?php echo $model->tx_rx_spacing;?>
</td></tr>
<tr class='even'><td>First Frequency</td><td>
<?php echo $model->frequency_1;?>
</td></tr>
<tr class='odd'><td>Number of channels</td><td>
<?php echo $model->channel;?>
</td></tr>
<tr class='even'><td>Total Band Width</td><td>
<?php echo $model->total_band_width;?> MHz
</td></tr>
<tr class='odd'><td>Comments</td><td><?php echo $model->comments;?></td></tr>
</table>
Frequency Tabulation
<table class='detail-view'>
<tr class='even'><td>CH#</td><td>F</td><td>F'</td><td>TX/RX SEPARATION</td><td>TX/RX SPACING</td></tr>
<?php 
$frequency=$model->frequency_1 + 0;
for($i=0;$i<$model->channel;$i++){
	$frequency2=$frequency + $model->separation;
	echo "<tr class='odd'><td>".($i+1)."</td><td>$frequency</td><td>$frequency2</td><td>".($model->separation + 0)."</td><td>".($model->tx_rx_spacing + 0)."</td></tr>";
	$frequency=$frequency + $model->tx_rx_spacing;
}
?>

</table>
<?php } ?>	
<?php if ($model->frequency_type_id==2){?>
<table class='detail-view'>
<tr class='odd'><td>Operator</td><td>
<?php echo $model->operator->name;?>
</td></tr>
<tr class='even'><td>Technology</td><td>
<?php echo $model->frequencyTransmission->name;?>
</td></tr>
<tr class='odd'><td>Frequency Band</td><td>
<?php echo $model->band;?>
</td></tr>
<tr class='even'><td>Frequency Band Width</td>
<td>
<?php echo $model->frequency_band_width;?>
</td></tr>
<tr class='odd'><td>TX-RX Separation</td>
<td>
<?php echo $model->separation;?>
</td></tr>
<tr class='even'>
<td>Number of zones</td><td>
<?php echo $model->zone;?>
</td></tr>
<tr class='odd'><td>Assigned Frequencies</td><td>

<?php echo ($model->frequency_1 + 0);?> - <?php echo ($model->frequency_2 + 0);?>&nbsp;&nbsp;U/L

<BR/>
<?php echo ($model->frequency_3 + 0);?> - <?php echo ($model->frequency_4 + 0);?>&nbsp;&nbsp;D/L </td></tr>

<tr class='even'><td>Total Band Width</td><td>
<?php echo $model->total_band_width;?> MHz
</td></tr>
<tr class='odd'><td>Comments</td><td><?php echo $model->comments;?></td></tr>
</table>
	
<?php } ?>	
<?php if ($model->frequency_type_id==3){?>
<table class='detail-view'>
<tr class='odd'><td>Operator</td><td>
<?php echo $model->operator->name;?>
</td></tr>
<tr class='even'><td>Technology</td><td>
<?php echo $model->frequencyTransmission->name;?>
</td></tr>
<tr class='odd'><td>Frequency Band</td><td>
<?php echo $model->band;?>
</td></tr>
<tr class='even'><td>Frequency Band Width</td>
<td>
<?php echo $model->frequency_band_width;?>
</td></tr>

<tr class='odd'><td>Assigned Frequencies</td><td>

<?php echo ($model->frequency_1 + 0);?> - <?php echo ($model->frequency_2 + 0);?>&nbsp;&nbsp;U/L
<BR />
<?php echo ($model->frequency_3 + 0);?> - <?php echo ($model->frequency_4 + 0);?>&nbsp;&nbsp;D/L</td></tr>

<tr class='even'><td>Total Band Width</td><td>
<?php echo $model->total_band_width;?> MHz
</td></tr>
<tr class='odd'><td>Comments</td><td><?php echo $model->comments;?></td></tr>
</table>
<?php }?>

