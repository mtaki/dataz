<?php

class FrequencyController extends Controller
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
public function actionNew()
	{
		
		$model=new Frequency;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(!empty($_POST['category']))
		{
					
				$this->redirect(array('newAssignment','category'=>$_POST['category']));
			
		}

		$this->render('new',array(
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
	public function actionOperatorList()
	{
		$model=new Operator('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Operator']))
			$model->attributes=$_GET['Operator'];

		$this->render('operatorList',array(
			'model'=>$model
		));
	}
	public function actionNewAssignment()
	{
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model=new Frequency;
    	if(isset($_POST['Frequency']))
    	{
		     
		     $model->attributes=$_POST['Frequency'];
		    
		     $valid=$model->validate();
	 
		     if($valid)
		     {
					$model->status='In use';
				    $model->save(false);
					//insert log
						$log=new Log;
						$log->username=Yii::app()->user->name;
						$log->entity_type='frequency';
						$log->entity_id=$model->id;
						$log->time=date("Y-m-d H:i:s");
						$log->action='Create';
						$log->day=date("Y-m-d");
						$log->remarks='';
						$log->status='Created';
						$log->team='';
						$log->stage='';
						$log->save(false);
						$this->redirect(array('admin'));
					
		     }
    	}else	{
			$model->frequency_type_id=$_GET['category'];
		}
 
    	$this->render('newAssignment', array(
        'model'=>$model,
    	));

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
		$model=new Frequency;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Frequency']))
		{
			$model->attributes=$_POST['Frequency'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
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

		if(isset($_POST['Frequency']))
		{
			$model->attributes=$_POST['Frequency'];
			if($model->save())
				$this->redirect(array('admin'));
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
		$dataProvider=new CActiveDataProvider('Frequency');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Frequency('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Frequency']))
			$model->attributes=$_GET['Frequency'];

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
				$this->_model=Frequency::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='frequency-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
 	public function actionGenerateFee()
	{
		
	
		$model=$this->loadModelOperator();
		if(isset($_POST['Operator']))
		{
			$las=Frequency::model()->findAll("operator_id=".$model->id." and  t.status = 'In Use'");
			if(count($las) > 0){
			//invoice amount=0
			$invoice=new Invoice;
			$invoice->entity_type='operator';
			$invoice->entity_id=$model->id;
			$invoice->operator_id=$model->id;
			$invoice->day=date('Y-m-d');
			$invoice->currency_id=2;
			$invoice->description='Frequency Annual Fee';						
			$invoice->type='Frequency Annual Fee';
			$invoice->in_epicor='no';
			$invoice->amount=0;
			$invoice->amount_paid=0;
			$invoice->amount_due=0;
			$invoice->terms='30DAYS';
			$invoice->email_sent='no';
			$invoice->save(false);
			$invoice->num='IVTRX-'.$invoice->id;
			$invoice->save(false);
			}
						
			$total=0;
			foreach ($las as $frequency){
				$amount=$frequency->getFee();
				$total=$total + $amount;
				$type=$frequency->frequencyType->name;
					
					
				if ($amount > 0){
					$invoiceDetail=new InvoiceDetail;
					$invoiceDetail->amount=$amount;
					$invoiceDetail->description=$type;
					$invoiceDetail->invoice_id=$invoice->id;
					$invoiceDetail->save(false);
				}
					//invoice detail
			}
				//update invoice ammount=total;
				$invoice->amount=$total;
				$invoice->amount_due=$total;
				$invoice->save(false);
				$this->redirect(array('licenceeView','id'=>$model->id));
			
		}

		$this->render('generateFee',array(
			'model'=>$model,
		));
		
	}
}