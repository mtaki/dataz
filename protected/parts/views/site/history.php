<?php
$html="<table class=\"detail-view\" ><tr  style=\"background-color:#D7DEEE;\"><td>Data Entry Time</td><td>Date</td><td>Officer</td><td>Team</td><td>Action</td><td>Comments</td><td>Status</td></tr>";
$condition="entity_type='$entityType' and entity_id=$entityId";
$logs=Log::model()->findAll(array('condition'=>$condition,'order'=>'t.id'));
foreach ($logs as $log){
	$team='';
	$logTeams=LogTeam::model()->with('officer')->findAll(array('condition'=>'log_id='.$log->id));
	foreach ($logTeams as $logTeam){
		$team.=$logTeam->officer->name.'<BR/>';
	}
	if (empty($team))
		$team=$log->team;
	$html.="<tr class='odd'><td>".$log->time."</td><td>".$log->day."</td><td>".$log->username."</td><td>$team</td><td>$log->action</td><td>$log->remarks</td><td>$log->status</td></tr>";	
}
$html.="</table>";
echo $html;
?>