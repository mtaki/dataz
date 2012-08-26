<table border='1' cellspacing='0'>
<tr><td colspan='4'>NETWORK FACILITIES LICENCES</td></tr>
<tr><td>SN</td><td align='left'>LICENSEE'S DETAILS</td><td>DATE OF ISSUE</td><td>LICENSE SEGMENT</td></tr>
<?php
$count=0;
foreach($rs as $row){
$count++;
?>
<tr><td valign='top'><?php echo $count;?></td><td  valign='top'><?php echo $row[0];?><br><?php echo $row[5];?></br><br><?php echo $row[6];?></br><br>Tel: <?php echo $row[7];?></br><br>Fax: <?php echo $row[8];?></br><br>Website: <?php echo $row[9];?></br></td><td valign='top'><?php echo $row[3];?></td><td valign='top'><?php echo $row[2];?></td></tr>
<?php
}
?>
</table>

