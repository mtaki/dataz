<?php

class StatisticsPostalMainController extends Controller
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
				'expression'=>'Yii::app()->user->getPermission("statisticsPostal")',
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
		$model=new StatisticsPostalMain;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['StatisticsPostalMain'])  && isset($_POST['create']))
		{
			$model->attributes=$_POST['StatisticsPostalMain'];
			if ($model->save()){
				//subcrition base
				StatisticsPostalBase::model()->deleteAll('main_id='.$model->id);
				$postalCustomerTypes=PostalCustomerType::model()->findAll(array('order'=>'t.id'));
				foreach ($postalCustomerTypes as $postalCustomerType){
					
					if ($_POST['base_'.$postalCustomerType->id] != ''){
						$num=$_POST['base_'.$postalCustomerType->id];
						$statisticsPostalBase=new StatisticsPostalBase;
						$statisticsPostalBase->main_id=$model->id;
						$statisticsPostalBase->num=str_replace(',','',$num);
						$statisticsPostalBase->customer_type_id=$postalCustomerType->id;
						$statisticsPostalBase->save(false);
					}
				}
				//posted items
				StatisticsPostalTraffic::model()->deleteAll('main_id='.$model->id);
				$postalPostedItemTypes=PostalPostedItemType::model()->findAll(array('order'=>'t.id'));
				$airTimeDestinations=AirTimeDestination::model()->findAll(array('order'=>'t.id'));
				foreach ($postalPostedItemTypes as $postalPostedItemType){
					foreach ($airTimeDestinations as $airTimeDestination){
						if ($_POST['posted_'.$airTimeDestination->id.'_'.$postalPostedItemType->id] != ''){
							$num=$_POST['posted_'.$airTimeDestination->id.'_'.$postalPostedItemType->id];
							$statisticsPostalTraffic=new StatisticsPostalTraffic;
							$statisticsPostalTraffic->main_id=$model->id;
							$statisticsPostalTraffic->num=str_replace(',','',$num);
							$statisticsPostalTraffic->destination_id=$airTimeDestination->id;
							$statisticsPostalTraffic->posted_item_id=$postalPostedItemType->id;
							$statisticsPostalTraffic->save(false);
						}
					}
				}
				//delivered items
				StatisticsPostalMasseges::model()->deleteAll('main_id='.$model->id);
				$postalPostedItemTypes=PostalPostedItemType::model()->findAll(array('order'=>'t.id'));
				$airTimeDestinations=AirTimeDestination::model()->findAll(array('order'=>'t.id'));
				foreach ($postalPostedItemTypes as $postalPostedItemType){
					foreach ($airTimeDestinations as $airTimeDestination){
						$num_h=0;
						$num_o=0;
						$num_plb=0;
						if($_POST['delivered_'.$airTimeDestination->id.'_'.$postalPostedItemType->id.'_h'] != '')
							$num_h=$_POST['delivered_'.$airTimeDestination->id.'_'.$postalPostedItemType->id.'_h'];
						if($_POST['delivered_'.$airTimeDestination->id.'_'.$postalPostedItemType->id.'_o'] != '')
							$num_o=$_POST['delivered_'.$airTimeDestination->id.'_'.$postalPostedItemType->id.'_o'];	
						if($_POST['delivered_'.$airTimeDestination->id.'_'.$postalPostedItemType->id.'_plb'] != '')
							$num_plb=$_POST['delivered_'.$airTimeDestination->id.'_'.$postalPostedItemType->id.'_plb'];
							
							
						if ($num_h != 0 || $num_o != 0 || $num_plb != 0){
							$statisticsPostalMassege=new StatisticsPostalMasseges;
							$statisticsPostalMassege->main_id=$model->id;
							$statisticsPostalMassege->h_num=str_replace(',','',$num_h);
							$statisticsPostalMassege->o_num=str_replace(',','',$num_o);
							$statisticsPostalMassege->plb_num=str_replace(',','',$num_plb);
							$statisticsPostalMassege->destination_id=$airTimeDestination->id;
							$statisticsPostalMassege->posted_item_id=$postalPostedItemType->id;
							$statisticsPostalMassege->save(false);
						}
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

		if(isset($_POST['StatisticsPostalMain'])  && isset($_POST['update']))
		{
			$model->attributes=$_POST['StatisticsPostalMain'];
			if ($model->save()){
				//subcrition base
				StatisticsPostalBase::model()->deleteAll('main_id='.$model->id);
				$postalCustomerTypes=PostalCustomerType::model()->findAll(array('order'=>'t.id'));
				foreach ($postalCustomerTypes as $postalCustomerType){
					
					if ($_POST['base_'.$postalCustomerType->id] != ''){
						$num=$_POST['base_'.$postalCustomerType->id];
						$statisticsPostalBase=new StatisticsPostalBase;
						$statisticsPostalBase->main_id=$model->id;
						$statisticsPostalBase->num=str_replace(',','',$num);
						$statisticsPostalBase->customer_type_id=$postalCustomerType->id;
						$statisticsPostalBase->save(false);
					}
				}
				//posted items
				StatisticsPostalTraffic::model()->deleteAll('main_id='.$model->id);
				$postalPostedItemTypes=PostalPostedItemType::model()->findAll(array('order'=>'t.id'));
				$airTimeDestinations=AirTimeDestination::model()->findAll(array('order'=>'t.id'));
				foreach ($postalPostedItemTypes as $postalPostedItemType){
					foreach ($airTimeDestinations as $airTimeDestination){
						if ($_POST['posted_'.$airTimeDestination->id.'_'.$postalPostedItemType->id] != ''){
							$num=$_POST['posted_'.$airTimeDestination->id.'_'.$postalPostedItemType->id];
							$statisticsPostalTraffic=new StatisticsPostalTraffic;
							$statisticsPostalTraffic->main_id=$model->id;
							$statisticsPostalTraffic->num=str_replace(',','',$num);
							$statisticsPostalTraffic->destination_id=$airTimeDestination->id;
							$statisticsPostalTraffic->posted_item_id=$postalPostedItemType->id;
							$statisticsPostalTraffic->save(false);
						}
					}
				}
				//delivered items
				StatisticsPostalMasseges::model()->deleteAll('main_id='.$model->id);
				$postalPostedItemTypes=PostalPostedItemType::model()->findAll(array('order'=>'t.id'));
				$airTimeDestinations=AirTimeDestination::model()->findAll(array('order'=>'t.id'));
				foreach ($postalPostedItemTypes as $postalPostedItemType){
					foreach ($airTimeDestinations as $airTimeDestination){
						$num_h=0;
						$num_o=0;
						$num_plb=0;
						if($_POST['delivered_'.$airTimeDestination->id.'_'.$postalPostedItemType->id.'_h'] != '')
							$num_h=$_POST['delivered_'.$airTimeDestination->id.'_'.$postalPostedItemType->id.'_h'];
						if($_POST['delivered_'.$airTimeDestination->id.'_'.$postalPostedItemType->id.'_o'] != '')
							$num_o=$_POST['delivered_'.$airTimeDestination->id.'_'.$postalPostedItemType->id.'_o'];	
						if($_POST['delivered_'.$airTimeDestination->id.'_'.$postalPostedItemType->id.'_plb'] != '')
							$num_plb=$_POST['delivered_'.$airTimeDestination->id.'_'.$postalPostedItemType->id.'_plb'];
							
							
						if ($num_h != 0 || $num_o != 0 || $num_plb != 0){
							$statisticsPostalMassege=new StatisticsPostalMasseges;
							$statisticsPostalMassege->main_id=$model->id;
							$statisticsPostalMassege->h_num=str_replace(',','',$num_h);
							$statisticsPostalMassege->o_num=str_replace(',','',$num_o);
							$statisticsPostalMassege->plb_num=str_replace(',','',$num_plb);
							$statisticsPostalMassege->destination_id=$airTimeDestination->id;
							$statisticsPostalMassege->posted_item_id=$postalPostedItemType->id;
							$statisticsPostalMassege->save(false);
						}
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
		$dataProvider=new CActiveDataProvider('StatisticsPostalMain');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new StatisticsPostalMain('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StatisticsPostalMain']))
			$model->attributes=$_GET['StatisticsPostalMain'];

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
				$this->_model=StatisticsPostalMain::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='statistics-postal-main-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
