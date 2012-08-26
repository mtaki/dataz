#!/usr/bin/php
<?php
mysql_connect('localhost','root','1234');
mysql_select_db('tcra-migration');
mysql_query("delete from tcra.statistics_telecom_base");
$rs11=mysql_query('SELECT * from `SUBSCRIPTION_STATISTICS`');

while($row1=mysql_fetch_array($rs11)){
	$year=$row1['Year'];
	$month_name=$row1['Reporting Month'];
	$operator=$row1['L_No'];
	
	if ($operator=='VODACOM')
		$operator_id=18;
	elseif ($operator=='TIGO')
		$operator_id=3;
	elseif ($operator=='AIRTEL')
		$operator_id=22;
	elseif ($operator=='ZANTEL')
		$operator_id=5;
	elseif ($operator=='TTCL')
		$operator_id=2;
	elseif ($operator=='BENSON')
		$operator_id=835;
	elseif ($operator=='SASATEL')
		$operator_id=844;

	$datex="01 $month_name 2010";
	$month=date('n',strtotime($datex));

	
	echo $year.' '.$month_name.' '.$month.' '.$operator.' '.$operator_id."\n";
	$rs2=mysql_query("select id from tcra.statistics_telecom_main where operator_id=$operator_id and st_year=$year and st_month=$month");
	
	$row2=mysql_fetch_array($rs2);
	$main_id=$row2['id'];
	
	
	$num=$row1['Mobile Prepaid'];
	if (empty($num)) $num=0;
	$service_id=1;
	$sql="INSERT INTO tcra.statistics_telecom_base values($main_id,$service_id,$num)";
	echo "$sql \n";
	mysql_query($sql);

	$num=$row1['Mobile Postpaid'];
	if (empty($num)) $num=0;
	$service_id=2;
	$sql="INSERT INTO tcra.statistics_telecom_base values($main_id,$service_id,$num)";
	echo "$sql \n";
	mysql_query($sql);

	$num=$row1['Fixed Prepaid'];
	if (empty($num)) $num=0;
	$service_id=3;
	$sql="INSERT INTO tcra.statistics_telecom_base values($main_id,$service_id,$num)";
	echo "$sql \n";
	mysql_query($sql);

	$num=$row1['Fixed Postpaid'];
	if (empty($num)) $num=0;
	$service_id=4;
	$sql="INSERT INTO tcra.statistics_telecom_base values($main_id,$service_id,$num)";
	echo "$sql \n";
	mysql_query($sql);

	$num=$row1['Registered Subs'];
	if (empty($num)) $num=0;
	$service_id=5;
	$sql="INSERT INTO tcra.statistics_telecom_base values($main_id,$service_id,$num)";
	echo "$sql \n";
	mysql_query($sql);

	$num=$row1['Mobile Money Services'];
	if (empty($num)) $num=0;
	$service_id=6;
	$sql="INSERT INTO tcra.statistics_telecom_base values($main_id,$service_id,$num)";
	echo "$sql \n";
	mysql_query($sql);
	
}

?>
