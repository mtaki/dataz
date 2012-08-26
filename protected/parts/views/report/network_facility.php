<table border='1' cellspacing='0'>
<tr><td colspan='4'><?php echo $model->name;?></td></tr>
<tr><td>SN</td><td align='left'>LICENSEE'S DETAILS</td><td>DATE OF ISSUE</td><td>LICENSE SEGMENT</td></tr>
<?php
$count=-1;
$myarray=array();
foreach($rs as $row){
	$found=false;
	for($i=1;$i<=count($myarray);$i++){
		if ($row[0] == $myarray[$i-1][0]){
			$found=true;
			if ($row[3] != $myarray[$i-1][3]){ //dates differ
				$myarray[$i-1][3]=$myarray[$i-1][3]."<br>".$row[3]."</br"; //print dates in different lines
				$myarray[$i-1][2]=$myarray[$i-1][2]."<br>".$row[2]."</br"; //print market segments in different lines
			}else{
				$myarray[$i-1][2]=$myarray[$i-1][2]." and ".$row[2]; //print market segments concatenated
			}
		}
	}
	if (!$found){
		$count++;
		$myarray[$count]=$row;
	}
}

$count=0;
foreach($myarray as $row){
$count++;
?>
<tr><td valign='top'><?php echo $count;?></td><td  valign='top'><?php echo $row[0];?><br><?php echo $row[5];?></br><br><?php echo $row[6];?></br><br>Tel: <?php echo $row[7];?></br><br>Fax: <?php echo $row[8];?></br><br>Website: <?php echo $row[9];?></br></td><td valign='top'><?php echo $row[3];?></td><td valign='top'><?php echo $row[2];?></td></tr>
<?php
}
?>
</table>

