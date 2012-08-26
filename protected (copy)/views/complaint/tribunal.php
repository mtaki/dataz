<script language="javascript">
	function addHistory(){
		var a = confirm('Add history?');
		if (a == true){
			document.getElementById('historyAction').value='addHistory';
			document.getElementById('addhistoryform').submit();
		}
		else
			return;
	}
	function resolve(){
		var a = confirm('Resolved ?');
		if (a == true){
			document.getElementById('workflowAction').value='Resolved';
			document.getElementById('workflowform').submit();
		}
		else
			return;
	}
	
</script>
<?php
	$id=$model->id;
	if (!empty($_REQUEST['action']) && $_REQUEST['action']=='addHistory'){
		
		$model->stage='Committee';
		$model->status='Closed';
		$model->save(false);
		//insert log
		
		$log=new Log;
						$log->username=Yii::app()->user->name;
						$log->entity_type='complaint';
						$log->entity_id=$model->id;
						$log->time=date("d-m-Y H:i:s");
						$log->action='';
						$log->day=date('d-m-Y', CDateTimeParser::parse($_POST['day'], Yii::app()->locale->dateFormat));
						$log->remarks=$_REQUEST['decision'];
						$log->status=$model->status;
						$log->team=''; 
						$log->stage='Tribunal';
						$log->save(false);
	}
	

	
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
if ($model->stage == 'Tribunal' && $model->status != 'Closed'){?>
	<table width='100%' border='0'>
		<tr  style="background-color:#D7DEEE;"><td width='70%'>ADD HISTORY</td></tr>
		<tr>
			<td>
				<form method='post' id='addhistoryform' name='addhistoryform'>
				 
				<table class='detail-view'>
						<tr class='odd'>
						<td valign='top'>DATE:</td><td valign='top'>
						<?php 
						$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					        'name'=>'day',
					        
					        'options'=>array(
					                'dateFormat'=>Yii::app()->params->datePickerFormat,
					                'showAnim'=>'slideDown',
					                'showButtonPanel'=>'true',
					                'constrainInput'=>'false',
					                ))
					        );?>
						</td>
						</tr>
						
						<tr class='odd'>
						<td valign='top'>DECISION/COMMENT:</td><td><textarea rows='3' cols='25' name='decision'></textarea></td>
						</tr>
						
						
						<tr class='odd'>
						<td valign='top'>&nbsp;</td><td><input type='button' value='Add History' onclick='addHistory()'/></td>
						</tr>				
				</table>
					<input type='hidden' name='action' value='' id='historyAction'/>
					<input type='hidden' name='entityid' value='$id'/>
				</form>
			</td>
			
		</tr>
	</table>	
<?php }?>
