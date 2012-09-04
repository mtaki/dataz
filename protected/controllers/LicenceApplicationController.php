<?php

class LicenceApplicationController extends Controller
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
				'actions'=>array('marketSegmentFilter','marketSegmentFilter2','categoryFilter','officerFilter','decisionFilter','subCategoryFilter'),
				'users'=>array('@'),
			),
			
			/*array('allow', 
				'users'=>array('@'),
				//'expression'=>'Yii::app()->user->permission',
			),*/
			array('allow', 
				'users'=>array('@'),
				'actions'=>array('approvalList','approval'),
				'expression'=>'Yii::app()->user->getPermission("licenceApplicationApproval")',
			),
			array('allow', 
				'users'=>array('@'),
				'actions'=>array('editList','edit','editCommunication','editContent','editCourier','editInstallation','editImportation','editVsat'),
				'expression'=>'Yii::app()->user->getPermission("licenceApplicationEdit")',
			),
			array('allow', 
				'users'=>array('@'),
				'actions'=>array('evaluationList','evaluation','businessPlan','checkResources'),
				'expression'=>'Yii::app()->user->getPermission("licenceApplicationEvaluation")',
			),
			array('allow', 
				'users'=>array('@'),
				'actions'=>array('printList','print'),
				'expression'=>'Yii::app()->user->getPermission("licenceApplicationPrint")',
			),
			array('allow', 
				'users'=>array('@'),
				'actions'=>array('prepareList','prepare'),
				'expression'=>'Yii::app()->user->getPermission("licenceApplicationPrepare")',
			),
			array('allow', 
				'users'=>array('@'),
				'actions'=>array('issueList','issue'),
				'expression'=>'Yii::app()->user->getPermission("licenceApplicationIssue")',
			),
			array('allow', 
				'users'=>array('@'),
				'actions'=>array('viewList','view'),
				'expression'=>'Yii::app()->user->getPermission("licenceApplicationView")',
			),
			array('allow', 
				'users'=>array('@'),
				'actions'=>array('licenceList','licenceeList','licenceView','licenceeView'),
				'expression'=>'Yii::app()->user->getPermission("licenceView")',
			),
			array('allow', 
				'users'=>array('@'),
				'actions'=>array('cancelView','cancelList'),
				'expression'=>'Yii::app()->user->getPermission("licenceCancel")',
			),
			array('allow', 
				'users'=>array('@'),
				'actions'=>array('admin','renewList','renewView','annualFeeList','annualFeeView'),
			),
			array('allow', 
				'users'=>array('@'),
				'actions'=>array('new','newCommunication','newContent','newCourier','newInstallation','newImportation','newDistribution','editDistribution','newSelling','editSelling','newVsat','editVsat'),
				'expression'=>'Yii::app()->user->getPermission("licenceApplicationNew")',
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
	public function actionLicenceView()
	{
		$this->render('licence/licenceView',array(
			'model'=>$this->loadModel(),
		));
	}
	public function actionAnnualFeeView()
	{
		$this->render('licence/annualFeeView',array(
			'model'=>$this->loadModel(),
            
		));
	}
	public function actionCancelView()
	{
		$model=$this->loadModel();
		$log=new Log();
		
		if (isset($_POST['Log'])){
			$model->status='Cancelled';
			$log->attributes=$_POST['Log'];
			$log->username=Yii::app()->user->name;
			$log->entity_type='licence_application';
			$log->entity_id=$model->id;
			$log->time=$date=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
			$log->action='Cancel';
			$log->status='Cancelled';
			$log->team='';
			$log->stage='';
			$valid=$model->validate() && $log->validate();
			if ($valid){
				$model->save(false);
				$log->save(false);
				
				$this->redirect(array('licenceView','id'=>$model->id));
			}
			
		}
		$this->render('licence/cancel',array(
			'model'=>$model,'log'=>$log,
		));
	}
	public function actionRenewView()
	{
		$model=$this->loadModel();
		$log=new Log;
		$log2=new Log;
		$newLicence=new LicenceApplication;
		if (isset($_POST['Log'],$_POST['LicenceApplication'])){
			//$newLicence->attributes=$model->getAttributes();
			$newLicence->attributes=$_POST['LicenceApplication'];
			$newLicence->is_licence=1;
			$newLicence->operator_id=$model->operator_id;
			$newLicence->num=$model->num;
			$newLicence->licence_category_id=$model->licence_category_id;
			$newLicence->market_segment_id=$model->market_segment_id;
			$newLicence->market_segment_id_2=$model->market_segment_id_2;
			$newLicence->status='Active';
			$newLicence->operator_id=$model->operator_id;
			$newLicence->duration=$model->duration;
			$newLicence->licence_sub_category_id=$model->licence_sub_category_id;
			$newLicence->business_category=$model->business_category;
			$newLicence->application_date=null;
			$log->attributes=$_POST['Log'];
			$log->day=$newLicence->issue_date;
			$log->username=Yii::app()->user->name;
			$log->entity_type='licence_application';
			$log->entity_id=$model->id;
			$log->time=$date=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
			$log->action='Renew';
			$log->status='Renewed';
			$log->team='';
			$log->stage='';
			
			$log2->attributes=$_POST['Log'];
			$log2->day=$newLicence->issue_date;
			$log2->username=Yii::app()->user->name;
			$log2->entity_type='licence_application';
			
			$log2->time=$date=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
			$log2->action='Renew';
			$log2->status='Active';
			$log2->team='';
			$log2->stage='';
			$valid=$newLicence->validate() && $log->validate();
			if ($valid){
				$model->status='Renewed';
				$model->save();
				$newLicence->save();
				$log->save();
				$log2->entity_id=$newLicence->id;
				$log2->save();
				$this->redirect(array('licenceView','id'=>$newLicence->id));
			}
			
		}
		$this->render('licence/renew',array(
			'model'=>$model,'log'=>$log,'newLicence'=>$newLicence,
		));
	}
	public function actionLicenceeView()
	{
		$this->render('licence/licenceeView',array(
			'model'=>$this->loadModelOperator(),
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
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('LicenceApplication');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new LicenceApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LicenceApplication']))
			$model->attributes=$_GET['LicenceApplication'];

		$this->render('admin',array(
			'model'=>$model
		));
	}
	public function actionLicenceList()
	{
		$model=new LicenceApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LicenceApplication']))
			$model->attributes=$_GET['LicenceApplication'];

		$this->render('licence/licenceList',array(
			'model'=>$model
		));
	}
	public function actionAnnualFeeList()
	{
		$model=new LicenceApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LicenceApplication']))
			$model->attributes=$_GET['LicenceApplication'];

		$this->render('licence/licenceList',array(
			'model'=>$model
		));
	}
	public function actionCancelList()
	{
		$model=new LicenceApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LicenceApplication']))
			$model->attributes=$_GET['LicenceApplication'];

		$this->render('licence/licenceList',array(
			'model'=>$model
		));
	}
	public function actionRenewList()
	{
		$model=new LicenceApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LicenceApplication']))
			$model->attributes=$_GET['LicenceApplication'];

		$this->render('licence/licenceList',array(
			'model'=>$model
		));
	}
	public function actionLicenceeList()
	{
		$model=new Operator('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Operator']))
			$model->attributes=$_GET['Operator'];

		$this->render('licence/licenceeList',array(
			'model'=>$model
		));
	}
	public function actionViewList()
	{
		$model=new LicenceApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LicenceApplication']))
			$model->attributes=$_GET['LicenceApplication'];
		
		$this->render('admin',array(
			'model'=>$model
		));
	}
	public function actionEditList()
	{
		$model=new LicenceApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LicenceApplication']))
			$model->attributes=$_GET['LicenceApplication'];
		$this->render('admin',array(
			'model'=>$model
		));
	}
	public function actionEvaluationList()
	{
		$model=new LicenceApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LicenceApplication']))
			$model->attributes=$_GET['LicenceApplication'];
		
		$this->render('admin',array(
			'model'=>$model
		));
	}
	public function actionApprovalList()
	{
		$model=new LicenceApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LicenceApplication']))
			$model->attributes=$_GET['LicenceApplication'];
		$model->status='Evaluated';
		$this->render('admin',array(
			'model'=>$model
		));
	}	
	public function actionPrintList()
	{
		$model=new LicenceApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LicenceApplication']))
			$model->attributes=$_GET['LicenceApplication'];
		$this->render('admin',array(
			'model'=>$model,'status'=>'Approved','paymentCheck'=>false
		));
	}
	public function actionPrepareList()
	{
		$model=new LicenceApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LicenceApplication']))
			$model->attributes=$_GET['LicenceApplication'];
	
		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionIssueList()
	{
		$model=new LicenceApplication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LicenceApplication']))
			$model->attributes=$_GET['LicenceApplication'];
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
				$this->_model=LicenceApplication::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
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
	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='licence-application-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionNew()
	{
		
		$model=new LicenceApplication;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(!empty($_POST['category']))
		{
			if ($_POST['category'] >=1 && $_POST['category'] <=3)			
				$this->redirect(array('newCommunication','category'=>$_POST['category']));
			if ($_POST['category'] ==4)			
				$this->redirect(array('newContent','category'=>$_POST['category']));
			if ($_POST['category'] >=5 && $_POST['category'] <=10)			
				$this->redirect(array('newCourier','category'=>$_POST['category']));
			if ($_POST['category'] ==12)			
				$this->redirect(array('newInstallation','category'=>$_POST['category']));
			if ($_POST['category'] ==15)			
				$this->redirect(array('newSelling','category'=>$_POST['category']));
			if ($_POST['category'] ==13)			
				$this->redirect(array('newImportation','category'=>$_POST['category']));
			if ($_POST['category'] ==14)			
				$this->redirect(array('newDistribution','category'=>$_POST['category']));
			if ($_POST['category'] ==16)			
				$this->redirect(array('newVsat','category'=>$_POST['category']));
		}

		$this->render('new',array(
			'model'=>$model,
		));
	}
	public function actionNewCommunication()
	{
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$a=new LicenceApplication;
    	$b=new ApplicationCommunication;
		$c=new Receipt;
		if(isset($_POST['save'])){
			$a->attributes=$_POST['LicenceApplication'];
		    $b->attributes=$_POST['ApplicationCommunication'];
	 		$c->attributes=$_POST['Receipt'];
		 		try{
					$file = fopen('/temp/'.Yii::app()->user->name.'.txt', 'w');
					$values=array('a'=>$a,'b'=>$b,'c'=>$c);
					fwrite($file, serialize($values));
					fclose($file);
				}catch(Exception $e){}
	 	}elseif(isset($_POST['retrieve'])){
		 	$fileread = '/temp/'.Yii::app()->user->name.'.txt';
			try{
				$values = unserialize(file_get_contents($fileread));
				$a=$values['a'];
				$b=$values['b'];
				$c=$values['c'];
			}catch(Exception $e){}  	
	 	}
    	elseif(isset($_POST['LicenceApplication'], $_POST['ApplicationCommunication']))
    	{
		     
		     $a->attributes=$_POST['LicenceApplication'];
		     $b->attributes=$_POST['ApplicationCommunication'];
	 		  $c->attributes=$_POST['Receipt'];
	 		  
		     $valid=$a->validate() && $b->validate() && $c->validate();
	 
		     if($valid)
		     {
					if(isset($_POST['insert'])){
				      // use false parameter to disable validation
						
						$a->status='Received';
				      	$a->save(false);
						$b->id=$a->id;
						
						$b->estimated_cost=str_replace(',','',$b->estimated_cost);
				      	

						//insert log
						$log=new Log;
						$log->username=Yii::app()->user->name;
						$log->entity_type='licence_application';
						$log->entity_id=$a->id;
						$log->time=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
						$log->action='Create';
						$log->day=$a->application_date;
						$log->remarks='';
						$log->status='Received';
						$log->team='';
						$log->stage='';
						
						
						$b->save(false);
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
						$invoice->entity_type='licence_application';
						$invoice->entity_id=$a->id;
						$invoice->operator_id=$a->operator_id;
						$invoice->day=$date;
						$invoice->currency_id=$currency->id;
						$invoice->description='Licence Application Fee';						
						$invoice->type='Licence Application Fee';
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
						
						$email=new Email;
						$email->sender=Yii::app()->params->emailSystem;
						$email->receiver=Yii::app()->params->emailLegal;
						$email->subject='Licence Application - '.$a->applicant->name;
						$body="
						<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 TRANSITIONAL//EN\">\n
						<html>\n
						<body>
						<table>
						<tr bgcolor='#E5F1F4'><td>ID:</td><td>$a->id</td><td>Applicant</td><td>".$a->applicant->name."</td></tr>\n
						<tr bgcolor='#F8F8F8'><td>Type:</td><td>".$a->licenceCategory->name."</td><td>Status:</td><td>$a->status</td></tr>\n
						<tr bgcolor='#E5F1F4'><td>Done by:</td><td>".Yii::app()->user->name."</td><td>Next Stage:</td><td>Evaluation</td></tr>\n
						";
						$body.="
						</table>
						</body>
						</html>
						";
						$email->body=$body;
						$email->status='New';
						$email->save(false);
						$this->redirect(array('viewList'));
					}
		     }
    	}else	{
			if (isset($_GET['category']))
				$a->licence_category_id=$_GET['category'];
		}
 
    	$this->render('applicationCommunication/newCommunication', array(
        'a'=>$a,
        'b'=>$b,
		 'c'=>$c,
    	));

	}
	public function actionEditCommunication()
	{
		$a=$this->loadModel();
    	$b=ApplicationCommunication::model()->findByPk($a->id);
		
    	if(isset($_POST['LicenceApplication'], $_POST['ApplicationCommunication']))
    	{
		     
		     $a->attributes=$_POST['LicenceApplication'];
		     $b->attributes=$_POST['ApplicationCommunication'];
             $a->status='Application Edited';
		    
		     $valid=$a->validate() && $b->validate();
	 
		     if($valid)
		     {
					if(isset($_POST['save'])){
				      
				      $a->save(false);
				      $b->estimated_cost=str_replace(',','',$b->estimated_cost);
				      $b->save(false);

						//insert log
						$log=new Log;
						$log->username=Yii::app()->user->name;
						$log->entity_type='licence_application';
						$log->entity_id=$a->id;
						$log->time=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
						$log->action='edit';
						$log->day=Yii::app()->dateFormatter->formatDateTime(time(),'medium',null);
						
						$log->remarks='Editting';
						$log->status=$a->status;
						$log->team='';
						$log->stage='';

						$log->save(false);
											
						$this->redirect(array('editList'));
					}
		     }
    	}
 
    	$this->render('applicationCommunication/editCommunication', array(
        'a'=>$a,
        'b'=>$b,
    	));

	}
	public function actionEditInstallation()
	{
		$a=$this->loadModel();
    	$b=ApplicationInstallation::model()->findByPk($a->id);
		
    	if(isset($_POST['LicenceApplication'], $_POST['ApplicationInstallation']))
    	{
		     
		     $a->attributes=$_POST['LicenceApplication'];
		     $b->attributes=$_POST['ApplicationInstallation'];
		    
		     $valid=$a->validate() && $b->validate();
	 
		     if($valid)
		     {
					if(isset($_POST['save'])){
				      
				      $a->save(false);
				      $b->save(false);

						//insert log
						$log=new Log;
						
						$log->username=Yii::app()->user->name;
						$log->entity_type='licence_application';
						$log->entity_id=$a->id;
						$log->time=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
						$log->action='edit';
						$log->day=Yii::app()->dateFormatter->formatDateTime(time(),'medium',null);
						$log->remarks='';
						$log->status=$a->status;
						$log->team='';
						$log->stage='';

						$log->save(false);
											
						$this->redirect(array('editList'));
					}
		     }
    	}
 
    	$this->render('applicationClass/editInstallation', array(
        'a'=>$a,
        'b'=>$b,
    	));

	}
	public function actionEditImportation()
	{
		$a=$this->loadModel();
    	$b=ApplicationImportation::model()->findByPk($a->id);
		
    	if(isset($_POST['LicenceApplication'], $_POST['ApplicationImportation']))
    	{
		     
		     $a->attributes=$_POST['LicenceApplication'];
		     $b->attributes=$_POST['ApplicationImportation'];
		    
		     $valid=$a->validate() && $b->validate();
	 
		     if($valid)
		     {
					if(isset($_POST['save'])){
				      
				      $a->save(false);
				      $b->save(false);

						//insert log
						$log=new Log;
						$log->username=Yii::app()->user->name;
						$log->entity_type='licence_application';
						$log->entity_id=$a->id;
						$log->time=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
						$log->action='edit';
						$log->day=Yii::app()->dateFormatter->formatDateTime(time(),'medium',null);
						$log->remarks='';
						$log->status=$a->status;
						$log->team='';
						$log->stage='';

						$log->save(false);
											
						$this->redirect(array('editList'));
					}
		     }
    	}
 
    	$this->render('applicationClass/editImportation', array(
        'a'=>$a,
        'b'=>$b,
    	));

	}
	
	public function actionEditDistribution()
	{
		$a=$this->loadModel();
    	$b=ApplicationDistribution::model()->findByPk($a->id);
		
    	if(isset($_POST['LicenceApplication'], $_POST['ApplicationDistribution']))
    	{
		     
		     $a->attributes=$_POST['LicenceApplication'];
		     $b->attributes=$_POST['ApplicationDistribution'];
		    
		     $valid=$a->validate() && $b->validate();
	 
		     if($valid)
		     {
					if(isset($_POST['save'])){
				      
				      $a->save(false);
				      $b->save(false);

						//insert log
						$log=new Log;
						$log->username=Yii::app()->user->name;
						$log->entity_type='licence_application';
						$log->entity_id=$a->id;
						$log->time=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
						$log->action='edit';
						$log->day=Yii::app()->dateFormatter->formatDateTime(time(),'medium',null);
						$log->remarks='';
						$log->status=$a->status;
						$log->team='';
						$log->stage='';

						$log->save(false);
											
						$this->redirect(array('editList'));
					}
		     }
    	}
 
    	$this->render('applicationClass/editDistribution', array(
        'a'=>$a,
        'b'=>$b,
    	));

	}
	public function actionEditSelling()
	{
		$a=$this->loadModel();
    	$b=ApplicationSelling::model()->findByPk($a->id);
		
    	if(isset($_POST['LicenceApplication'], $_POST['ApplicationSelling']))
    	{
		     
		     $a->attributes=$_POST['LicenceApplication'];
		     $b->attributes=$_POST['ApplicationSelling'];
		    
		     $valid=$a->validate() && $b->validate();
	 
		     if($valid)
		     {
					if(isset($_POST['save'])){
				      
				      $a->save(false);
				      $b->save(false);

						//insert log
						$log=new Log;
						$log->username=Yii::app()->user->name;
						$log->entity_type='licence_application';
						$log->entity_id=$a->id;
						$log->time=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
						$log->action='edit';
						$log->day=Yii::app()->dateFormatter->formatDateTime(time(),'medium',null);
						$log->remarks='';
						$log->status=$a->status;
						$log->team='';
						$log->stage='';

						$log->save(false);
											
						$this->redirect(array('editList'));
					}
		     }
    	}
 
    	$this->render('applicationClass/editSelling', array(
        'a'=>$a,
        'b'=>$b,
    	));

	}
	
	public function actionEditContent()
	{
		$a=$this->loadModel();
    	$b=ApplicationCommunication::model()->findByPk($a->id);
    	$d=ApplicationContent::model()->findByPk($a->id);
		
    	if(isset($_POST['LicenceApplication'], $_POST['ApplicationCommunication']))
    	{
		     
		     $a->attributes=$_POST['LicenceApplication'];
		     $b->attributes=$_POST['ApplicationCommunication'];
		     $d->attributes=$_POST['ApplicationContent'];
		     $valid=$a->validate() && $b->validate() && $d->validate();
	 
		     if($valid)
		     {
					if(isset($_POST['save'])){
				      
				      $a->save(false);
				      $b->save(false);
					  $d->save(false);
						//insert log
						$log=new Log;
						$log->username=Yii::app()->user->name;
						$log->entity_type='licence_application';
						$log->entity_id=$a->id;
						$log->time=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
						$log->action='edit';
						$log->day=Yii::app()->dateFormatter->formatDateTime(time(),'medium',null);
						$log->remarks='';
						$log->status=$a->status;
						$log->team='';
						$log->stage='';

						$log->save(false);
											
						$this->redirect(array('editList'));
					}
		     }
    	}
 
    	$this->render('applicationCommunication/editContent', array(
        'a'=>$a,
        'b'=>$b,
    	'd'=>$d,
    	));

	}
	public function actionEditCourier()
	{
		$a=$this->loadModel();
    	$b=ApplicationCourier::model()->findByPk($a->id);
		
    	if(isset($_POST['LicenceApplication'], $_POST['ApplicationCourier']))
    	{
		     
		     $a->attributes=$_POST['LicenceApplication'];
		     $b->attributes=$_POST['ApplicationCourier'];
		    
		     $valid=$a->validate() && $b->validate();
	 
		     if($valid)
		     {
					if(isset($_POST['save'])){
				      
				      $a->save(false);
				      $b->save(false);

						//insert log
						$log=new Log;
						$log->username=Yii::app()->user->name;
						$log->entity_type='licence_application';
						$log->entity_id=$a->id;
						$log->time=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
						$log->action='edit';
						$log->day=Yii::app()->dateFormatter->formatDateTime(time(),'medium',null);
						$log->remarks='';
						$log->status=$a->status;
						$log->team='';
						$log->stage='';

						$log->save(false);
											
						$this->redirect(array('editList'));
					}
		     }
    	}
 
    	$this->render('applicationCourier/editCourier', array(
        'a'=>$a,
        'b'=>$b,
    	));

	}
	public function actionNewContent()
	{
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$a=new LicenceApplication;
    	$b=new ApplicationCommunication;
		$c=new Receipt;
		$d=new ApplicationContent;
		if(isset($_POST['save'])){
			$a->attributes=$_POST['LicenceApplication'];
		    $b->attributes=$_POST['ApplicationCommunication'];
	 		$c->attributes=$_POST['Receipt'];
	 		$d->attributes=$_POST['ApplicationContent'];
		 		try{
					$file = fopen('/temp/'.Yii::app()->user->name.'.txt', 'w');
					$values=array('a'=>$a,'b'=>$b,'c'=>$c,'d'=>$d);
					fwrite($file, serialize($values));
					fclose($file);
				}catch(Exception $e){}
	 	}elseif(isset($_POST['retrieve'])){
		 	$fileread = '/temp/'.Yii::app()->user->name.'.txt';
			try{
				$values = unserialize(file_get_contents($fileread));
				$a=$values['a'];
				$b=$values['b'];
				$c=$values['c'];
				$d=$values['d'];
			}catch(Exception $e){}  	
	 	}
    	elseif(isset($_POST['LicenceApplication'], $_POST['ApplicationCommunication']))
    	{
		    
		     $a->attributes=$_POST['LicenceApplication'];
		     $b->attributes=$_POST['ApplicationCommunication'];
	 		 $c->attributes=$_POST['Receipt'];
			 $d->attributes=$_POST['ApplicationContent'];
		    
			 
		     
	 		 $valida=$a->validate();
	 		 $validb=$b->validate();
	 		 $validc=$c->validate();
	 		 $validd=$d->validate();
	 		 $valid=$valida && $validb && $validc && $validd;
		     if($valid)
		     {
					if(isset($_POST['insert'])){
				      // use false parameter to disable validation
						
						$a->status='Received';
				      $a->save(false);
						$b->id=$a->id;
				      $b->save(false);
						$d->id=$a->id;
						$d->save(false);
						//insert log
						$log=new Log;
						$log->username=Yii::app()->user->name;
						$log->entity_type='licence_application';
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
						$invoice->entity_type='licence_application';
						$invoice->entity_id=$a->id;
						$invoice->operator_id=$a->operator_id;
						$invoice->day=$date;
						$invoice->currency_id=$currency->id;
						$invoice->description='Licence Application Fee';						
						$invoice->type='Licence Application Fee';
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
						
						$email=new Email;
						$email->sender=Yii::app()->params->emailSystem;
						$email->receiver=Yii::app()->params->emailLegal;
						$email->subject='Licence Application - '.$model->applicant->name;
						$body="
						<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 TRANSITIONAL//EN\">\n
						<html>\n
						<body>
						<table>
						<tr bgcolor='#E5F1F4'><td>ID:</td><td>$model->id</td><td>Applicant</td><td>".$model->applicant->name."</td></tr>\n
						<tr bgcolor='#F8F8F8'><td>Type:</td><td>".$model->licenceCategory->name."</td><td>Status:</td><td>$model->status</td></tr>\n
						<tr bgcolor='#E5F1F4'><td>Done by:</td><td>".Yii::app()->user->name."</td><td>Next Stage:</td><td>Evaluation</td></tr>\n
						";
						$body.="
						</table>
						</body>
						</html>
						";
						$email->body=$body;
						$email->status='New';
						$email->save(false);
						// ...redirect to another page
						$this->redirect(array('viewList'));
					}
		     }
    	}else	{
			if(isset($_GET['category']))
				$a->licence_category_id=$_GET['category'];
		}
 
    	$this->render('applicationCommunication/newContent', array(
        'a'=>$a,
        'b'=>$b,
		  'c'=>$c,
		  'd'=>$d,
    	));
	}
	public function actionNewCourier()
	{
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$a=new LicenceApplication;
    	$b=new ApplicationCourier;
		$c=new Receipt;
	if(isset($_POST['save'])){
			$a->attributes=$_POST['LicenceApplication'];
		    $b->attributes=$_POST['ApplicationCourier'];
	 		$c->attributes=$_POST['Receipt'];
		 		try{
					$file = fopen('/temp/'.Yii::app()->user->name.'.txt', 'w');
					$values=array('a'=>$a,'b'=>$b,'c'=>$c);
					fwrite($file, serialize($values));
					fclose($file);
				}catch(Exception $e){}
	 	}elseif(isset($_POST['retrieve'])){
		 	$fileread = '/temp/'.Yii::app()->user->name.'.txt';
			try{
				$values = unserialize(file_get_contents($fileread));
				$a=$values['a'];
				$b=$values['b'];
				$c=$values['c'];
			}catch(Exception $e){}  	
	 	}
	 	elseif(isset($_POST['LicenceApplication'], $_POST['ApplicationCourier']))
    	{
		     // populate input data to $a and $b
		     $a->attributes=$_POST['LicenceApplication'];
		     $b->attributes=$_POST['ApplicationCourier'];
	 		  $c->attributes=$_POST['Receipt'];
		     
		     $valid=$a->validate() && $b->validate() && $c->validate();
	 
		     if($valid)
		     {
					if(isset($_POST['insert'])){
				      // use false parameter to disable validation
						
						$a->status='Received';
				      $a->save(false);
						$b->id=$a->id;
				      $b->save(false);

						//insert log
						$log=new Log;
						$log->username=Yii::app()->user->name;
						$log->entity_type='licence_application';
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
						$invoice->entity_type='licence_application';
						$invoice->entity_id=$a->id;
						$invoice->operator_id=$a->operator_id;
						$invoice->day=$date;
						$invoice->currency_id=$currency->id;
						$invoice->description='Licence Application Fee';						
						$invoice->type='Licence Application Fee';
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
						
						$email=new Email;
						$email->sender=Yii::app()->params->emailSystem;
						$email->receiver=Yii::app()->params->emailPostal;
						$email->subject='Licence Application - '.$a->applicant->name;
						$body="
						<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 TRANSITIONAL//EN\">\n
						<html>\n
						<body>
						<table>
						<tr bgcolor='#E5F1F4'><td>ID:</td><td>$a->id</td><td>Applicant</td><td>".$a->applicant->name."</td></tr>\n
						<tr bgcolor='#F8F8F8'><td>Type:</td><td>".$a->licenceCategory->name."</td><td>Status:</td><td>$a->status</td></tr>\n
						<tr bgcolor='#E5F1F4'><td>Done by:</td><td>".Yii::app()->user->name."</td><td>Next Stage:</td><td>Evaluation</td></tr>\n
						";
						$body.="
						</table>
						</body>
						</html>
						";
						$email->body=$body;
						$email->status='New';
						$email->save(false);
						// ...redirect to another page
						$this->redirect(array('viewList'));
					}
		     }
    	}else	{
			$a->licence_category_id=$_GET['category'];
		}
 
    	$this->render('applicationCourier/newCourier', array(
        'a'=>$a,
        'b'=>$b,
		 'c'=>$c,
    	));

	}
	public function actionNewInstallation()
	{
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$a=new LicenceApplication;
    	$b=new ApplicationInstallation;
		$c=new Receipt;
    	if(isset($_POST['LicenceApplication'], $_POST['ApplicationInstallation']))
    	{
		     // populate input data to $a and $b
		     $a->attributes=$_POST['LicenceApplication'];
		     $b->attributes=$_POST['ApplicationInstallation'];
	 		  $c->attributes=$_POST['Receipt'];
		     
		     $valid=$a->validate() && $b->validate() && $c->validate();
	 
		     if($valid)
		     {
					if(isset($_POST['insert'])){
				      // use false parameter to disable validation
						
						$a->status='Received';
				      $a->save(false);
						$b->id=$a->id;
				      $b->save(false);

						//insert log
						$log=new Log;
						$log->username=Yii::app()->user->name;
						$log->entity_type='licence_application';
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
						$invoice->entity_type='licence_application';
						$invoice->entity_id=$a->id;
						$invoice->operator_id=$a->operator_id;
						$invoice->day=$date;
						$invoice->currency_id=$currency->id;
						$invoice->description='Licence Application Fee';						
						$invoice->type='Licence Application Fee';
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
						
						$email=new Email;
						$email->sender=Yii::app()->params->emailSystem;
						$email->receiver=Yii::app()->params->emailLegal;
						$email->subject='Licence Application - '.$a->applicant->name;
						$body="
						<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 TRANSITIONAL//EN\">\n
						<html>\n
						<body>
						<table>
						<tr bgcolor='#E5F1F4'><td>ID:</td><td>$a->id</td><td>Applicant</td><td>".$a->applicant->name."</td></tr>\n
						<tr bgcolor='#F8F8F8'><td>Type:</td><td>".$a->licenceCategory->name."</td><td>Status:</td><td>$a->status</td></tr>\n
						<tr bgcolor='#E5F1F4'><td>Done by:</td><td>".Yii::app()->user->name."</td><td>Next Stage:</td><td>Evaluation</td></tr>\n
						";
						$body.="
						</table>
						</body>
						</html>
						";
						$email->body=$body;
						$email->status='New';
						$email->save(false);
						// ...redirect to another page
						$this->redirect(array('viewList'));
					}
		     }
    	}else	{
			$a->licence_category_id=$_GET['category'];
		}
 
    	$this->render('applicationClass/newInstallation', array(
        'a'=>$a,
        'b'=>$b,
		 'c'=>$c,
    	));

	}
	public function actionNewImportation()
	{
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$a=new LicenceApplication;
    	$b=new ApplicationImportation;
		$c=new Receipt;
    	if(isset($_POST['LicenceApplication'], $_POST['ApplicationImportation']))
    	{
		     // populate input data to $a and $b
		     $a->attributes=$_POST['LicenceApplication'];
		     $b->attributes=$_POST['ApplicationImportation'];
	 		  $c->attributes=$_POST['Receipt'];
		     
		     $valid=$a->validate() && $b->validate() && $c->validate();
	 
		     if($valid)
		     {
					if(isset($_POST['insert'])){
				      // use false parameter to disable validation
						
						$a->status='Received';
				      $a->save(false);
						$b->id=$a->id;
				      $b->save(false);

						//insert log
						$log=new Log;
						$log->username=Yii::app()->user->name;
						$log->entity_type='licence_application';
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
						$invoice->entity_type='licence_application';
						$invoice->entity_id=$a->id;
						$invoice->operator_id=$a->operator_id;
						$invoice->day=$date;
						$invoice->currency_id=$currency->id;
						$invoice->description='Licence Application Fee';						
						$invoice->type='Licence Application Fee';
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
						
						$email=new Email;
						$email->sender=Yii::app()->params->emailSystem;
						$email->receiver=Yii::app()->params->emailLegal;
						$email->subject='Licence Application - '.$a->applicant->name;
						$body="
						<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 TRANSITIONAL//EN\">\n
						<html>\n
						<body>
						<table>
						<tr bgcolor='#E5F1F4'><td>ID:</td><td>$a->id</td><td>Applicant</td><td>".$a->applicant->name."</td></tr>\n
						<tr bgcolor='#F8F8F8'><td>Type:</td><td>".$a->licenceCategory->name."</td><td>Status:</td><td>$a->status</td></tr>\n
						<tr bgcolor='#E5F1F4'><td>Done by:</td><td>".Yii::app()->user->name."</td><td>Next Stage:</td><td>Evaluation</td></tr>\n
						";
						$body.="
						</table>
						</body>
						</html>
						";
						$email->body=$body;
						$email->status='New';
						$email->save(false);
						// ...redirect to another page
						$this->redirect(array('viewList'));
					}
		     }
    	}else	{
			$a->licence_category_id=$_GET['category'];
		}
 
    	$this->render('applicationClass/newImportation', array(
        'a'=>$a,
        'b'=>$b,
		 'c'=>$c,
    	));

	}
	public function actionNewVsat()
	{
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$a=new LicenceApplication;
    	$b=new ApplicationVsat;
		$c=new Receipt;
    	if(isset($_POST['LicenceApplication'], $_POST['ApplicationVsat']))
    	{
		     // populate input data to $a and $b
		     $a->attributes=$_POST['LicenceApplication'];
		     $b->attributes=$_POST['ApplicationVsat'];
	 		  $c->attributes=$_POST['Receipt'];
		     
		     $valid=$a->validate() && $b->validate() && $c->validate();
	 
		     if($valid)
		     {
					if(isset($_POST['insert'])){
				      // use false parameter to disable validation
						
						$a->status='Received';
				      $a->save(false);
						$b->id=$a->id;
				      $b->save(false);

						//insert log
						$log=new Log;
						$log->username=Yii::app()->user->name;
						$log->entity_type='licence_application';
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
						$invoice->entity_type='licence_application';
						$invoice->entity_id=$a->id;
						$invoice->operator_id=$a->operator_id;
						$invoice->day=$date;
						$invoice->currency_id=$currency->id;
						$invoice->description='Licence Application Fee';						
						$invoice->type='Licence Application Fee';
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
						
						$email=new Email;
						$email->sender=Yii::app()->params->emailSystem;
						$email->receiver=Yii::app()->params->emailLegal;
						$email->subject='Licence Application - '.$a->applicant->name;
						$body="
						<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 TRANSITIONAL//EN\">\n
						<html>\n
						<body>
						<table>
						<tr bgcolor='#E5F1F4'><td>ID:</td><td>$a->id</td><td>Applicant</td><td>".$a->applicant->name."</td></tr>\n
						<tr bgcolor='#F8F8F8'><td>Type:</td><td>".$a->licenceCategory->name."</td><td>Status:</td><td>$a->status</td></tr>\n
						<tr bgcolor='#E5F1F4'><td>Done by:</td><td>".Yii::app()->user->name."</td><td>Next Stage:</td><td>Evaluation</td></tr>\n
						";
						$body.="
						</table>
						</body>
						</html>
						";
						$email->body=$body;
						$email->status='New';
						$email->save(false);
						// ...redirect to another page
						$this->redirect(array('viewList'));
					}
		     }
    	}else	{
			$a->licence_category_id=$_GET['category'];
		}
 
    	$this->render('applicationClass/newVsat', array(
        'a'=>$a,
        'b'=>$b,
		 'c'=>$c,
    	));

	}
	
	public function actionNewDistribution()
	{
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$a=new LicenceApplication;
    	$b=new ApplicationDistribution;
		$c=new Receipt;
    	if(isset($_POST['LicenceApplication'], $_POST['ApplicationDistribution']))
    	{
		     // populate input data to $a and $b
		     $a->attributes=$_POST['LicenceApplication'];
		     $b->attributes=$_POST['ApplicationDistribution'];
	 		  $c->attributes=$_POST['Receipt'];
		     
		     $valid=$a->validate() && $b->validate() && $c->validate();
	 
		     if($valid)
		     {
					if(isset($_POST['insert'])){
				      // use false parameter to disable validation
						
						$a->status='Received';
				      $a->save(false);
						$b->id=$a->id;
				      $b->save(false);

						//insert log
						$log=new Log;
						$log->username=Yii::app()->user->name;
						$log->entity_type='licence_application';
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
						$invoice->entity_type='licence_application';
						$invoice->entity_id=$a->id;
						$invoice->operator_id=$a->operator_id;
						$invoice->day=$date;
						$invoice->currency_id=$currency->id;
						$invoice->description='Licence Application Fee';						
						$invoice->type='Licence Application Fee';
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
						
						$email=new Email;
						$email->sender=Yii::app()->params->emailSystem;
						$email->receiver=Yii::app()->params->emailLegal;
						$email->subject='Licence Application - '.$a->applicant->name;
						$body="
						<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 TRANSITIONAL//EN\">\n
						<html>\n
						<body>
						<table>
						<tr bgcolor='#E5F1F4'><td>ID:</td><td>$a->id</td><td>Applicant</td><td>".$a->applicant->name."</td></tr>\n
						<tr bgcolor='#F8F8F8'><td>Type:</td><td>".$a->licenceCategory->name."</td><td>Status:</td><td>$a->status</td></tr>\n
						<tr bgcolor='#E5F1F4'><td>Done by:</td><td>".Yii::app()->user->name."</td><td>Next Stage:</td><td>Evaluation</td></tr>\n
						";
						$body.="
						</table>
						</body>
						</html>
						";
						$email->body=$body;
						$email->status='New';
						$email->save(false);
						// ...redirect to another page
						$this->redirect(array('viewList'));
					}
		     }
    	}else	{
			$a->licence_category_id=$_GET['category'];
		}
 
    	$this->render('applicationClass/newDistribution', array(
        'a'=>$a,
        'b'=>$b,
		 'c'=>$c,
    	));

	}
public function actionNewSelling()
	{
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$a=new LicenceApplication;
    	$b=new ApplicationSelling;
		$c=new Receipt;
    	if(isset($_POST['LicenceApplication'], $_POST['ApplicationSelling']))
    	{
		     // populate input data to $a and $b
		     $a->attributes=$_POST['LicenceApplication'];
		     $b->attributes=$_POST['ApplicationSelling'];
	 		  $c->attributes=$_POST['Receipt'];
		     
		     $valid=$a->validate() && $b->validate() && $c->validate();
	 
		     if($valid)
		     {
					if(isset($_POST['insert'])){
				      // use false parameter to disable validation
						
						$a->status='Received';
				      $a->save(false);
						$b->id=$a->id;
				      $b->save(false);

						//insert log
						$log=new Log;
						$log->username=Yii::app()->user->name;
						$log->entity_type='licence_application';
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
						$invoice->entity_type='licence_application';
						$invoice->entity_id=$a->id;
						$invoice->operator_id=$a->operator_id;
						$invoice->day=$date;
						$invoice->currency_id=$currency->id;
						$invoice->description='Licence Application Fee';						
						$invoice->type='Licence Application Fee';
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
						
						$email=new Email;
						$email->sender=Yii::app()->params->emailSystem;
						$email->receiver=Yii::app()->params->emailLegal;
						$email->subject='Licence Application - '.$a->applicant->name;
						$body="
						<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 TRANSITIONAL//EN\">\n
						<html>\n
						<body>
						<table>
						<tr bgcolor='#E5F1F4'><td>ID:</td><td>$a->id</td><td>Applicant</td><td>".$a->applicant->name."</td></tr>\n
						<tr bgcolor='#F8F8F8'><td>Type:</td><td>".$a->licenceCategory->name."</td><td>Status:</td><td>$a->status</td></tr>\n
						<tr bgcolor='#E5F1F4'><td>Done by:</td><td>".Yii::app()->user->name."</td><td>Next Stage:</td><td>Evaluation</td></tr>\n
						";
						$body.="
						</table>
						</body>
						</html>
						";
						$email->body=$body;
						$email->status='New';
						$email->save(false);
						// ...redirect to another page
						$this->redirect(array('viewList'));
					}
		     }
    	}else	{
			$a->licence_category_id=$_GET['category'];
		}
 
    	$this->render('applicationClass/newSelling', array(
        'a'=>$a,
        'b'=>$b,
		 'c'=>$c,
    	));

	}
	public function actionCategoryFilter()
	{
 		$data=LicenceCategory::model()->findAll(array('condition'=>'licence_group_id='.$_POST['group'],'order'=>'order_code'));
	 	echo CHtml::tag('option',array('value'=>''),CHtml::encode('Select'),true);

    	$data=CHtml::listData($data,'id','name');
    	foreach($data as $value=>$name)
    	{
        	echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name),true);
    	}
	}
	public function actionSubCategoryFilter()
	{
		$category_id=0;
		if (isset($_POST['MarketSegment']['licence_category_id']))
			$category_id=$_POST['MarketSegment']['licence_category_id'];
		if (isset($_POST['LicenceSubCategory']['licence_category_id']))
			$category_id=$_POST['LicenceSubCategory']['licence_category_id'];
		if (isset($_POST['LicenceFee']['licence_category_id']))
			$category_id=$_POST['LicenceFee']['licence_category_id'];
		
		if (empty($category_id))
			$category_id=0;
		$data=LicenceSubCategory::model()->findAll(array('condition'=>'licence_category_id='.$category_id));
		echo CHtml::tag('option',array('value'=>''),CHtml::encode('Select'),true);
	
		$data=CHtml::listData($data,'id','name');
		foreach($data as $value=>$name)
		{
			echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name),true);
		}
	}
	public function actionMarketSegmentFilter2()
	{
		$category_id=0;
		
		if (isset($_POST['LicenceApplication']['licence_category_id']))
			$category_id=$_POST['LicenceApplication']['licence_sub_category_id'];
		if (empty($category_id))
			$category_id=0;
		$data=MarketSegment::model()->findAll(array('condition'=>'licence_sub_category_id='.$category_id));
		echo CHtml::tag('option',array('value'=>''),CHtml::encode('Select'),true);
	
		//$data=CHtml::listData($data,'id','name');
		foreach($data as $d)
		{
			$text=$d->name;
			echo CHtml::tag('option',array('value'=>$d->id),CHtml::encode($text),true);
		}
	}
	public function actionMarketSegmentFilter()
	{
		$category_id=0;
		if (isset($_POST['MarketSegment']['licence_category_id']))
			$category_id=$_POST['MarketSegment']['licence_category_id'];
		if (isset($_POST['LicenceSubCategory']['licence_category_id']))
			$category_id=$_POST['LicenceSubCategory']['licence_category_id'];
		if (isset($_POST['LicenceFee']['licence_category_id']))
			$category_id=$_POST['LicenceFee']['licence_category_id'];
		if (isset($_POST['LicenceApplication']['licence_category_id']))
			$category_id=$_POST['LicenceApplication']['licence_category_id'];
		if (empty($category_id))
			$category_id=0;
		$data=MarketSegment::model()->findAll(array('condition'=>'licence_category_id='.$category_id));
		echo CHtml::tag('option',array('value'=>''),CHtml::encode('Select'),true);
	
		//$data=CHtml::listData($data,'id','name');
		foreach($data as $d)
		{
			$text=$d->name;
			if (!empty($d->licence_sub_category_id))
				$text=$d->licenceSubCategory->name.' - '.$d->name;
			echo CHtml::tag('option',array('value'=>$d->id),CHtml::encode($text),true);
		}
	}
	public function actionOfficerFilter()
	{
 		$data=Officer::model()->findAll(array('condition'=>'department_id='.$_POST['group']));
	 	
    	foreach($data as $d)
    	{
        	echo CHtml::tag('option',array('value'=>$d->id),CHtml::encode($d->name),true);
    	}
	}
	public function actionDecisionFilter()
	{
 		if (!empty($_POST['Log']['team']) && $_POST['Log']['team']=='DG'){
	 	
        	echo CHtml::tag('option',array('value'=>'Approved'),'Approved',true);
        	echo CHtml::tag('option',array('value'=>'Rejected'),'Rejected',true);
        	echo CHtml::tag('option',array('value'=>'Returned'),'Returned',true);
 		}
 		elseif (!empty($_POST['Log']['team']) && $_POST['Log']['team']=='Management'){
	 		echo CHtml::tag('option',array('value'=>'RecommendedBoard'),'Recommended For Board Approval',true);
	 		echo CHtml::tag('option',array('value'=>'RecommendedMinister'),'Approved pending Consultation with the Minister',true);
        	echo CHtml::tag('option',array('value'=>'Approved'),'Approved',true);
        	echo CHtml::tag('option',array('value'=>'Rejected'),'Rejected',true);
        	echo CHtml::tag('option',array('value'=>'Returned'),'Returned',true);
 		}
		elseif (!empty($_POST['Log']['team']) && $_POST['Log']['team']=='Board'){
	 		echo CHtml::tag('option',array('value'=>'RecommendedMinister'),'Approved pending Consultation with the Minister',true);
        	echo CHtml::tag('option',array('value'=>'Approved'),'Approved',true);
        	echo CHtml::tag('option',array('value'=>'Rejected'),'Rejected',true);
        	echo CHtml::tag('option',array('value'=>'Returned'),'Returned',true);
 		}
		elseif (!empty($_POST['Log']['team']) && $_POST['Log']['team']=='Minister'){
	 		echo CHtml::tag('option',array('value'=>'MinisterConsultation'),'Minister Consultation',true);
        	
 		}	
	}
	public function actions()
   	{
    	return array(
    		
       	);
   	}
	public function actionEdit()
	{
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['LicenceApplication']))
		{
			$model->attributes=$_POST['LicenceApplication'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function actionEvaluation()
	{
		$model=$this->loadModel();
		$log=new Log;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['LicenceApplication']) && isset($_POST['select2']))
		{
			$model->attributes=$_POST['LicenceApplication'];
			$model->status='Evaluated';
			
			$log->attributes=$_POST['Log'];
			$log->username=Yii::app()->user->name;
			$log->entity_type='licence_application';
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
				
				$email=new Email;
				$email->sender=Yii::app()->params->emailSystem;
				$email->receiver=Yii::app()->params->emailLegal;
				$email->subject='Licence Application - '.$model->applicant->name;
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
				$email->save(false);
				
				$this->redirect(array('evaluationList'));
			}
			
		}
		$this->render('evaluation',array(
			'model'=>$model,'log'=>$log,
		));
	}
	public function actionBusinessPlan()
	{
		$model=$this->loadModel();
		$log=new Log;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['LicenceApplication']) && isset($_POST['select2']))
		{
			$model->attributes=$_POST['LicenceApplication'];
			$ac=ApplicationCommunication::model()->findByPk($model->id);
			if ($ac->use_frequency==1 || $ac->use_numbering_resource==1)
                if($_POST['LicenceApplication']['app_status']=='Rejected')
                $status='Business Plan Rejected';
                else
				$status='Business Plan Analysed';
			else 
				$status='Pre-Evaluated';
				
			$model->status=$status;
			
			$log->attributes=$_POST['Log'];
			$log->username=Yii::app()->user->name;
			$log->entity_type='licence_application';
			$log->entity_id=$model->id;
			$log->time=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
			$log->action='Business Plan Analysis';
			//$log->remarks='';
			$log->status=$status;
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
				$this->redirect(array('admin'));
			}
			
		}
		$this->render('businessPlan',array(
			'model'=>$model,'log'=>$log,
		));
	}
	
	public function actionCheckResources()
	{
		$model=$this->loadModel();
		$log=new Log;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['LicenceApplication']) && isset($_POST['select2']))
		{
			$model->attributes=$_POST['LicenceApplication'];
			if($_POST['LicenceApplication']['app_status']=='Not available')
                $status='Pending for resources';
            else
                $status='Pre-Evaluated';
				
			$model->status=$status;
			
			$log->attributes=$_POST['Log'];
			$log->username=Yii::app()->user->name;
			$log->entity_type='licence_application';
			$log->entity_id=$model->id;
			$log->time=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
			$log->action='Check Resources';
			//$log->remarks='';
			$log->status='Resource Availability Checked';
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
				$this->redirect(array('viewList'));
			}
			
		}
		$this->render('checkResources',array(
			'model'=>$model,'log'=>$log,
		));
	}
	public function actionApproval()
	{
		$model=$this->loadModel();
		$log=new Log;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(!empty($_POST['status']) && ($_POST['status']=='RecommendedBoard' || $_POST['status']=='RecommendedMinister'))
		{
			$mystatus=$_POST['status'];
			$model->attributes=$_POST['LicenceApplication'];
			$model->status='Pending Approval';
			
			$log->attributes=$_POST['Log'];
			$log->username=Yii::app()->user->name;
			$log->entity_type='licence_application';
			$log->entity_id=$model->id;
			$log->time=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
			$log->action='Approval';
			$log->stage='';
			$log->status='Pending Approval';
			if ($mystatus=='RecommendedBoard')
				$mystatus='Recommended for Board Approval';
			elseif ($mystatus=='RecommendedMinister')
				$mystatus='Approved pending Consultation with the Minister ';
			
			$log->status=$mystatus;
			$valid=$model->validate() && $log->validate();
			if($valid){
				$model->save(false);
				$log->save(false);
				/*
				if($_POST['categoryid']){
					$model->licenceCategory->id=$_POST['categoryid'];
					$ms=MarketSegment::model()->findAll(array('condition'=>'licence_category_id='.$model->licenceCategory->id));
					foreach ($ms as $m){
						$model->market_segment_id=$m->id;
						$model->save(false);
					}
				}*/
				$this->redirect(array('approvalList'));
			}
			
		}
		elseif(!empty($_POST['status']) && ($_POST['status']=='Returned'))
		{
			$model->attributes=$_POST['LicenceApplication'];
			$model->status='Returned';
			
			$log->attributes=$_POST['Log'];
			$log->username=Yii::app()->user->name;
			$log->entity_type='licence_application';
			$log->entity_id=$model->id;
			$log->time=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
			$log->action='Approval';
			$log->stage='';
			$log->status='Returned';
			
			$valid=$model->validate() && $log->validate();
			if($valid){
				$model->save(false);
				$log->save(false);
				
				$this->redirect(array('approvalList'));
			}
			
		}
		elseif(!empty($_POST['status']) && ($_POST['status']=='Rejected'))
		{
			$model->attributes=$_POST['LicenceApplication'];
			$model->status='Rejected';
			
			$log->attributes=$_POST['Log'];
			$log->username=Yii::app()->user->name;
			$log->entity_type='licence_application';
			$log->entity_id=$model->id;
			$log->time=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
			$log->action='Approval';
			$log->stage='';
			$log->status='Rejected';
			
			$valid=$model->validate() && $log->validate();
			if($valid){
				$model->save(false);
				$log->save(false);
				
				$this->redirect(array('approvalList'));
			}
			
		}
		elseif(!empty($_POST['status']) && ($_POST['status']=='Approved' || $_POST['status']=='MinisterConsultation')){
			
			$log->attributes=$_POST['Log'];
			$model->status='Approved';
			$log->username=Yii::app()->user->name;
			$log->entity_type='licence_application';
			$log->entity_id=$model->id;
			$log->time=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
			$log->action='Approval';
			$log->stage='';
			$log->status='Approved';
			if ($_POST['status']=='MinisterConsultation')
				$log->status='Minister Consultation';
			$model->save(false);
			$log->save(false);
			/*
			if($_POST['categoryid']){
				$model->licenceCategory->id=$_POST['categoryid'];
				$ms=MarketSegment::model()->findAll(array('condition'=>'licence_category_id='.$model->licenceCategory->id));
				foreach ($ms as $m){
					$model->market_segment_id=$m->id;
					$model->save(false);
				}
			}*/
			
			$lf=LicenceFee::model()->find("licence_category_id=".$model->licence_category_id." and market_segment_id=".$model->market_segment_id);
			
			//invoice
						$invoice=new Invoice;
						$invoice->entity_type='licence_application';
						$invoice->entity_id=$model->id;
						$invoice->operator_id=$model->operator_id;
						$invoice->day=Yii::app()->dateFormatter->formatDateTime(time(),'medium',null);
						$invoice->currency_id=$lf->initial_fee_currency_id;
						$invoice->description='Licence Initial Fee';						
						$invoice->type='Licence Initial Fee';
						$invoice->in_epicor='no';
						$invoice->amount=$lf->initial_fee;
						$invoice->amount_paid=0;
						$invoice->amount_due=$lf->initial_fee;
						$invoice->terms='30DAYS';
						$invoice->email_sent='no';
						$invoice->save(false);
						$invoice->num='IVTRX-'.$invoice->id;
						$invoice->save(false);
						
						//invoice detail
						$invoiceDetail=new InvoiceDetail;
						$invoiceDetail->amount=$lf->initial_fee;
						$invoiceDetail->description='Initial Licence Fee: '.$model->licenceCategory->name;
						$invoiceDetail->invoice_id=$invoice->id;
						$invoiceDetail->save(false);
			
			
			$this->redirect(array('approvalList'));
		}
		$this->render('approval',array(
			'model'=>$model,'log'=>$log,
		));
	}
	public function actionIssue()
	{
		$model=$this->loadModel();
		$log=new Log;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(!empty($_POST['save']))
		{
			$model->attributes=$_POST['LicenceApplication'];
			$model->status='Active';
			$model->is_licence=1;
			$log->attributes=$_POST['Log'];
			$log->username=Yii::app()->user->name;
			$log->entity_type='licence_application';
			$log->entity_id=$model->id;
			$log->time=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
			$log->action='issue';
			$log->stage='';
			$log->status='Issued';
			$model->setScenario('issue');
			$valid=$model->validate() && $log->validate();
			if($valid){
				$model->save(false);
				$log->save(false);
				
				$this->redirect(array('issueList'));
			}	
		}
		$this->render('issue',array(
			'model'=>$model,'log'=>$log,
		));
	}
	public function actionPrint()
	{
		$this->render('print',array(
			'model'=>$this->loadModel(),
		));
	}	
	public function actionPrepare()
	{
		$model=$this->loadModel();
		$log=new Log;
		
		if(isset($_POST['insert']))
		{
			$model->attributes=$_POST['LicenceApplication'];
			$model->status='Prepared';
			$log->attributes=$_POST['Log'];
			$log->username=Yii::app()->user->name;
			$log->entity_type='licence_application';
			$log->entity_id=$model->id;
			$log->time=Yii::app()->dateFormatter->formatDateTime(time(),'medium','medium');
			$log->action='Prepare';
			$log->status='Prepared';
			$log->team='';
			$log->stage='';
			
			$valid=$model->validate() && $log->validate();
			$model->attributes=$_POST['LicenceApplication'];
			if($valid){
				$model->save(false);
				$log->save(false);
				if ($model->licenceCategory->licenceGroup->id==1){
					RollOutPlan::model()->deleteAll(array('condition'=>"licence_application_id=".$model->id));
					for($i=0;$i<5;$i++){
						if (!empty($_REQUEST['type_'.$i]) && !empty($_REQUEST['status_'.$i]) && !empty($_REQUEST['capacity_'.$i]) && !empty($_REQUEST['time_'.$i]) && !empty($_REQUEST['area_'.$i])){
							$rollOutPlan=new RollOutPlan;
							$rollOutPlan->licence_application_id=$model->id;
							$rollOutPlan->service_type = $_REQUEST['type_'.$i];
							$rollOutPlan->status = $_REQUEST['status_'.$i]; 
							$rollOutPlan->capacity = $_REQUEST['capacity_'.$i];
							$rollOutPlan->time_frame = $_REQUEST['time_'.$i]; 
							$rollOutPlan->area = $_REQUEST['area_'.$i]; 
							if ($rollOutPlan->validate())
								$rollOutPlan->save(false); 
						}
					}
				}
			}	
		}
		$this->render('prepare',array(
			'model'=>$model,'log'=>$log,
		));
	}
}
