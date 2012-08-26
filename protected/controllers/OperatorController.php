<?php

class OperatorController extends Controller
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
				'actions'=>array('index','view','autoCompleteLookup','simpleView'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				
				'users'=>array('@'),
			),
			array('allow', 
				'actions'=>array('admin','update'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionAutoCompleteLookup()
    {
       if(Yii::app()->request->isAjaxRequest && isset($_GET['q']))
       {
            /* q is the default GET variable name that is used by
            / the autocomplete widget to pass in user input
            */
          $name = $_GET['q']; 
                    // this was set with the "max" attribute of the CAutoComplete widget
          $limit = min($_GET['limit'], 50); 
          $criteria = new CDbCriteria;
          $criteria->condition = "name LIKE :sterm";
          $criteria->params = array(":sterm"=>"%$name%");
          $criteria->limit = $limit;
          $operators = Operator::model()->findAll($criteria);
          $returnVal = '';
          foreach($operators as $operator)
          {
             $returnVal .= $operator->getAttribute('name').'|'
                                         .$operator->getAttribute('id')."\n";
          }
          echo $returnVal;
       }
       die();
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
	public function actionSimpleView()
	{
		$this->layout='//layouts/plain2';
		$this->render('simpleView',array(
			'model'=>$this->loadModel(),
		));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Operator;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Operator']))
		{
			$model->attributes=$_POST['Operator'];
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
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

		if(isset($_POST['Operator']))
		{
			$model->attributes=$_POST['Operator'];
			$model->save();
			$model->registration_date=date("d-m-Y",strtotime($model->registration_date));
			$model->certificate_date=date("d-m-Y",strtotime($model->certificate_date));
			if($_POST['ShareHolder']){
				$shareHolder=new ShareHolder;
				$shareHolder->attributes=$_POST['ShareHolder'];
				$shareHolder->operator_id=$model->id;
				$shareHolder->save();
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
public function actionEdit()
	{
		$this->layout='//layouts/plain2';
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Operator']))
		{
			$model->attributes=$_POST['Operator'];
			$model->save();
			$model->registration_date=date("d-m-Y",strtotime($model->registration_date));
			$model->certificate_date=date("d-m-Y",strtotime($model->certificate_date));
			if($_POST['ShareHolder']){
				$shareHolder=new ShareHolder;
				$shareHolder->attributes=$_POST['ShareHolder'];
				$shareHolder->operator_id=$model->id;
				$shareHolder->save();
			}
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
		$dataProvider=new CActiveDataProvider('Operator');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Operator('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Operator']))
			$model->attributes=$_GET['Operator'];

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
				$this->_model=Operator::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='operator-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
