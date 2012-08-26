<?php

class StatisticsCableTvMainController extends Controller
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
				'expression'=>'Yii::app()->user->getPermission("statisticsCableTv")',
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
		$model=new StatisticsCableTvMain;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['StatisticsCableTvMain']) && isset($_POST['create']))
		{
			$model->attributes=$_POST['StatisticsCableTvMain'];
			if ($model->save()){
				//subcrition base
				StatisticsCableTvBase::model()->deleteAll('main_id='.$model->id);
				$statisticsCableTypes=StatisticsCableType::model()->findAll(array('order'=>'t.id'));
				foreach ($statisticsCableTypes as $statisticsCableType){
					if ($_POST['base_m_'.$statisticsCableType->id] != ''){
						$num=$_POST['base_m_'.$statisticsCableType->id];
						$statisticsCableTvBase=new StatisticsCableTvBase;
						$statisticsCableTvBase->main_id=$model->id;
						$statisticsCableTvBase->num=str_replace(',','',$num);
						$statisticsCableTvBase->subscriber_type_id=$statisticsCableType->id;
						$statisticsCableTvBase->save(false);
					}
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

		if(isset($_POST['StatisticsCableTvMain']) && isset($_POST['update']))
		{
			$model->attributes=$_POST['StatisticsCableTvMain'];
			if ($model->save()){
				//subcrition base
				StatisticsCableTvBase::model()->deleteAll('main_id='.$model->id);
				$statisticsCableTypes=StatisticsCableType::model()->findAll(array('order'=>'t.id'));
				foreach ($statisticsCableTypes as $statisticsCableType){
					if ($_POST['base_m_'.$statisticsCableType->id] != ''){
						$num=$_POST['base_m_'.$statisticsCableType->id];
						$statisticsCableTvBase=new StatisticsCableTvBase;
						$statisticsCableTvBase->main_id=$model->id;
						$statisticsCableTvBase->num=str_replace(',','',$num);
						$statisticsCableTvBase->subscriber_type_id=$statisticsCableType->id;
						$statisticsCableTvBase->save(false);
					}
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
		$dataProvider=new CActiveDataProvider('StatisticsCableTvMain');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new StatisticsCableTvMain('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StatisticsCableTvMain']))
			$model->attributes=$_GET['StatisticsCableTvMain'];

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
				$this->_model=StatisticsCableTvMain::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='statistics-cable-tv-main-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
