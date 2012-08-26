<?php

class StatisticsTelecomMainController extends Controller
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
				'expression'=>'Yii::app()->user->getPermission("statisticsTelecom")',
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
		$model=new StatisticsTelecomMain;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['StatisticsTelecomMain']) && isset($_POST['create']))
		{
			$model->attributes=$_POST['StatisticsTelecomMain'];
			if($model->save()){
			//subcrition base
				StatisticsTelecomBase::model()->deleteAll('main_id='.$model->id);
				$telecomServices=TelecomService::model()->findAll(array('order'=>'t.id'));
				foreach ($telecomServices as $telecomService){
					
					if ($_POST['base_'.$telecomService->id] != ''){
						$num=$_POST['base_'.$telecomService->id];
						$statisticsTelecomBase=new StatisticsTelecomBase;
						$statisticsTelecomBase->main_id=$model->id;
						$statisticsTelecomBase->num=str_replace(',','',$num);
						$statisticsTelecomBase->service_id=$telecomService->id;
						$statisticsTelecomBase->save(false);
					}
				}
				
				//traffic air time
				StatisticsTelecomTraffic::model()->deleteAll('main_id='.$model->id);
				$airTimeMovements=AirTimeMovement::model()->findAll(array('order'=>'t.id'));
				$airTimeDestinations=AirTimeDestination::model()->findAll(array('order'=>'t.id'));
				foreach ($airTimeMovements as $airTimeMovement){
					foreach ($airTimeDestinations as $airTimeDestination){
						if ($_POST['traffic_'.$airTimeDestination->id.'_'.$airTimeMovement->id] != ''){
							$num=$_POST['traffic_'.$airTimeDestination->id.'_'.$airTimeMovement->id];
							$statisticsTelecomTraffic=new StatisticsTelecomTraffic;
							$statisticsTelecomTraffic->main_id=$model->id;
							$statisticsTelecomTraffic->num=str_replace(',','',$num);
							$statisticsTelecomTraffic->destination_id=$airTimeDestination->id;
							$statisticsTelecomTraffic->movement_id=$airTimeMovement->id;
							$statisticsTelecomTraffic->save(false);
						}
					}
				}
				
				//number of messages
				StatisticsTelecomMasseges::model()->deleteAll('main_id='.$model->id);
				$messageMovements=MessageMovement::model()->findAll(array('order'=>'t.id'));
				$airTimeDestinations=AirTimeDestination::model()->findAll(array('order'=>'t.id'));
				foreach ($messageMovements as $messageMovement){
					foreach ($airTimeDestinations as $airTimeDestination){
						if ($_POST['message_'.$airTimeDestination->id.'_'.$messageMovement->id] != ''){
							$num=$_POST['message_'.$airTimeDestination->id.'_'.$messageMovement->id];
							$statisticsTelecomMasseges=new StatisticsTelecomMasseges;
							$statisticsTelecomMasseges->main_id=$model->id;
							$statisticsTelecomMasseges->num=str_replace(',','',$num);
							$statisticsTelecomMasseges->destination_id=$airTimeDestination->id;
							$statisticsTelecomMasseges->movement_id=$messageMovement->id;
							$statisticsTelecomMasseges->save(false);
						}
					}
				}
				//tariff
				StatisticsTelecomTariff::model()->deleteAll('main_id='.$model->id);
				$telecomTariffs=TelecomTariff::model()->findAll(array('order'=>'t.id'));
				foreach ($telecomTariffs as $telecomTariff){
						if ($_POST['tariff_'.$telecomTariff->id] != ''){
							$num=$_POST['tariff_'.$telecomTariff->id];
							$statisticsTelecomTariff=new StatisticsTelecomTariff;
							$statisticsTelecomTariff->main_id=$model->id;
							$statisticsTelecomTariff->num=str_replace(',','',$num);
							$statisticsTelecomTariff->tariff_id=$telecomTariff->id;
							$statisticsTelecomTariff->save(false);
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

		if(isset($_POST['StatisticsTelecomMain']) && isset($_POST['update']))
		{
			$model->attributes=$_POST['StatisticsTelecomMain'];
			if($model->save()){
				//subcrition base
				StatisticsTelecomBase::model()->deleteAll('main_id='.$model->id);
				$telecomServices=TelecomService::model()->findAll(array('order'=>'t.id'));
				foreach ($telecomServices as $telecomService){
					
					if ($_POST['base_'.$telecomService->id] != ''){
						$num=$_POST['base_'.$telecomService->id];
						$statisticsTelecomBase=new StatisticsTelecomBase;
						$statisticsTelecomBase->main_id=$model->id;
						$statisticsTelecomBase->num=str_replace(',','',$num);
						$statisticsTelecomBase->service_id=$telecomService->id;
						$statisticsTelecomBase->save(false);
					}
				}
				
				//traffic air time
				StatisticsTelecomTraffic::model()->deleteAll('main_id='.$model->id);
				$airTimeMovements=AirTimeMovement::model()->findAll(array('order'=>'t.id'));
				$airTimeDestinations=AirTimeDestination::model()->findAll(array('order'=>'t.id'));
				foreach ($airTimeMovements as $airTimeMovement){
					foreach ($airTimeDestinations as $airTimeDestination){
						if ($_POST['traffic_'.$airTimeDestination->id.'_'.$airTimeMovement->id] != ''){
							$num=$_POST['traffic_'.$airTimeDestination->id.'_'.$airTimeMovement->id];
							$statisticsTelecomTraffic=new StatisticsTelecomTraffic;
							$statisticsTelecomTraffic->main_id=$model->id;
							$statisticsTelecomTraffic->num=str_replace(',','',$num);
							$statisticsTelecomTraffic->destination_id=$airTimeDestination->id;
							$statisticsTelecomTraffic->movement_id=$airTimeMovement->id;
							$statisticsTelecomTraffic->save(false);
						}
					}
				}
				
				//number of messages
				StatisticsTelecomMasseges::model()->deleteAll('main_id='.$model->id);
				$messageMovements=MessageMovement::model()->findAll(array('order'=>'t.id'));
				$airTimeDestinations=AirTimeDestination::model()->findAll(array('order'=>'t.id'));
				foreach ($messageMovements as $messageMovement){
					foreach ($airTimeDestinations as $airTimeDestination){
						if ($_POST['message_'.$airTimeDestination->id.'_'.$messageMovement->id] != ''){
							$num=$_POST['message_'.$airTimeDestination->id.'_'.$messageMovement->id];
							$statisticsTelecomMasseges=new StatisticsTelecomMasseges;
							$statisticsTelecomMasseges->main_id=$model->id;
							$statisticsTelecomMasseges->num=str_replace(',','',$num);
							$statisticsTelecomMasseges->destination_id=$airTimeDestination->id;
							$statisticsTelecomMasseges->movement_id=$messageMovement->id;
							$statisticsTelecomMasseges->save(false);
						}
					}
				}
				//tariff
				StatisticsTelecomTariff::model()->deleteAll('main_id='.$model->id);
				$telecomTariffs=TelecomTariff::model()->findAll(array('order'=>'t.id'));
				foreach ($telecomTariffs as $telecomTariff){
						if ($_POST['tariff_'.$telecomTariff->id] != ''){
							$num=$_POST['tariff_'.$telecomTariff->id];
							$statisticsTelecomTariff=new StatisticsTelecomTariff;
							$statisticsTelecomTariff->main_id=$model->id;
							$statisticsTelecomTariff->num=str_replace(',','',$num);
							$statisticsTelecomTariff->tariff_id=$telecomTariff->id;
							$statisticsTelecomTariff->save(false);
						}
				}
				
				$this->redirect(array('update','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('StatisticsTelecomMain');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new StatisticsTelecomMain('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StatisticsTelecomMain']))
			$model->attributes=$_GET['StatisticsTelecomMain'];

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
				$this->_model=StatisticsTelecomMain::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='statistics-telecom-main-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
