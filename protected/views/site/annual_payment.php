<?php
//$condition=array()
$licence_application=LicenceApplication::model()->with(array('operator','licenceCategory'))->findAll(array('condition'=>'licence_category_id=1 and operator_id=2'));
$count=0;
foreach($licence_application as $key=>$result){
echo $result->operator->name."=>".$result->licenceCategory->name;
echo"<br>";
$count++;


}
echo $count;
$annual_fees=0.8/100*1000000/$count;
echo $annual_fees;

?>
