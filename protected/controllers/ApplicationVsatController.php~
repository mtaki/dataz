<?php

class ApplicationVsatController extends Controller
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$model=new ApplicationVsat;
        $oparationAddress=new VsatOperationAddress;
        $billingAddress=new VsatBillingAddress;
        $siteData=new VsatSiteData;
        //$transmitterData=new VsatTransmitterEquipment;
        $antennaData=new VsatAntennaData;
        $frequencyData=new  VsatFrequencyData;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ApplicationVsat'],$_POST['VsatOperationAddress'],$_POST['VsatBillingAddress'],
        $_POST['VsatSiteData'],$_POST['VsatAntennaData'],$_POST['VsatFrequencyData']))
		{
			$model->attributes=$_POST['ApplicationVsat'];
			$oparationAddress->attributes=$_POST['VsatOperationAddress'];
			$billingAddress->attributes=$_POST['VsatBillingAddress'];
			$siteData->attributes=$_POST['VsatSiteData'];
			$antennaData->attributes=$_POST['VsatAntennaData'];
			$frequencyData->attributes=$_POST['VsatFrequencyData'];
			if($model->save()){
               $oparationAddress->application_vsat_id=$model->id;
               $oparationAddress->save();
               $billingAddress->application_vsat_id=$model->id;
               $billingAddress->save();
               $siteData->application_vsat_id=$model->id;

               $siteData->save();
               $antennaData->application_vsat_id=$model->id;

               $antennaData->save();
               $frequencyData->application_vsat_id=$model->id;

               $frequencyData->save();
				$this->redirect(array('view','id'=>$model->id));
                }
		}

		$this->render('create',array(
			'model'=>$model,
            'oparationAddress'=>$oparationAddress,
            'billingAddress'=>$billingAddress,
            'siteData'=>$siteData,
          //  'transmitterData'=>$transmitterData,
            'antennaData'=>$antennaData,
            'frequencyData'=>$frequencyData,
        
            
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

		if(isset($_POST['ApplicationVsat']))
		{
			$model->attributes=$_POST['ApplicationVsat'];
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
		$dataProvider=new CActiveDataProvider('ApplicationVsat');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ApplicationVsat('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ApplicationVsat']))
			$model->attributes=$_GET['ApplicationVsat'];

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
				$this->_model=ApplicationVsat::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='application-vsat-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
