<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public $layout='column2';
	
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
			
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/column2.php'
		if (Yii::app()->user->isGuest)
			$this->redirect(array('login'));
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout='login';
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	public function actionPrintDocs()
	{	
		$this->layout='plain';
		$this->render('docProcessor');
	}
	public function actionUpload()
	{	
		$uploaddir = dirname(__FILE__).'/../../uploads/'; 

		$module=$_REQUEST['module'];
		$id=$_REQUEST['entity_id'];
		$action_stage=$_REQUEST['action_stage'];
		$f=basename($_FILES['uploadfile']['name']);
		$file = $uploaddir.$module.'_'.$id.'_'.$action_stage.'_'.basename($_FILES['uploadfile']['name']);
		
		
		if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
		  echo "success";
		  $doc=new Document;
		  $doc->entity_id=$id;
		  $doc->entity_type=$module;
		  $doc->name=$f;
		  $doc->path=$module.'_'.$id.'_'.$action_stage.'_'.basename($_FILES['uploadfile']['name']);
		  $doc->stage=$action_stage;
		  $doc->save(false);
		} else {
			echo "error";
		}
	}
}
