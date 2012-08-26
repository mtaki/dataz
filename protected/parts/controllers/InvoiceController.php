<?php

class InvoiceController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', 
				'users'=>array('@'),
				//'expression'=>'Yii::app()->user->permission',
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Invoice;
        $invoiceDetailManager=new InvoiceDetailManager();
 
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
 		if (isset($_POST['Invoice'])){
 			 $model->attributes=$_POST['Invoice'];
 			 $invoiceDetailManager->manage($_POST['InvoiceDetail']);
 		}
        
        if(isset($_POST['Invoice'],$_POST['create']))
        {
            
            $check=!isset($_POST['noValidate']);
            $valid=$model->validate();
            $valid=$invoiceDetailManager->validate($model) && $valid;
            
            if($valid=true)
            {
            		$model->amount=0;
                    $model->save();
                    $invoiceDetailManager->save($model);
                    foreach($model->invoiceDetails as $invoiceDetail){
                    	$model->amount=$model->amount + $invoiceDetail->amount;
                    }
                    $model->amount_due=$model->amount;
                    $model->amount_paid=0;
                    $model->num='IVTRX-'.$model->id;
                    $model->terms='30DAYS';
                    $model->save();
                    $this->redirect(array('view','id'=>$model->id));
            }
            
        }
 
        $this->render('create',array(
            'model'=>$model,
            'invoiceDetailManager'=>$invoiceDetailManager,
        ));
		
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
        $invoiceDetailManager=new InvoiceDetailManager();
 		
 		
 		if (isset($_POST['Invoice'])){
 			 $model->attributes=$_POST['Invoice'];
 			 $invoiceDetailManager->manage($_POST['InvoiceDetail']);
 		}else{
 			 $invoiceDetailManager=InvoiceDetailManager::load($model);
 		}
        
        if(isset($_POST['Invoice'],$_POST['update']))
        {
            
            $check=!isset($_POST['noValidate']);
            $valid=$model->validate();
            $valid=$invoiceDetailManager->validate($model) && $valid;
            
            if($valid=true)
            {
            		$model->amount=0;
                    $model->save();
                    $invoiceDetailManager->save($model);
                    foreach($model->invoiceDetails as $invoiceDetail){
                    	$model->amount=$model->amount + $invoiceDetail->amount;
                    }
                    $model->amount_due=$model->amount;
                    $model->amount_paid=0;
                    $model->num='IVTRX-'.$model->id;
                    $model->terms='30DAYS';
                    $model->save();
                    $this->redirect(array('view','id'=>$model->id));
            }
            
        }
 
        $this->render('update',array(
            'model'=>$model,
            'invoiceDetailManager'=>$invoiceDetailManager,
        ));
	}
	public function actionEpicor()
	{
		$model=$this->loadModel();

		if(isset($_POST['Invoice']))
		{
			//$model->attributes=$_POST['Invoice'];
			//if($model->save())
			$arData = new ActiveRecordData;
			$connData=$arData->getDbConnection();
			$command=$connData->createCommand('EXEC appdate_sp 0,1');
			$invoice_date=$command->queryScalar();
			$aging_date=$invoice_date;
			$req_date=$invoice_date;
			$ship_date=$invoice_date;
			$apply_date=$invoice_date;
			$due_date=$invoice_date + 30;
			$invoice_number='';
			$control_number=$model->num;
			$total_amount=$model->amount;
			$operator=$model->operator;
			$customer_code=$operator->customer_code;
			$address=$operator->address;
			$town=$operator->town;
			$name=$operator->name;
			$currency=$model->currency->name;
			$command=$connData->createCommand("DELETE FROM TCRAData.dbo.arinpage WHERE trx_ctrl_num = '$control_number'");
			$command->execute();
			
			$sql="INSERT INTO TCRAData.dbo.arinpage VALUES(NULL, '$control_number', 1, '', '', 0, 2031, $apply_date,$due_date, $aging_date, '$customer_code', 'N/A', 'N/A', '', $total_amount)";
			$command=$connData->createCommand($sql);
			$command->execute();
	
			$sql="DELETE FROM TCRAData.dbo.arinpcdt WHERE trx_type = 2031 AND trx_ctrl_num = '$control_number'";
			$command=$connData->createCommand($sql);
			$command->execute();
			$count=0;
			$ids=$model->invoiceDetails;
			foreach ($ids as $invoiceDetail){
				$count++;
				$desc=$invoiceDetail->description;
				$amount=$invoiceDetail->amount;
				$sql="INSERT INTO TCRAData.dbo.arinpcdt VALUES (NULL, '$control_number', '', $count, 2031, '', '', 0, $invoice_date, '$desc', 1, 1, '', $amount, 0, 0, 0, 'EXEMP', '', 0, 0, 0, '', '', 0, 0, '', 1, 0, 0, $amount, 0, '', NULL, '')";
				$command=$connData->createCommand($sql);
				$command->execute();
			}
			$rate=1;
			if($currency != 'TZS'){
				$arControl = new ActiveRecordControl;
				$connControl=$arControl->getDbConnection();
				$sql="EXEC TCRAControl.dbo.mccurate_sp $invoice_date,'$currency','TZS','BUY',0.0000,1";
				$cmd=$connControl->createCommand($sql);
				$rate=$cmd->queryScalar();
			}
			$sql="INSERT INTO TCRAData.dbo.arinpchg (trx_ctrl_num,amt_cost,amt_discount,amt_discount_taken,amt_due,amt_freight,amt_gross,amt_net,amt_paid,amt_profit,amt_rem_rev,amt_rem_tax,
				amt_tax,amt_tax_included,amt_write_off_given,apply_to_num,apply_trx_type,attention_name,attention_phone,batch_code,comment_code,cust_po_num,
				customer_addr1,customer_addr2,customer_addr3,customer_addr4,customer_addr5,customer_addr6,customer_code,date_aging,date_applied,date_doc,
				date_due,date_entered,date_recurring,date_required,date_shipped,dest_zone_code,doc_ctrl_num,doc_desc,edit_list_flag,fin_chg_code,fob_code,
				freight_code,hold_desc,hold_flag,location_code,nat_cur_code,next_serial_id,order_ctrl_num,posted_flag,posting_code,price_code,printed_flag,
				rate_home,rate_oper,rate_type_home,rate_type_oper,recurring_code,recurring_flag,salesperson_code,ship_to_addr1,ship_to_addr2,ship_to_addr3,
				ship_to_addr4,ship_to_addr5,ship_to_addr6,ship_to_code,tax_code,terms_code,territory_code,total_weight,trx_type,user_id,vat_prc,writeoff_code,
				timestamp,process_group_num) VALUES ('$control_number',  0.000000,  0.000000,  0.000000,  $total_amount,  0.000000,  $total_amount,  $total_amount,  0.000000,  0.000000,  0.000000,  0.000000,  0.000000,  0.000000,  0.000000,  '',  0,  '',  '',  '',  '',  '',  '$name',  '$address',  '$town',  'Tanzania',  '',  '',  '$customer_code',  $aging_date,  $apply_date,  $invoice_date, $due_date,  $invoice_date,  0,  $invoice_date,  $invoice_date,  '',  '$invoice_number',  '',  0,  '',  '',  '',  '',  0,  '',  '$currency',  0,  '',  0,  'TRADEDT',  '',  0,  $rate,  $rate,  'BUY',  'BUY',  '',  0,  'N/A',  '',  '',  '',  '',  '',  '',  '',  'EXEMP',  '30DAYS',  'N/A',  0.000000,  2031,  1,  0.000000,  '',  NULL,NULL)";
			$command=$connData->createCommand($sql);
			$command->execute();
			$sql="Begin Tran App_Inptax_Save DELETE TCRAData.dbo.arinptax WHERE trx_ctrl_num = '$control_number' and trx_type = 2031  INSERT TCRAData.dbo.arinptax VALUES ( NULL, '$control_number', 2031, 1, 'EXEMPT', $total_amount, $total_amount, 0.000000, 0.000000 )  Commit Tran App_Inptax_Save";
			$command=$connData->createCommand($sql);
			$command->execute();
			$model->in_epicor='yes';
			$model->save(false);
			
			$email=new Email;
			$email->sender=Yii::app()->params->emailSystem;
			$email->receiver=Yii::app()->params->emailAccounts;
			$email->subject='New Invoice Entry - No.'.$model->num;
			$body="
			<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 TRANSITIONAL//EN\">\n
			<html>\n
			<body>
			<table>
			<tr bgcolor='#E5F1F4'><td>Transaction Control Number</td><td><B>$control_number</B></td></tr>\n
			<tr bgcolor='#F8F8F8'><td>Customer Number</td><td>$customer_code</td></tr>\n
			<tr bgcolor='#E5F1F4'><td>Customer Name</td><td>$name</td></tr>\n
			<tr bgcolor='#F8F8F8'><td>Invoice Apply Date</td><td>$model->day</td></tr>\n
			<tr bgcolor='#D7DEEE'><td>Description</td><td>Amount</td></tr>\n
			";
			$color='#E5F1F4';
			$invoiceDetails=$model->invoiceDetails;
			foreach ($invoiceDetails as $invoiceDetail){
				
				$desc=$invoiceDetail->description;
				$amount=$invoiceDetail->amount;
				$body.="<tr bgcolor='$color'><td>$desc</td><td align='right'>".number_format($amount,2)." $currency</td></tr>\n";
				$color=($color=='#E5F1F4')?'#F8F8F8':'#E5F1F4';
			}
			$body.="<tr bgcolor='#D7DEEE'><td><B>Total</B></td><td align='right'>".number_format($model->amount,2)." $currency</td></tr>\n";
			$body.="
			</table>
			</body>
			</html>
			";
			$email->body=$body;
			$email->status='New';
			$email->save(false);
			
			$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('epicor',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Invoice');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Invoice('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Invoice']))
			$model->attributes=$_GET['Invoice'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionLicencingList()
	{
		$model=new Invoice('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Invoice']))
			$model->attributes=$_GET['Invoice'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionSpectrumList()
	{
		$model=new Invoice('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Invoice']))
			$model->attributes=$_GET['Invoice'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionBroadcastingList()
	{
		$model=new Invoice('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Invoice']))
			$model->attributes=$_GET['Invoice'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionNumberingList()
	{
		$model=new Invoice('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Invoice']))
			$model->attributes=$_GET['Invoice'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=Invoice::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='invoice-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
