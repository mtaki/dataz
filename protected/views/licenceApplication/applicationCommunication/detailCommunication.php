<?php
$html="<table width='600' class='detail-view'>";
$acs=ApplicationCommunication::model()->with('licenceApplication','licenceApplication.licenceCategory','licenceApplication.applicant','licenceApplication.marketSegment')->findAll(array('condition'=>"t.id=$id"));
foreach ($acs as $ac)
	$la=$ac->licenceApplication;
$ms=$la->marketSegment;
$lc=$la->licenceCategory;
$a=$la->applicant;
$cur=Currency::model()->findByPk($ac->estimated_cost_currency);
$staff=($ac->staff==1)?'Yes':'No';
$use_frequency=($ac->use_frequency==1)?'Yes':'No';
$use_numbering_resource=($ac->use_numbering_resource==1)?'Yes':'No';
$staff_training=($ac->staff_training==1)?'Yes':'No';
$diagram=($ac->network_diagram==1)?'Yes':'No';

$html.="<tr align='left'><th colspan='4' style=\"background-color:#D7DEEE;\">General Information</th></tr>\n";
$html.="<tr align='left' class='even'><th>Applicant:</th><td>$a->name</td><th>Application Date:</th><td>$la->application_date</td></tr>\n";
$html.="<tr align='left' class='odd'><th>Market Segment:</th><td>$ms->name</td><th>Commencement Date:</th><td>$la->start_date</td></tr>\n";
$html.="<tr align='left' class='even'><th>Nature of Service :</th><td>$ac->nature</th><th>Future Plans:</th><td>$ac->future_plans</td></tr>\n";
$html.="<tr align='left' class='odd'><th>Estimated Cost:</th><td>".number_format($ac->estimated_cost, 2, ".", ", ")." $cur->name</th><th> Network diagram Attached</th><td>&nbsp;</td></tr>\n";
$html.="<tr align='left' class='even'><th>Does the applicant intend to use frequency spectrum</th><td>".$use_frequency."</th><th> Network diagram Attached</th><td>$diagram</td></tr>\n";
$html.="<tr align='left' class='odd'><th>Does the applicant intend to use numbering resources</th><td>".$use_numbering_resource."</th><th>Specified numbering resources</th><td>$ac->numbering_resource_description</td></tr>\n";
$html.="<tr align='left' class='even'><th>Staff establishment and qualification (present and future) attached</th><td>".$staff."</td><th>Staff training programmes attached</th><td>".$staff_training."</td></tr>\n";
$html.="<tr align='left' class='odd'><th>Type:</th><td>$lc->name</td><th>Status:</th><td>$la->status</td></tr>\n";
$html.="<tr align='left'><th colspan='4' style=\"background-color:#D7DEEE;\">Licence Application Attachments</th></tr>\n";

$html.="<tr align='left'  class='odd'>";
$checked=($ac->transmittal_letter==1)?'Submitted':'Not Submitted';	
$html.="<td width='200'><B>Transmittal Letter to the DG</B></td><td width='100'>$checked</td>";
		
$checked=($ac->manual==1)?'Submitted':'Not Submitted';
$html.="<td width='200'><B>Manuals, brochures and technical specifications</B></td><td width='100'>$checked</td>";
$html.="</tr>";

$checked=($ac->receipt_photocopy==1)?'Submitted':'Not Submitted';
$html.="<tr  class='even'><td><B>Photo copy of receipt for application fees</B></td><td>$checked</td>";
$checked=($ac->rollout_plan==1)?'Submitted':'Not Submitted';
$html.="<td><B>Network rollout plan</B></td><td>$checked</td>";
$html.="</tr>";


$html.="<tr  class='odd'>";
$checked=($ac->certificate_incorporation==1)?'Submitted':'Not Submitted';
$html.="<td><B>A certified copy of certificate of Incorporation or Registration</B></td><td>$checked</td>";
$checked=($ac->network_configuration==1)?'Submitted':'Not Submitted';
$html.="<td><B>Network configurations</B></td><td>$checked</td>";
$html.="</tr>";

$checked=($ac->company_memorandum==1)?'Submitted':'Not Submitted';
$html.="<tr class='even'><td><B>A certified copy of company's memorandum Association</B></td><td>$checked</td>";
$checked=($ac->service_offered==1)?'Submitted':'Not Submitted';
$html.="<td><B>Service to be offered</B></td><td>$checked</td>";
$html.="</tr>";

$html.="<tr class='odd'>";
$checked=($ac->track_record==1)?'Submitted':'Not Submitted';
$html.="<td><B>Information on track record(refferences)</B></td><td>$checked</td>";
$checked=($ac->costing_structure==1)?'Submitted':'Not Submitted';
$html.="<td><B>Costing structure</B></td><td>$checked</td>";
$html.="</tr>";

$html.="<tr class='even'>";
$checked=($ac->company_profile==1)?'Submitted':'Not Submitted';
$html.="<td><B>Company profile</B></td><td>$checked</td>";
$checked=($ac->service_pricing==1)?'Submitted':'Not Submitted';
$html.="<td><B>Service pricing</B></td><td>$checked</td>";
$html.="</tr>";

$html.="<tr class='odd'>";

$checked=($ac->customer_care==1)?'Submitted':'Not Submitted';
$html.="<td><B>Customer care stratergy(quality services)</B></td><td>$checked</td>";
$checked=($ac->financial_statement==1)?'Submitted':'Not Submitted';
$html.="<td><B>Projected financial statement, cash flow and balance</B></td><td>$checked</td>";
$html.="</tr>";

$html.="<tr  class='even'>";
$checked=($ac->capital_investment==1)?'Submitted':'Not Submitted';
$html.="<td><B>Capital investment Ratio(Equity: Dept)</B></td><td>$checked</td>";
$checked=($ac->financing_plan==1)?'Submitted':'Not Submitted';
$html.="<td><B>Financing plan</B></td><td>$checked</td>";
$html.="</tr>";

$html.="<tr  class='odd'>";
$checked=($ac->certificate_incorporation==1)?'Submitted':'Not Submitted';
$html.="<td><B>Human resource developement strategy</B></td><td>$checked</td>";

$checked=($ac->proof_financial_capability==1)?'Submitted':'Not Submitted';
$html.="<td><B>Proof of Financial Capability</B></td><td>$checked</td>";


$html.="</tr>";

$html.="<tr align='left'><th colspan='4' style=\"background-color:#D7DEEE;\">Declaration</th></tr>";
$html.="<tr align='left' class='even'><th>Name:</th><td>".$la->signatory_name."</td><th>Position:</th><td>".$la->signatory_title."</td></tr>";
$html.="<tr align='left' class='odd'><th>Date</th><td>".$la->sign_date."</td><th>&nbsp;</th><td>&nbsp;</td></tr>";
$html.="<tr align='left'><th colspan='4' style=\"background-color:#D7DEEE;\">Any Other Relevant Information</th></tr>";
$html.="<tr align='left' class='even'><td colspan='4'>".$la->other_info."</td></tr>";

$html.="</table>";
echo $html;
?>

<?php
if (count($la->rollOutPlans)>0) {
$html='Roll Out Plan';
$html.="<table><tr style='background-color:#D7DEEE;'><td>Type of Service</td><td>Status</td><td>Capacity</td><td>Plan/Time Frame</td><td>Area</td></tr>";
$rs=RollOutPlan::model()->findAll('licence_application_id='.$la->id);

$roll_out_plan=array();
foreach ($rs as $r){
	$html.="<tr><td>$r->service_type</td><td>$r->status</td><td>$r->capacity</td><td>$r->time_frame</td><td>$r->area</td></tr>";
}
$html.="</table>";
echo $html;

}
?>