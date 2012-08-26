<?php
$html="<table width='600' class='detail-view'>";
$acs=ApplicationInstallation::model()->with('licenceApplication','licenceApplication.licenceCategory','licenceApplication.applicant','licenceApplication.marketSegment')->findAll(array('condition'=>"t.id=$id"));
foreach ($acs as $ac)
	$la=$ac->licenceApplication;
$ms=$la->marketSegment;
$lc=$la->licenceCategory;
$a=$la->applicant;

$html.="<tr align='left' class='even'><th>Applicant:</th><td>$a->name</td><th>Application Date:</th><td>$la->application_date</td></tr>";
$html.="<tr align='left' class='odd'><th>Market Segment:</th><td>$ms->name</td><th>Status:</th><td>$la->status</td></tr>";
$html.="<tr align='left' class='even'><th>Application No:</th><td>$ac->application_number</td><th>&nbsp;</th><td>&nbsp;</td></tr>";

$html.="<tr align='left' class='odd'><th colspan='2'>Type and Make of Equipment Intended for Installation/Maintenance</th><td colspan='2'>$ac->type_make</td></tr>";
$html.="<tr align='left' class='even'><th colspan='2'>Brief description of activities you wish to undertake</th><td colspan='2'>$ac->activities</td></tr>";
$html.="<tr align='left' class='odd'><th colspan='2'>how do you procure the equipment</th><td colspan='2'>$ac->how_procure_equipment</td></tr>";
$html.="<tr align='left' class='even'><th colspan='2'>Indicate investment costs of business</th><td colspan='2'>$ac->investiment_cost</td></tr>";
$html.="<tr align='left' class='odd'><th colspan='2'>Number of qualified technical staff and their qualifications
</th><td colspan='2'>$ac->staff</td></tr>";
$html.="<tr align='left' class='even'><th colspan='2'>
Number of other qualified supporting staffs and their qualifications</th><td colspan='2'>$ac->support_staff</td></tr>";
$checked=($ac->possess_office==1)?'Yes':'No';
$html.="<tr align='left' class='odd'><th>Do you possess any office</th><td>$checked</td><th>Office description</th><td>$ac->office_description</td></tr>";
$checked=($ac->possess_workshop==1)?'Yes':'No';
$html.="<tr align='left' class='even'><th>Do you possess any workshop</th><td>$checked</td><th>Workshop description</th><td>$ac->workshop_description</td></tr>";
$checked=($ac->possess_vehicle==1)?'Yes':'No';
$html.="<tr align='left' class='odd'><th>Do you possess any vehicle</th><td>$checked</td><th>How many</th><td>$ac->vehicle_how_many</td></tr>";
$html.="<tr align='left' class='even'><th>Other means of transport</th><td>$ac->other_transport</td><th>Equipemnt and test gears</th><td>$ac->test_gears</td></tr>";
$html.="<tr align='left' class='odd'><th>Source of spares</th><td>$ac->source_spares</td><th>Previous Licence</th><td>$ac->previous_licence</td></tr>";

$html.="<tr align='left'><th colspan='4' style=\"background-color:#D7DEEE;\">Declaration</th></tr>";
$html.="<tr align='left' class='even'><th>Name:</th><td>".$la->signatory_name."</td><th>Position:</th><td>".$la->signatory_title."</td></tr>";
$html.="<tr align='left' class='odd'><th>Date</th><td>".$la->sign_date."</td><th>&nbsp;</th><td>&nbsp;</td></tr>";


$html.="</table>";
echo $html;
?>
