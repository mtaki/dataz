<table  border="0" cellspacing="3" cellpadding="0" class='detail-view'>
	<tr style="background-color:#D7DEEE"><td colspan='4'>Contact Details</td></tr>
  <tr class='odd'>
    <td><B>NAME</B></td><td><?php echo $model->name; ?></td>
    <td><B>ADDRESS</B></td><td><?php echo $model->address; ?></td>

  </tr>
  <tr class='even'>
    
    <td><B>TELEPHONE</B></td><td><?php echo $model->telephone; ?></td><td><B>MOBILE</B></td><td><?php echo $model->mobile; ?></td>
  </tr>
  <tr class='odd'>
    <td><B>FAX</B></td><td><?php echo $model->fax; ?></td><td><B>EMAIL</B></td><td><?php echo $model->email; ?></td>
  </tr>

    <tr class='even'>
    <td><B>CONTACT PERSON</B></td><td><?php echo $model->contact_person; ?></td><td><B>CONTACT PERSON 2</B></td><td><?php echo $model->contact_person_2; ?></td>
  </tr>

  </table>



<table  border="0" cellspacing="3" cellpadding="0" class='detail-view'>
<tr style="background-color:#D7DEEE"><td colspan='4'>Physical Address</td></tr>
  <tr class='odd'>
    <td width='25%'><B>POST CODE</B></td><td width='25%'><?php echo $model->postal_code; ?></td>
    <td width='25%'><B>TOWN</B></td><td width='25%'><?php echo $model->town; ?></td>
  </tr>
  <tr class='even'>
    <td><B>STREET</B></td><td><?php echo $model->street; ?></td>
    <td><B>PLOT NUMBER</B></td><td><?php echo $model->plot_no; ?></td>

  </tr>
  </table>


<table  border="0" cellspacing="3" cellpadding="0" class='detail-view'>
<tr style="background-color:#D7DEEE"><td colspan='4'>Business Details</td></tr>
  <tr class='odd'>
    <td width='25%'><B>TYPE/NAME&nbsp;OF&nbsp;BUSINESS</B></td><td width='25%'><?php echo $model->type_name_business; ?></td>
    <td width='25%'><B>BUSINESS&nbsp;REGISTRATION&nbsp;NO</B></td><td width='25%'><?php echo $model->business_registration_number; ?></td>

  </tr>
  <tr class='even'>
    <td><B>REGISTRATION PLACE</B></td><td><?php echo $model->registration_place; ?></td>
    <td><B>REGISTRATION DATE</B></td><td><?php echo ($model->registration_date=='01-01-1970')?'':$model->registration_date; ?></td>
  </tr>
  <tr class='odd'>
    <td><B>TIN NUMBER</B></td><td><?php echo $model->tin; ?></td>

    <td><B>CERTIFICATE&nbsp;OF&nbsp;INCORPORATION</B></td><td><?php echo $model->certificate_incorporation; ?></td>
  </tr>
  <tr class='even'>
    <td><B>PLACE OF CERTIFICATION</B></td><td><?php echo $model->certificate_place;?></td>
    <td><B>DATE OF CERTIFICATION</B></td><td><?php echo ($model->certificate_date=='01-01-1970')?'':$model->certificate_date;?></td>
  </tr>
  <tr class='odd'>

    <td></td><td></td>
    <td><B>SHARE CAPITAL</B></td><td><?php echo $model->share_capital; ?></td>
  </tr>
  </table>


<?php 
if (count($model->shareHolders) > 0){
	echo "<br/><table class='detail-view'><tr style=\"background-color:#D7DEEE\"><td colspan='7'>Share holders</td></tr>
	<tr align='left' style=\"background-color:#D7DEEE;\"><th>Name</th><th>Citizenship</th><th>Phone</th><th>Address</th><th>Email</th><th>Number of share</th><th>Share %</th></tr>";
	$class='odd';
	foreach ($model->shareHolders as $shareHolder){
		if ($shareHolder->share_percentage==0)
			$shareHolder->share_percentage='';
		echo"
			<tr align='left' class='$class'><th>$shareHolder->name</th><th>".$shareHolder->citizenship->name."</th><th>$shareHolder->phone</th><th>$shareHolder->address</th><th>$shareHolder->email</th><th>$shareHolder->share_number</th><th>$shareHolder->share_percentage</th></tr>
		";
		if ($class=='odd')
			$class='even';
		else 
			$class='odd';
		
	}
	echo "</table>";
}
?>	






