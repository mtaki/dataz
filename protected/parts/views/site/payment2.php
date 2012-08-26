<script type="text/javascript">
function openReport(URL) {
	aWindow = window.open(URL,
	       'reportWin','width=30,height=30,location=no,resizable=yes,scrollbars=yes,screenX=20,screenY=20,top=20,left=20');
	}
</script>
<?php
$html="<table class=\"detail-view\"><tr  style=\"background-color:#D7DEEE;\"><td>Date</td><td>Proforma Invoice Number</td><td align='right'>Amount</td><td align='right'>Amount Due</td><td align='right'>Amount Paid</td><td>Receipts</td><td>Amount</td></tr>";


$invoices=Invoice::model()->with('operator','currency')->findAll(array('condition'=>"operator_id=$operatorId",'order'=>'t.day desc'));
foreach($invoices as $invoice){
	
		$url=Yii::app()->createUrl('site/printDocs',array('id'=>$invoice->id,'file'=>'invoice.rtf.php'));
		$button1="<input type='button' onclick=\"document.location='$url';\" value='Preview Invoice'/>";
	
	$receiptno='';
	$amounts='';
	$receipts=Receipt::model()->with('currency')->findAll(array('condition'=>'invoice_id='.$invoice->id,'order'=>'t.id desc'));
	foreach($receipts as $receipt){
		if (empty($receiptno)){
			$receiptno=$receipt->num.' '.date('d-m-Y',strtotime($receipt->date_paid));
			$amounts=number_format($receipt->amount_paid,2).' '.$receipt->currency->name;
		}else{
			$receiptno.='<BR/>'.$receipt->num.' '.date('d-m-Y',strtotime($receipt->date_paid));
			$amounts.='<BR/>'.number_format($receipt->amount_paid,2).' '.$receipt->currency->name;
		}
		
	}
	$html.="<tr class='odd'><td>".date('d-m-Y',strtotime($invoice->day))."</td><td>$invoice->num $button1</td><td align='right'>".number_format($invoice->amount,2)." ".$invoice->currency->name."</td><td align='right'>".number_format($invoice->amount_due,2)." ".$invoice->currency->name."</td><td align='right'>".number_format($invoice->amount_paid,2)." ".$invoice->currency->name."</td><td>$receiptno</td><td align='right'>$amounts</td></tr>";
}
$html.="</table>";
echo $html;
?>