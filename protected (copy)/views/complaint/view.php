
<?php
	$id=$model->id;	
	$complaintTypesTable="<table width='100%' border='0' class='detail-view'>
			<tr><td  style=\"background-color:#D7DEEE;\">Nature Of Complaint</td></tr>";
	$count=1;
	$class='odd';
	foreach ($model->complaintTypes as $complaintType){
		$complaintTypesTable.="<tr class='$class'><td>$count. ".$complaintType->name."</td></tr>";
		$class=($class=='odd')?'even':'odd';
		$count++;
	}
	$complaintTypesTable.="</table>";
	
$mainTable="
<table width='100%' border='0' >
  <tr>
    <td width='70%' valign='top'><table width='100%' border='0' class='detail-view'>
      <tr>
        <td colspan='4' style=\"background-color:#D7DEEE;\"><div align='left'>Details</div></td>
        </tr>
      <tr class='odd'>
        <td width='118' >Complainant:</td>
        <td width='172'>".$model->complainant->name."</td>
        <td width='144'>Repondent:</td>
        <td width='192'>".$model->respondent->name."</td>
      </tr>
      <tr  class='even'>
        <td>Description:</td>
        <td>".$model->description."</td>
        <td>Responce:</td>
        <td>".$model->responce."</td>
      </tr>
      <tr  class='odd'>
      	<td>Relief:</td>
        <td>".$model->relief."</td>
        <td>Relief Type:</td>
        <td>".$model->reliefType->name."</td>
        
      </tr>
      
       <tr  class='even'>
      	<td colspan='2'>Verification and Investigation:</td>
        <td colspan='2'>".$model->verification."</td>
        
      </tr>
      <tr>
        <td colspan='4' style=\"background-color:#D7DEEE;\"><div align='left'>Declaration</div></td>
        </tr>
      <tr class='odd'>
        <td>Complainant:</td>
        <td>".$model->verification_comp_signatory."</td>
        <td>Date:</td>
        <td>".$model->verification_comp_date."</td>
      </tr>
      
      <tr class='even'>
        <td>TCRA Officer:</td>
        <td>".$model->verification_tcra_signatory."</td>
        <td>Date:</td>
        <td>".$model->verification_tcra_date."</td>
      </tr>
      
      <tr  class='odd'>
        <td>Respondent:</td>
        <td>".$model->verification_resp_signatory."</td>
        <td>Date:</td>
        <td>".$model->verification_resp_date."</td>
      </tr>

      
    </table></td>
    <td width='30%' valign='top'>
		$complaintTypesTable
	</td>
  </tr>
</table>";

$historyTable="<table width='100%' class='detail-view'><tr><td colspan='4'>COMPLAINT HISTORY</td></tr><tr  style=\"background-color:#D7DEEE;\"><td>DATE</td><td>TYPE OF DECISION</td><td>TEAM</td><td>DECISION/COMMENT</td><td>STAGE</td></tr>";
$logs=Log::model()->findAll("entity_id=$model->id AND entity_type='complaint'");
$class='odd';
foreach ($logs as $log){
	$log_id=$log->id;
	$historyTable.="<tr class='$class'><td>".$log->day."</td><td>".$log->action."</td><td><textarea rows='3' cols='25' readonly name='decision'>".$log->team."</textarea></td><td>".$log->remarks."</td><td>".$log->stage."</td></tr>";
	if ($class=='odd')
		$class='even';
	else 
		$class='odd';
}
//team multiple select box


$historyTable.="</table>";
	
echo $mainTable;
echo $historyTable;


$url=Yii::app()->createUrl('complaint/print',array('id'=>$model->id));
$button1="<input type='button' onclick=\"document.location='$url';\" value='Print Compliant'/>";
echo  $button1;
