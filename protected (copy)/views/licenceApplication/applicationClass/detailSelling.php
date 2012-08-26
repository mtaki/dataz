<?php
$html="<table width='600' class='detail-view'>";
$acs=ApplicationSelling::model()->with('licenceApplication','licenceApplication.licenceCategory','licenceApplication.applicant','licenceApplication.marketSegment')->findAll(array('condition'=>"t.id=$id"));
foreach ($acs as $ac)
	$la=$ac->licenceApplication;
$ms=$la->marketSegment;
$lc=$la->licenceCategory;
$a=$la->applicant;

$html.="<tr align='left' class='odd'><th>Applicant:</th><td>$a->name</td><th>Application Date:</th><td>$la->application_date</td></tr>";
$html.="<tr align='left' class='even'><th>Application No:</th><td>$ac->application_number</td><th>Status</th><td>$la->status</td></tr>";

$html.="<tr align='left' class='odd'><th colspan='2'>Description of equipment you wish to distribute
</th><td colspan='2'>$ac->type_make</td></tr>";
$html.="<tr align='left' class='even'><th colspan='2'>Area you intend to distribute the equipment whether
National, Regional or District
</th><td colspan='2'>$ac->area</td></tr>";
$html.="<tr align='left' class='even'><th colspan='2'>How do you procure the equipment
</th><td colspan='2'>$ac->how_procure</td></tr>";
$html.="<tr align='left' class='odd'><th colspan='2'>How many years has it been
operating</th><td colspan='2'>$ac->previous_licence</td></tr>";
$html.="<tr align='left'><th colspan='4' style=\"background-color:#D7DEEE;\">Declaration</th></tr>";
$html.="<tr align='left' class='even'><th>Name:</th><td>".$la->signatory_name."</td><th>Position:</th><td>".$la->signatory_title."</td></tr>";
$html.="<tr align='left' class='odd'><th>Date</th><td>".$la->sign_date."</td><th>&nbsp;</th><td>&nbsp;</td></tr>";


$html.="</table>";
echo $html;
?>
