<?php

class FrequencyApplicationController extends Controller
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
				'actions'=>array('index','view','viewList'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','new'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','editList','evaluationList','evaluation','approvalList','approval','dispatchList','assignmentList','assignment','assignment1'),
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
	public function actionNew()
	{
		if(!empty($_POST['category']))
		{			
				$this->redirect(array('create','category'=>$_POST['category']));
		}

		$this->render('new');
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new FrequencyApplication;
		$c = new Receipt;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if (isset($_GET['category'])){
			$model->frequency_application_type_id=$_GET['category'];
		}
		if(isset($_POST['FrequencyApplication']))
		{
			$model->attributes=$_POST['FrequencyApplication'];
			$model->status="Received";
			if($model->save()){
                        $log=new Log;
						$log->username=Yii::app()->user->name;
						$log->entity_type='frequency_application';
						$log->entity_id=$model->id;
						$log->time=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
						$log->action='Create';
						$log->day=$model->application_date;
						$log->remarks='';
						$log->status='Received';
						$log->team='';
						$log->stage='';

						if($log->save(false))
                        
                        
                        
                        
                        //receipt and invoice
						$hActiveRecord = new ActiveRecordData;
						$connection=$hActiveRecord->getDbConnection();
						//$number=$c->num;
						//$number='PYTRX0001103';
						$number=$_POST['Receipt']['num'];
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
						$invoice->entity_type='frequency_application';
						$invoice->entity_id=$model->id;
						$invoice->operator_id=$model->operator_id;
						$invoice->day=$date;
						$invoice->currency_id=$currency->id;
					     $invoice->description='Frequency Application Fee';						
						$invoice->type='Frequency Application Fee';
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
						if($c->save(false))
				$this->redirect(array('evaluationList'));
				}
		}

		$this->render('create',array(
			'model'=>$model,'c'=>$c,
		));
	}




        public function actionViewList()
	{
		$model=new FrequencyApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FrequencyApplication']))
			$model->attributes=$_GET['FrequencyApplication'];
		
		$this->render('admin',array(
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

		if(isset($_POST['FrequencyApplication']))
		{
			$model->attributes=$_POST['FrequencyApplication'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
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
		$dataProvider=new CActiveDataProvider('FrequencyApplication');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new FrequencyApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FrequencyApplication']))
			$model->attributes=$_GET['FrequencyApplication'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionEvaluationList()
	{
		$model=new FrequencyApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FrequencyApplication']))
			$model->attributes=$_GET['FrequencyApplication'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionEvaluation()
	{
		$model=$this->loadModel();
		$log=new Log;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FrequencyApplication']) && isset($_POST['select2']))
		{
			$model->attributes=$_POST['FrequencyApplication'];
			$model->status='Evaluated';
			
			$log->attributes=$_POST['Log'];
			$log->username=Yii::app()->user->name;
			$log->entity_type='frequency_application';
			$log->entity_id=$model->id;
			$log->time=$date=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
			$log->action='Evaluate';
			//$log->remarks='';
			$log->status='Evaluated';
			$log->team='';
			$log->stage='';
			$valid=$model->validate() && $log->validate();
			if($valid){
				$model->save(false);
				
				$log->save(false);
				
				for($i=0;$i<count($_POST['select2']);$i++){
					$officer=$_POST['select2'][$i];
					$logTeam=new LogTeam;
					$logTeam->officer_id=$officer;
					$logTeam->log_id=$log->id;
					$logTeam->save(false);
				}
				
				/*$email=new Email;
				$email->sender=Yii::app()->params->emailSystem;
				$email->receiver=Yii::app()->params->emailLegal;
				$email->subject='freqency Application - '.$model->applicant->name;
				$body="
				<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 TRANSITIONAL//EN\">\n
				<html>\n
				<body>
				<table>
				<tr bgcolor='#E5F1F4'><td>ID:</td><td>$model->id</td><td>Applicant</td><td>".$model->applicant->name."</td></tr>\n
				<tr bgcolor='#F8F8F8'><td>Type:</td><td>".$model->licenceCategory->name."</td><td>Status:</td><td>$model->status</td></tr>\n
				<tr bgcolor='#E5F1F4'><td>Done by:</td><td>".Yii::app()->user->name."</td><td>Next Stage:</td><td>Approval</td></tr>\n
				";
				$body.="
				</table>
				</body>
				</html>
				";
				$email->body=$body;
				$email->status='New';
				$email->save(false);*/
				
				$this->redirect(array('evaluationList'));
			}
			
		}
		$this->render('evaluation',array(
			'model'=>$model,'log'=>$log,
		));
	}
	
	public function actionApprovalList()
	{
		$model=new FrequencyApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FrequencyApplication']))
			$model->attributes=$_GET['FrequencyApplication'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionApproval()
	{
		$model=$this->loadModel();
		$log=new Log;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FrequencyApplication']))
		{
			$model->attributes=$_POST['FrequencyApplication'];
			$model->status='Approved';
			
			$log->attributes=$_POST['Log'];
			$log->username=Yii::app()->user->name;
			$log->entity_type='frequency_application';
			$log->entity_id=$model->id;
			$log->time=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
			$log->action='Approval';
			//$log->remarks='';
			$log->status='Approved';
			$log->team='';
			$log->stage='';
			$valid=$model->validate() && $log->validate();
			if($valid){
				$model->save(false);
				
				$log->save(false);
				
				
				$this->redirect(array('approvalList'));
			}
			
			
		}

		$this->render('approval',array(
			'model'=>$model,'log'=>$log,
		));
	}
	public function actionDispatchList()
	{
		$model=new FrequencyApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FrequencyApplication']))
			$model->attributes=$_GET['FrequencyApplication'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionAssignmentList()
	{
		$model=new FrequencyApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FrequencyApplication']))
			$model->attributes=$_GET['FrequencyApplication'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionEditList()
	{
		$model=new FrequencyApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FrequencyApplication']))
			$model->attributes=$_GET['FrequencyApplication'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionAssignment()
	{
		$model=$this->loadModel();
		$log=new Log;
        $frequencyApplicationLink=new FrequencyApplicationLink;
        $frequencyApplicationRadioStation=new FrequencyApplicationRadioStation;
        $frequencyApplicationEquipmentManager = new FrequencyApplicationEquipmentManager();
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FrequencyApplication']) && isset($_POST['select2']))
		{
			$model->attributes=$_POST['FrequencyApplication'];
			$model->status='Assigneed';
			
			$log->attributes=$_POST['Log'];
			$log->username=Yii::app()->user->name;
			$log->entity_type='frequency_application';
			$log->entity_id=$model->id;
			$log->time=$date=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
			$log->action='Assigned';
			//$log->remarks='';
			$log->status='Assigned';
			$log->team='';
			$log->stage='';
			$valid=$model->validate() && $log->validate();
			if($valid){
				$model->save(false);
				
				$log->save(false);
				
				for($i=0;$i<count($_POST['select2']);$i++){
					$officer=$_POST['select2'][$i];
					$logTeam=new LogTeam;
					$logTeam->officer_id=$officer;
					$logTeam->log_id=$log->id;
					$logTeam->save(false);
                    
                    if(isset($_POST['FrequencyApplicationLink'])){
                        $frequencyApplicationLink->attributes=$_POST['FrequencyApplicationLink'];
                        $frequencyApplicationLink->save();
                        }
                    if(isset($_POST['FrequencyApplicationRadioStation'])){
                        $frequencyApplicationRadioStation->attributes=$_POST['FrequencyApplicationRadioStation'];
                        $frequencyApplicationRadioStation->save();
                        }
                   // if(isset($_POST['FrequencyApplication']))
				}
				
				
				$this->redirect(array('assignmentList'));
			}
			
		}
		$this->render('assignment',array(
			'model'=>$model,'log'=>$log,
            'frequencyApplicationLink'=>$frequencyApplicationLink,
            'frequencyApplicationRadioStation'=>$frequencyApplicationRadioStation,
             'frequencyApplicationEquipmentManager'=>$frequencyApplicationEquipmentManager,
		));
	}
	
	
     public function actionAssignment1( ){
        $model=$this->loadModel();
        $log=new Log;
        $frequencyApplicationEquipmentManager = new FrequencyApplicationEquipmentManager();

 		if (isset($_POST['FrequencyApplication'])){
 			 $model->attributes=$_POST['FrequencyApplication'];
 			 $frequencyApplicationEquipmentManager->manage($_POST['FrequencyApplicationEquipment']);
 		}else{
 			 $frequencyApplicationEquipmentManager = FrequencyApplicationEquipmentManager::load($model);
 		}
        if(isset($_POST['FrequencyApplication'],$_POST['update']))
        {
            $valid=$model->validate();
            $valid=$frequencyApplicationEquipmentManager->validate($model) && $valid;
            if($valid=true)
            {
               $model->save();
               $frequencyApplicationEquipmentManager->save($model);

              $this->redirect(array('admin','id'=>$model->id));
            }
        }
        $this->render('assignment1',array(
            'model'=>$model,
            'log'=>$log,
            'frequencyApplicationEquipmentManager'=>$frequencyApplicationEquipmentManager,
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
				$this->_model=FrequencyApplication::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='frequency-application-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
