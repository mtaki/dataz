<?php

class NumberingApplicationController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', 
			
				'users'=>array('@'),
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
		$model=new NumberingApplication;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['NumberingApplication']))
		{
			$model->attributes=$_POST['NumberingApplication'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
public function loadModelOperator()
	{
			$operator=null;
			if(isset($_GET['id']))
				$operator=Operator::model()->findbyPk($_GET['id']);
				
			if($operator===null)
				throw new CHttpException(404,'The requested page does not exist.');
			return $operator;
		
	}
	public function actionLicenceeView()
	{
		$this->render('licenceeView',array(
			'model'=>$this->loadModelOperator(),
		));
	}
	public function actionLicenceeList()
	{
		$model=new Operator('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Operator']))
			$model->attributes=$_GET['Operator'];

		$this->render('licenceeList',array(
			'model'=>$model
		));
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['NumberingApplication']))
		{
			$model->attributes=$_POST['NumberingApplication'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionEdit()
	{
		$model=$this->loadModel();


		if(isset($_POST['NumberingApplication']))
		{
			$model->attributes=$_POST['NumberingApplication'];
			if($model->save()){
			$nrs=NumberingResource::model()->findAll("application_id=$model->id");
			foreach ($nrs as $nr)
				$nr->delete();
			for($i=1;$i<=5;$i++){ 
							if (!empty($_POST['number'.$i])){
							$number=$_POST['number'.$i];
							//$db->Execute("INSERT INTO NUMBERING_RESOURCE VALUES('', '$number', $values[1], $values[15], 'Pending', $values[16],$newid,'Application')");
							$resource=new NumberingResource;
							$resource->application_id=$model->id;
							$resource->num=$number;
							$resource->numbering_fee_type_id=$model->numbering_fee_type_id;
							$resource->numbering_resource_type_id=$model->numbering_resource_type_id;
							$resource->operator_id=$model->operator_id;
							$resource->request_type='Application';
							$resource->status='Pending';
							$resource->save(false);
							}
						}
				$this->redirect(array('editList'));
			}
		}

		$this->render('edit',array(
			'a'=>$model,
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
		$dataProvider=new CActiveDataProvider('NumberingApplication');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new NumberingApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['NumberingApplication']))
			$model->attributes=$_GET['NumberingApplication'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionViewList()
	{
		$model=new NumberingApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['NumberingApplication']))
			$model->attributes=$_GET['NumberingApplication'];
		
		$this->render('admin',array(
			'model'=>$model
		));
	}
	public function actionEditList()
	{
		$model=new NumberingApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['NumberingApplication']))
			$model->attributes=$_GET['NumberingApplication'];
		$this->render('admin',array(
			'model'=>$model
		));
	}
	public function actionEvaluationList()
	{
		$model=new NumberingApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['NumberingApplication']))
			$model->attributes=$_GET['NumberingApplication'];
		
		$this->render('admin',array(
			'model'=>$model
		));
	}
	public function actionApprovalList()
	{
		$model=new NumberingApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['NumberingApplication']))
			$model->attributes=$_GET['NumberingApplication'];
		$this->render('admin',array(
			'model'=>$model
		));
	}	
	public function actionPrintList()
	{
		$model=new NumberingApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['NumberingApplication']))
			$model->attributes=$_GET['NumberingApplication'];
		$this->render('admin',array(
			'model'=>$model
		));
	}
	public function actionPrepareList()
	{
		$model=new NumberingApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['NumberingApplication']))
			$model->attributes=$_GET['NumberingApplication'];
	
		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionDispatchList()
	{
		$model=new NumberingApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['NumberingApplication']))
			$model->attributes=$_GET['NumberingApplication'];
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
				$this->_model=NumberingApplication::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='numbering-application-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionNew()
	{
		
		$model=new NumberingApplication;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(!empty($_POST['type']))
		{
			$this->redirect(array('newApplication','type'=>$_POST['type']));
		}

		$this->render('new',array(
			'model'=>$model,
		));
	}
	public function actionNewApplication()
	{
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$a=new NumberingApplication;
		$c=new Receipt;
    	if(isset($_POST['NumberingApplication']))
    	{
		     
		     $a->attributes=$_POST['NumberingApplication'];
	 		  $c->attributes=$_POST['Receipt'];
		    
		     $valid=$a->validate() &&  $c->validate();
	 
		     if($valid)
		     {
					if(isset($_POST['insert'])){
				      // use false parameter to disable validation
						
						$a->status='Received';
				      	$a->save(false);

						//insert log
						$log=new Log;
						$log->username=Yii::app()->user->name;
						$log->entity_type='numbering_application';
						$log->entity_id=$a->id;
						$log->time=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
						$log->action='Create';
						$log->day=$a->application_date;
						$log->remarks='';
						$log->status='Received';
						$log->team='';
						$log->stage='';

						$log->save(false);
											
						//receipt and invoice
						$hActiveRecord = new ActiveRecordData;
						$connection=$hActiveRecord->getDbConnection();
						$number=$c->num;
						$command=$connection->createCommand("SELECT trx_ctrl_num,payment_amt,x_date_doc,doc_ctrl_num,nat_cur_code FROM TCRAData.dbo.arcr2_vw WHERE trx_ctrl_num='$number' AND pyt_posted_flag='Yes'");
						$ms=$command->queryAll();
						$row=$ms[0];
						$c->amount_paid=$row['payment_amt'];
						$epicor_date=$row['x_date_doc'];
						$diff=86400 * ($epicor_date-72929);
						$date_number=strtotime('0001-01-01') + $diff; 
						$date=Yii::app()->dateFormatter->formatDateTime($date_number,'medium',null);
						$cur=$row['nat_cur_code'];
						$currency=Currency::model()->find('name=?',array($cur));
				      
						//invoice
						$invoice=new Invoice;
						$invoice->entity_type='numbering_application';
						$invoice->entity_id=$a->id;
						$invoice->operator_id=$a->operator_id;
						$invoice->day=$date;
						$invoice->currency_id=$currency->id;
						$invoice->description='Numbering Application Fee';						
						$invoice->type='Numbering Application Fee';
						$invoice->in_epicor='yes';
						$invoice->amount=$c->amount_paid;
						$invoice->amount_paid=$c->amount_paid;
						$invoice->amount_due=0;
						$invoice->terms='30DAYS';
						$invoice->save(false);
						$invoice->num='IVTRX-'.$invoice->id;
						$invoice->save(false);
						
						//invoice detail
						$invoiceDetail=new InvoiceDetail;
						$invoiceDetail->amount=$c->amount_paid;
						$invoiceDetail->description=$invoice->description;
						$invoiceDetail->invoice_id=$invoice->id;
						$invoiceDetail->save(false);

						//receipt 
						//num is set
						$c->date_paid=$date;
						$c->invoice_id=$invoice->id;
						$c->amount_paid=$c->amount_paid;
						$c->document_number=$row['doc_ctrl_num'];
						$c->currency_id=$currency->id;
						$c->save(false);
						// ...redirect to another page
						for($i=1;$i<=5;$i++){ 
							if (!empty($_POST['number'.$i])){
							$number=$_POST['number'.$i];
							//$db->Execute("INSERT INTO NUMBERING_RESOURCE VALUES('', '$number', $values[1], $values[15], 'Pending', $values[16],$newid,'Application')");
							$resource=new NumberingResource;
							$resource->application_id=$a->id;
							$resource->num=$number;
							$resource->numbering_fee_type_id=$a->numbering_fee_type_id;
							$resource->numbering_resource_type_id=$a->numbering_resource_type_id;
							$resource->operator_id=$a->operator_id;
							$resource->request_type='Application';
							$resource->status='Pending';
							$resource->save(false);
							}
						}
						$this->redirect(array('evaluationList'));
					}
		     }
    	}else	{
			$a->numbering_resource_type_id=$_GET['type'];
		}
 
    	$this->render('newApplication', array(
        'a'=>$a,
		 'c'=>$c,
    	));

	}
	public function actionEvaluation()
	{
		$model=$this->loadModel();
		$log=new Log;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['NumberingApplication']))
		{
			$model->attributes=$_POST['NumberingApplication'];
			$model->status='Evaluated';
			
			$log->attributes=$_POST['Log'];
			$log->username=Yii::app()->user->name;
			$log->entity_type='numbering_application';
			$log->entity_id=$model->id;
			$log->time=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
			$log->action='Evaluate';
			//$log->remarks='';
			$log->status='Evaluated';
			$log->team='';
			$log->stage='';
			$valid=$model->validate() && $log->validate();
			if($valid){
				$model->save(false);
				
				$log->save(false);
				
				
				$this->redirect(array('evaluationList'));
			}
			
			
		}

		$this->render('evaluation',array(
			'model'=>$model,'log'=>$log,
		));
	}
public function actionApproval()
	{
		$model=$this->loadModel();
		$log=new Log;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['NumberingApplication']))
		{
			$model->attributes=$_POST['NumberingApplication'];
			$model->status='Approved';
			
			$log->attributes=$_POST['Log'];
			$log->username=Yii::app()->user->name;
			$log->entity_type='numbering_application';
			$log->entity_id=$model->id;
			$log->time=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
			$log->action='Approve';
			
			$mdate=$log->day;
			$mdate=date('Y-m-d',strtotime($mdate));
			//$log->remarks='';
			$log->status=$model->status;
			$log->team='';
			$log->stage='';
			$valid=$model->validate() && $log->validate();
			if($valid){
				$model->save(false);
				
				$log->save(false);
				NumberingResource::model()->updateAll(array('status'=>'Rejected','request_type'=>'Application','assignment_date'=>$mdate), "application_id=".$model->id);
				for($i=1; $i<=5; $i++){
					
					if (!empty($_POST['number'.$i])){
						$number=$_POST['number'.$i];
						//$sql = "SELECT * FROM NUMBERING_RESOURCE WHERE APPLICATION_ID=$refid AND NUM='$number'";
						$rs1=NumberingResource::model()->findAll("application_id=$model->id AND num='$number'");
						
						$num=count($rs1);
						if($num>0){
							NumberingResource::model()->updateAll(array('status'=>'In use'), "application_id=$model->id AND num='$number'");
					
						}else{
							$nr=new NumberingResource;
							$nr->num=$number;
							$nr->operator_id=$model->operator_id;
							$nr->status='In use';
							$nr->numbering_fee_type_id=$model->numbering_fee_type_id;
							$nr->numbering_resource_type_id=$model->numbering_resource_type_id;
							$nr->application_id=$model->id;
							$nr->request_type='Assignment';
							
							$nr->save(false);
						}
					}
				}
				NumberingResource::model()->updateAll(array('assignment_date'=>$mdate), "application_id=".$model->id);
				$rs3=NumberingResource::model()->findAll("application_id=$model->id AND status='In use'");
				$number_count=count($rs3);
				$fee=NumberingFee::model()->find("numbering_fee_type_id=$model->numbering_fee_type_id");
				$amount=$fee->registration_fee;
				$currency=$fee->registration_fee_currency_id;
				$amount=$amount * $number_count;
				
				$invoice=new Invoice;
						$invoice->entity_type='numbering_application';
						$invoice->entity_id=$model->id;
						$invoice->operator_id=$model->operator_id;
						$invoice->day=Yii::app()->dateFormatter->formatDateTime(time(),'medium',null);
						$invoice->currency_id=$currency;
						$invoice->description='Numbering Registration Fee';						
						$invoice->type='Numbering Registrion Fee';
						$invoice->in_epicor='no';
						$invoice->amount=$amount;
						$invoice->amount_paid=0;
						$invoice->amount_due=$amount;
						$invoice->terms='30DAYS';
						$invoice->email_sent='no';
						$invoice->save(false);
						$invoice->num='IVTRX-'.$invoice->id;
						$invoice->save(false);
						
						//invoice detail
						$invoiceDetail=new InvoiceDetail;
						$invoiceDetail->amount=$amount;
						$invoiceDetail->description="Numbering Registration Fee - ".$model->numberingResourceType->name;
						$invoiceDetail->invoice_id=$invoice->id;
						$invoiceDetail->save(false);
				$this->redirect(array('approvalList'));
			}
			
		}

		$this->render('approval',array(
			'model'=>$model,'log'=>$log,
		));
	}
	public function actionPrepare()
	{
		$model=$this->loadModel();
		$log=new Log;
		if(isset($_POST['NumberingApplication']))
		{
			$model->attributes=$_POST['NumberingApplication'];
			$model->status='Prepared';
			
			$log->attributes=$_POST['Log'];
			$log->username=Yii::app()->user->name;
			$log->entity_type='numbering_application';
			$log->entity_id=$model->id;
			
			$log->time=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
			$log->action='Prepare';
			$log->day=$model->issue_date;
			//$log->remarks='';
			$log->status='Prepared';
			$log->team='';
			$log->stage='';
			$valid=$model->validate() && $log->validate();
			if($valid){
				$model->save(false);
				
				$log->save(false);
			}
			
		}
		$this->render('prepare',array(
			'model'=>$model,'log'=>$log,
		));
	}
	public function actionDispatch()
	{
		$model=$this->loadModel();
		$log=new Log;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['NumberingApplication']))
		{
			$model->attributes=$_POST['NumberingApplication'];
			$model->status='Dispatched';
			
			$log->attributes=$_POST['Log'];
			$log->username=Yii::app()->user->name;
			$log->entity_type='numbering_application';
			$log->entity_id=$model->id;
			$log->time=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
			$log->action='Dispatch';
			
			//$log->remarks='';
			$log->status='Dispatched';
			$log->team='';
			$log->stage='';
			$valid=$model->validate() && $log->validate();
			if($valid){
				$model->save(false);
				
				$log->save(false);
			
				$this->redirect(array('dispatchList'));
			}
			
		}

		$this->render('dispatch',array(
			'model'=>$model,'log'=>$log,
		));
	}
	public function actionGenerateFee()
	{
		$model=$this->loadModelOperator();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Operator']))
		{
			
			$las=NumberingResource::model()->findAll("operator_id=".$model->id." and  t.status = 'In Use'");
			if(count($las) > 0){
				$numberingResourceTypes=NumberingResourceType::model()->findAll();
				//invoice amount=0
				$invoice=new Invoice;
						$invoice->entity_type='operator';
						$invoice->entity_id=$model->id;
						$invoice->operator_id=$model->id;
						$invoice->day=Yii::app()->dateFormatter->formatDateTime(time(),'medium',null);
						$invoice->currency_id=2;
						$invoice->description='Numbering Resource Annual Maintenance Fee';						
						$invoice->type='Numbering Annual Fee';
						$invoice->in_epicor='no';
						$invoice->amount=0;
						$invoice->amount_paid=0;
						$invoice->amount_due=0;
						$invoice->terms='30DAYS';
						$invoice->email_sent='no';
						$invoice->save(false);
						$invoice->num='IVTRX-'.$invoice->id;
						$invoice->save(false);
						
						
						
				$total=0;
				foreach ($numberingResourceTypes as $numberingResourceType){
					$amount=0;
					$type=$numberingResourceType->name;
					$typeid=$numberingResourceType->id;
					$nrs=NumberingResource::model()->findAll("operator_id=".$model->id." and  t.status = 'In Use' and numbering_resource_type_id=".$typeid);
					$numbers='';
					foreach ($nrs as $nr){
						$amount=$amount + $nr->getFee();
						$total=$total + $nr->getFee();
						if ($numbers==''){
							$numbers.='('.$nr->num;
						}
						else {
							$numbers.=','.$nr->num;
						}
					}
					$numbers.=')';
					if ($amount > 0){
						$invoiceDetail=new InvoiceDetail;
						$invoiceDetail->amount=$amount;
						$invoiceDetail->description=$type.' '.$numbers;
						$invoiceDetail->invoice_id=$invoice->id;
						$invoiceDetail->save(false);
					}
					//invoice detail
				}
				//update invoice ammount=total;
				$invoice->amount=$total;
				$invoice->amount_due=$total;
				$invoice->save(false);
			}
			$this->redirect(array('licenceeView','id'=>$model->id));
		}

		$this->render('generateFee',array(
			'model'=>$model,
		));
	}
}
