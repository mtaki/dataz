<?php

class StatisticsEmploymentMainController extends Controller
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
				'expression'=>'Yii::app()->user->getPermission("statisticsEmployment")',
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
		$model=new StatisticsEmploymentMain;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['StatisticsEmploymentMain']) && isset($_POST['create']))
		{
			$model->attributes=$_POST['StatisticsEmploymentMain'];
			if($model->save()){
				//subscription base
				StatisticsEmploymentBase::model()->deleteAll('main_id='.$model->id);
				$employeeTypes=EmployeeType::model()->findAll(array('order'=>'t.id'));
				foreach ($employeeTypes as $employeeType){
					$num_m=$num_n=0;
					if ($_POST['base_m_'.$employeeType->id] != '')
						$num_m=$_POST['base_m_'.$employeeType->id];
					if ($_POST['base_n_'.$employeeType->id] != '')
						$num_n=$_POST['base_n_'.$employeeType->id];
					if ($num_m != 0 || $num_n != 0){
						$statisticsEmploymentBase=new StatisticsEmploymentBase();
						$statisticsEmploymentBase->main_id=$model->id;
						$statisticsEmploymentBase->num_managerial=str_replace(',','',$num_m);
						$statisticsEmploymentBase->num_non_managerial=str_replace(',','',$num_n);
						$statisticsEmploymentBase->employee_type_id=$employeeType->id;
						$statisticsEmploymentBase->save(false);
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

		if(isset($_POST['StatisticsEmploymentMain']) && isset($_POST['update']))
		{
			$model->attributes=$_POST['StatisticsEmploymentMain'];
			if($model->save()){
				//subscription base
				StatisticsEmploymentBase::model()->deleteAll('main_id='.$model->id);
				$employeeTypes=EmployeeType::model()->findAll(array('order'=>'t.id'));
				foreach ($employeeTypes as $employeeType){
					$num_m=$num_n=0;
					if ($_POST['base_m_'.$employeeType->id] != '')
						$num_m=$_POST['base_m_'.$employeeType->id];
					if ($_POST['base_n_'.$employeeType->id] != '')
						$num_n=$_POST['base_n_'.$employeeType->id];
					if ($num_m != 0 || $num_n != 0){
						$statisticsEmploymentBase=new StatisticsEmploymentBase();
						$statisticsEmploymentBase->main_id=$model->id;
						$statisticsEmploymentBase->num_managerial=str_replace(',','',$num_m);
						$statisticsEmploymentBase->num_non_managerial=str_replace(',','',$num_n);
						$statisticsEmploymentBase->employee_type_id=$employeeType->id;
						$statisticsEmploymentBase->save(false);
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
		$dataProvider=new CActiveDataProvider('StatisticsEmploymentMain');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new StatisticsEmploymentMain('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StatisticsEmploymentMain']))
			$model->attributes=$_GET['StatisticsEmploymentMain'];

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
				$this->_model=StatisticsEmploymentMain::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='statistics-employment-main-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
