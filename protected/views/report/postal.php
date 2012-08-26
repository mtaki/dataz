<table border='1' cellspacing='0'>
<tr><td colspan='4'>Postal Sector Operators</td></tr>
<tr><td>SN</td><td align='left'>Name of the Company</td><td>Date of Issue</td><td>Licence category</td></tr>
<?php

$count=0;
foreach($rs as $row){
$count++;
?>
<tr><td valign='top'><?php echo $count;?></td><td  valign='top'><?php echo $row[0];?><br><?php echo $row[5];?></br><br><?php echo $row[6];?></br><br>Tel: <?php echo $row[7];?></br><br>Fax: <?php echo $row[8];?></br><br>Website: <?php echo $row[9];?></br></td><td valign='top'><?php echo $row[3];?></td><td valign='top'><?php echo $row[1];?></td></tr>
<?php
}
?>
</table>

