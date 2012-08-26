<?php
class EpicorCommand extends CConsoleCommand{
	public function run($args){
		echo date("Y-m-d H:i:s - ")."Epicor pull process has started...\n";
	$connection=Yii::app()->db;   
		$arData = new ActiveRecordData;
		$connData=$arData->getDbConnection();
		echo date("Y-m-d H:i:s - ")."Invoice pool process has started...\n";
		$command3=$connection->createCommand("SELECT max(num) FROM invoice where num like 'IVTRX%'");
		$maxInvoiceNumber=$command3->queryScalar();
		$command3=$connection->createCommand("SELECT max(customer_code) FROM operator where customer_code like 'cus%'");
		$maxCustomerNumber=$command3->queryScalar();
		if (empty($maxCustomerNumber))
			$maxCustomerNumber='';
		if (empty($maxInvoiceNumber))
			$maxInvoiceNumber='';
		//pool new customers from epicor
		
		$command=$connData->createCommand("SELECT customer_code, address_name AS name, addr2 AS address, addr3 AS town FROM  arcustok_vw where customer_code > '$maxCustomerNumber' and customer_code like 'cus%'");
		$dataReader=$command->query();
		
		while(($row=$dataReader->read())!==false) {
			$customer_code=$row['customer_code'];
			
			$op=Operator::model()->find("customer_code='$customer_code'");
			if (empty($op)){
				echo "code $customer_code does not exist\n";
				$newOperator=new Operator;
				$newOperator->customer_code=$row['customer_code'];
				$newOperator->address=$row['address'];
				$newOperator->name=$row['name'];
				$newOperator->town=$row['town'];
				$newOperator->save(false);
			}else {
				echo "code $customer_code exists\n";
				continue;
			}
		}
		
		//end of pool new customers from epicor
		
		//pool new invoice from epicor
		
		$command=$connData->createCommand("SELECT     artrx.trx_ctrl_num, artrx.doc_ctrl_num, artrx.doc_desc, artrx.apply_to_num, artrx.order_ctrl_num, artrx.batch_code, artrx.trx_type, artrx.date_entered, 
                      artrx.date_posted, artrx.date_applied, artrx.date_doc, artrx.date_shipped, artrx.date_required, artrx.date_due, artrx.date_aging, artrx.customer_code, 
                      artrx.ship_to_code, artrx.salesperson_code, artrx.territory_code, artrx.comment_code, artrx.fob_code, artrx.freight_code, artrx.terms_code, 
                      artrx.fin_chg_code, artrx.price_code, artrx.dest_zone_code, artrx.posting_code, artrx.recurring_flag, artrx.recurring_code, artrx.tax_code, 
                      artrx.cust_po_num, artrx.void_flag, artrx.paid_flag, artrx.amt_gross, artrx.amt_freight, artrx.amt_tax, artrx.amt_cost, artrx.amt_cost AS Expr1, 
                      artrx.amt_discount, artrx.amt_net, artrx.amt_paid_to_date, artrx.user_id, artrx.gl_trx_id, artrxxtr.rec_set, artrxxtr.addr1, artrxxtr.addr2, artrxxtr.addr3, 
                      artrxxtr.addr4, artrxxtr.addr5, artrxxtr.addr6, artrxxtr.attention_name, artrxxtr.attention_phone, artrxxtr.ship_addr1, artrxxtr.ship_addr2, 
                      artrxxtr.ship_addr3, artrxxtr.ship_addr4, artrxxtr.ship_addr5, artrx.nat_cur_code, artrx.rate_type_home, artrx.rate_type_oper, artrx.rate_home, 
                      artrx.rate_oper, artrxxtr.ship_addr6
FROM         artrx LEFT OUTER JOIN
                      artrxxtr ON artrx.trx_ctrl_num = artrxxtr.trx_ctrl_num AND artrx.trx_type = artrxxtr.trx_type
WHERE     (artrx.trx_type = 2031) AND (artrx.trx_ctrl_num > '$maxInvoiceNumber') AND (artrx.customer_code like 'cus%') AND  (artrx.trx_ctrl_num like 'IVTRX%')
ORDER BY artrx.trx_ctrl_num");
		$dataReader=$command->query();
		$count=0;
		while(($row=$dataReader->read())!==false) {
			$count++;
			$invoice=new Invoice;
			
			$operator=Operator::model()->find("customer_code='".$row['customer_code']."'");
			if (empty($operator)) {
				echo "operator does not exist\n";
				continue;
			}
			$inv=Invoice::model()->find("num='".$row['trx_ctrl_num']."'");
			if (!empty($inv)) { //invoice exists
				echo "invoice exists\n";
				continue;	
			}
			$invoice->num=$row['trx_ctrl_num'];
			$invoice->day=$this->epicor_date($row['date_applied']);
			$invoice->operator_id=$operator->id;
			$invoice->amount=$row['amt_net'];
			$invoice->amount_due=$row['amt_net'];
			$invoice->amount_paid=0;
			$invoice->description=$row['doc_desc'];
			$cur=$row['nat_cur_code'];
			$currency=Currency::model()->find("name='$cur'");
			$invoice->currency_id=$currency->id;
			$invoice->terms=$row['terms_code'];
			$invoice->save(false);
			echo "$invoice->num $invoice->day $invoice->amount cur= $invoice->currency_id $invoice->operator_id: $invoice->description\n";
			$command2=$connData->createCommand("SELECT item_code, line_desc, location_code, bulk_flag, weight, tax_code, gl_rev_acct, qty_ordered, qty_shipped, unit_code, unit_price, discount_amt, discount_prc, amt_cost, disc_prc_flag, date_entered, amt_cost, extended_price, reference_code FROM artrxcdt WHERE trx_type = 2031 AND trx_ctrl_num = '$invoice->num'  ORDER BY sequence_id");
			$dataReader2=$command2->query();
			while(($row2=$dataReader2->read())!==false) {
				$invoiceDetail=new InvoiceDetail;
				$invoiceDetail->invoice_id=$invoice->id;
				$invoiceDetail->amount=$row2['extended_price'];
				$invoiceDetail->description=$row2['line_desc'];
				$invoiceDetail->save(false);
				echo "       $invoiceDetail->amount:  $invoiceDetail->description \n";
			}
		}	
			//payments
			try{
				$arData = new ActiveRecordData;
				$connection=$arData->getDbConnection();
			
				$invoices=Invoice::model()->findAll("in_epicor='Yes' AND amount <> amount_paid");
				foreach ($invoices as $invoice){
					$invId=$invoice->id;
					$amount=$invoice->amount;
					$amountp=$invoice->amount_paid;
					$number=$invoice->num;
					$currency=$invoice->currency_id;
					$sql2="SELECT amt_paid as P,doc_ctrl_num FROM  TCRAData.dbo.artrxage  WHERE (trx_ctrl_num = '$number')";
					$command=$connection->createCommand($sql2);
					$row=$command->queryRow();
					if(!empty($row['P'])){
						$amount_paid=$row['P'];
						$amount_due=$amount - $amount_paid;
						$invoice_number=$row['doc_ctrl_num'];
						
						if($amountp != $amount_paid){
							$invoice->amount_due=$amount_due;
							$invoice->amount_paid=$amount_paid;
							$invoice->save(false);
							$sql3="SELECT trx_ctrl_num,payment_amt,x_date_doc,doc_ctrl_num,nat_cur_code FROM TCRAData.dbo.arcr2_vw WHERE invoice_no='$invoice_number' AND pyt_posted_flag='Yes'";
							$command=$connection->createCommand($sql3);
							$rs_receipts=$command->queryAll();
							foreach ($rs_receipts as $receipt){
								$receipt_number=$receipt['trx_ctrl_num'];
								$receipt_amount=$receipt['payment_amt'];
								$receipt_date=$this->epicor_date($receipt['x_date_doc']);
								$receipt_doc=$receipt['doc_ctrl_num'];
								$cur=$receipt['nat_cur_code'];
								$currency1=Currency::model()->find("name='$cur'");
								$currency2=$currency1->id;
								$recs=Receipt::model()->findAll("NUM='$receipt_number'");
								if ((count($recs) > 0) == false){
									$myReceipt=new Receipt;
									$myReceipt->num=$receipt_number;
									$myReceipt->invoice_id=$invId;
									$myReceipt->amount_paid=$receipt_amount;
									$myReceipt->currency_id=$currency2;
									$myReceipt->date_paid=$receipt_date;
									$myReceipt->document_number=$receipt_doc;
									
									$myReceipt->save(false);
									
								}
							}
							echo date("Y-m-d H:i:s - ")."UPDATED INVOICE with ID=$invId\n";
						}
					}
				}
			}
			catch(Exception $e){
				
			}
			
	}
	function epicor_date($epicor_date){
	$diff=86400 * ($epicor_date-72929);
	$date_number=strtotime('0001-01-01') + $diff; 
	return date('d-m-Y',$date_number);
	}	
}
?>