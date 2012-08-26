<?php

class StatisticsInternetMainController extends Controller
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
				'expression'=>'Yii::app()->user->getPermission("statisticsInternet")',
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
		$model=new StatisticsInternetMain;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['StatisticsInternetMain'])  && isset($_POST['create']))
		{
			$model->attributes=$_POST['StatisticsInternetMain'];
			if($model->save()){
				//subscription base
				StatisticsInternetBase::model()->deleteAll('main_id='.$model->id);
				$internetSubscriberTypes=InternetSubscriberType::model()->findAll(array('order'=>'t.id'));
				foreach ($internetSubscriberTypes as $internetSubscriberType){
					$num_cafe=$num_business=$num_resident=0;
					if ($_POST['base_cafe_'.$internetSubscriberType->id])
						$num_cafe=$_POST['base_cafe_'.$internetSubscriberType->id];
					if ($_POST['base_business_'.$internetSubscriberType->id])
						$num_business=$_POST['base_business_'.$internetSubscriberType->id];
					if ($_POST['base_resident_'.$internetSubscriberType->id])
						$num_resident=$_POST['base_resident_'.$internetSubscriberType->id];
						
					if ($num_cafe != 0 || $num_business != 0 || $num_resident != 0){
						$statisticsInternetBase=new StatisticsInternetBase;
						$statisticsInternetBase->main_id=$model->id;
						$statisticsInternetBase->num_cafe=str_replace(',','',$num_cafe);
						$statisticsInternetBase->num_business=str_replace(',','',$num_business);
						$statisticsInternetBase->num_resident=str_replace(',','',$num_resident);
						$statisticsInternetBase->subscriber_type_id=$internetSubscriberType->id;
						$statisticsInternetBase->save(false);
					}
				}
				
				//bandwidth
				StatisticsInternetTariff::model()->deleteAll('main_id='.$model->id);
				$internetSubscriberTypes=InternetLinkType::model()->findAll(array('order'=>'t.id'));
				foreach ($internetSubscriberTypes as $internetSubscriberType){
					$actual=$used=0;
					if ($_POST['actual_'.$internetSubscriberType->id])
						$actual=$_POST['actual_'.$internetSubscriberType->id];
					if ($_POST['used_'.$internetSubscriberType->id])
						$used=$_POST['used_'.$internetSubscriberType->id];
						
					
						$statisticsInternetTariff=new StatisticsInternetTariff;
						$statisticsInternetTariff->main_id=$model->id;
						$statisticsInternetTariff->actual=str_replace(',','',$actual);
						$statisticsInternetTariff->used=str_replace(',','',$used);
						$statisticsInternetTariff->subscriber_type_id=$internetSubscriberType->id;
						$statisticsInternetTariff->save(false);
					
				}
				$this->redirect(array('update','id'=>$model->id));
			}
				
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

		if(isset($_POST['StatisticsInternetMain']) && isset($_POST['update']))
		{
			$model->attributes=$_POST['StatisticsInternetMain'];
			if($model->save()){
				//subscription base
				StatisticsInternetBase::model()->deleteAll('main_id='.$model->id);
				$internetSubscriberTypes=InternetSubscriberType::model()->findAll(array('order'=>'t.id'));
				foreach ($internetSubscriberTypes as $internetSubscriberType){
					$num_cafe=$num_business=$num_resident=0;
					if ($_POST['base_cafe_'.$internetSubscriberType->id])
						$num_cafe=$_POST['base_cafe_'.$internetSubscriberType->id];
					if ($_POST['base_business_'.$internetSubscriberType->id])
						$num_business=$_POST['base_business_'.$internetSubscriberType->id];
					if ($_POST['base_resident_'.$internetSubscriberType->id])
						$num_resident=$_POST['base_resident_'.$internetSubscriberType->id];
						
					if ($num_cafe != 0 || $num_business != 0 || $num_resident != 0){
						$statisticsInternetBase=new StatisticsInternetBase;
						$statisticsInternetBase->main_id=$model->id;
						$statisticsInternetBase->num_cafe=str_replace(',','',$num_cafe);
						$statisticsInternetBase->num_business=str_replace(',','',$num_business);
						$statisticsInternetBase->num_resident=str_replace(',','',$num_resident);
						$statisticsInternetBase->subscriber_type_id=$internetSubscriberType->id;
						$statisticsInternetBase->save(false);
					}
				}
				
				//bandwidth
				StatisticsInternetTariff::model()->deleteAll('main_id='.$model->id);
				$internetSubscriberTypes=InternetLinkType::model()->findAll(array('order'=>'t.id'));
				foreach ($internetSubscriberTypes as $internetSubscriberType){
					$actual=$used=0;
					if ($_POST['actual_'.$internetSubscriberType->id])
						$actual=$_POST['actual_'.$internetSubscriberType->id];
					if ($_POST['used_'.$internetSubscriberType->id])
						$used=$_POST['used_'.$internetSubscriberType->id];
						
					
						$statisticsInternetTariff=new StatisticsInternetTariff;
						$statisticsInternetTariff->main_id=$model->id;
						$statisticsInternetTariff->actual=str_replace(',','',$actual);
						$statisticsInternetTariff->used=str_replace(',','',$used);
						$statisticsInternetTariff->subscriber_type_id=$internetSubscriberType->id;
						$statisticsInternetTariff->save(false);
					
				}
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
		$dataProvider=new CActiveDataProvider('StatisticsInternetMain');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new StatisticsInternetMain('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StatisticsInternetMain']))
			$model->attributes=$_GET['StatisticsInternetMain'];

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
				$this->_model=StatisticsInternetMain::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='statistics-internet-main-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
