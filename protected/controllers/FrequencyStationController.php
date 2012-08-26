<?php

class FrequencyStationController extends Controller
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
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model=new FrequencyStation;
    	if(isset($_POST['FrequencyStation']))
    	{
		     
		     $model->attributes=$_POST['FrequencyStation'];
		    
		     $valid=$model->validate();
	 
		     if($valid)
		     {
					$model->status='In use';
				    $model->save(false);
					//insert log
						$log=new Log;
						$log->username=Yii::app()->user->name;
						$log->entity_type='frequency_station';
						$log->entity_id=$model->id;
						$log->time=date("Y-m-d H:i:s");
						$log->action='Create';
						$log->day=date("Y-m-d");
						$log->remarks='';
						$log->status='Created';
						$log->team='';
						$log->stage='';
						$log->save(false);
						$this->redirect(array('update','id'=>$model->id));
					
		     }
    	}else	{
			$model->station_type_id=$_GET['category'];
		}
 
    	$this->render('create', array(
        'model'=>$model,
    	));

	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
public function actionNew()
	{
		
		$model=new FrequencyStation;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(!empty($_POST['category']))
		{
					
				$this->redirect(array('create','category'=>$_POST['category']));
			
		}

		$this->render('new',array(
			'model'=>$model,
		));
	}
	public function actionUpdate()
	{
		$model=$this->loadModel();
		$frequencyStationEquipmentManager=new FrequencyStationEquipmentManager;
 		$frequencyStationFrequencyManager=new FrequencyStationFrequencyManager;
 		
 		if (isset($_POST['FrequencyStation'])){
 			 $model->attributes=$_POST['FrequencyStation'];
 			 $frequencyStationEquipmentManager->manage($_POST['FrequencyStationEquipment']);
 			 $frequencyStationFrequencyManager->manage($_POST['FrequencyStationFrequency']);
 		}else{
 			 $frequencyStationEquipmentManager=FrequencyStationEquipmentManager::load($model);
 			 $frequencyStationFrequencyManager=FrequencyStationFrequencyManager::load($model);
 		}


		if(isset($_POST['FrequencyStation'],$_POST['update']))
		{
			$valid=$model->validate();
            $valid=$frequencyStationEquipmentManager->validate($model) && $valid;
            $valid=$frequencyStationFrequencyManager->validate($model) && $valid;
            if($valid==true)
            {		
            		$model->licence_date=date("d-m-Y",strtotime($model->licence_date));
                    $model->save();
                    $frequencyStationEquipmentManager->save($model);
                    $frequencyStationFrequencyManager->save($model);
                    
            }
		}

		$this->render('update',array(
			'model'=>$model,
			'frequencyStationEquipmentManager'=>$frequencyStationEquipmentManager,
			'frequencyStationFrequencyManager'=>$frequencyStationFrequencyManager,
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
		$dataProvider=new CActiveDataProvider('FrequencyStation');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new FrequencyStation('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FrequencyStation']))
			$model->attributes=$_GET['FrequencyStation'];

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
				$this->_model=FrequencyStation::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='frequency-station-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
