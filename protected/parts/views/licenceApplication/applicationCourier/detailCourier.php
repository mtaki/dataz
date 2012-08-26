<?php
$html="<table width='600' class='detail-view'>";
$acs=ApplicationCourier::model()->with('licenceApplication','licenceApplication.licenceCategory','licenceApplication.applicant','licenceApplication.marketSegment')->findAll(array('condition'=>"t.id=$id"));
foreach ($acs as $ac)
	$la=$ac->licenceApplication;
$ms=$la->marketSegment;
$lc=$la->licenceCategory;
$a=$la->applicant;

$html.="<tr align='left'><th colspan='4' style=\"background-color:#D7DEEE;\">General Information</th></tr>";
$html.="<tr align='left' class='even'><th>Applicant:</th><td>$a->name</td><th>Application Date:</th><td>$la->application_date</td></tr>";
$html.="<tr align='left' class='odd'><th>Market Segment:</th><td>$lc->name</td><th>Status:</th><td>$la->status</td></tr>";
$html.="<tr align='left' class='even'><th>Sector:</th><td>$ac->sector</td><th>&nbsp;</th><td>&nbsp;</td></tr>";
$html.="<tr align='left' class='odd'><th>Projection:</th><td>$ac->projection</td><th>Compensation and Insuration Policy:</th><td>$ac->insurance_policy</td></tr>";
$html.="<tr align='left' class='even'><th>Track and Trace System:</th><td colspan='3'>$ac->track_trace</td></tr>";
$html.="<tr align='left' class='odd'><th colspan='2'>Expected date of commencement of operation</th><td colspan='2'>$la->start_date</td></tr>";
$html.="<tr align='left'><th colspan='4' style=\"background-color:#D7DEEE;\">Licence Application Attachments</th></tr>";

$html.="<tr align='left'  class='even'>";
$checked=($ac->trade_licence==1)?'Submitted':'Not Submitted';	
$html.="<td width='200'><B>Valid Trade Licence</B></td><td width='100'>$checked</td>";
		
$checked=($ac->business_name_registration==1)?'Submitted':'Not Submitted';
$html.="<td width='200'><B>Company or Business name Registration</B></td><td width='100'>$checked</td>";
$html.="</tr>";

$html.="<tr align='left'  class='odd'>";
$checked=($ac->tra_registered==1)?'Submitted':'Not Submitted';	
$html.="<td width='200'><B>VAT and Tax Registration</B></td><td width='100'>$checked</td>";
		
$checked=($ac->business_plan==1)?'Submitted':'Not Submitted';
$html.="<td width='200'><B>Business Plan</B></td><td width='100'>$checked</td>";
$html.="</tr>";

$html.="<tr align='left'><th colspan='4' style=\"background-color:#D7DEEE;\">Declaration</th></tr>";
$html.="<tr align='left' class='even'><th>Name:</th><td>".$la->signatory_name."</td><th>Position:</th><td>".$la->signatory_title."</td></tr>";
$html.="<tr align='left' class='odd'><th>Date</th><td>".$la->sign_date."</td><th>&nbsp;</th><td>&nbsp;</td></tr>";


$html.="</table>";
echo $html;
?>
