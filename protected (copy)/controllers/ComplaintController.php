<?php

class ComplaintController extends Controller
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
				'actions'=>array('create'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->getPermission("complaint")',
			),
			array('allow', 
				'actions'=>array('update','admin'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->getPermission("complaint")',
			),
			array('allow', 
				'actions'=>array('tcra','tcraList'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->getPermission("complaint")',
			),
			array('allow', 
				'actions'=>array('committee','committeeList'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->getPermission("complaint")',
			),
			array('allow', 
				'actions'=>array('tribunal','tribunalList'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->getPermission("complaint")',
			),
			array('allow', 
				'actions'=>array('view','viewList','print'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->getPermission("complaint")',
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
		$model=new Complaint;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Complaint']))
		{
			if(isset($_POST['Complaint']['ComplaintType'])){
				$my_types=$_POST['Complaint']['ComplaintType'];
				$model->complaintTypes=$my_types;
			}
			$model->attributes=$_POST['Complaint'];
			$model->status='Received';
			$model->stage='TCRA Action';
			if($model->save())
				$this->redirect(array('complaint/update','id'=>$model->id));
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

		if(isset($_POST['Complaint']))
		{
			if(isset($_POST['Complaint']['ComplaintType'])){
				$my_types=$_POST['Complaint']['ComplaintType'];
				$model->complaintTypes=$my_types;
			}
			$model->attributes=$_POST['Complaint'];
			if($model->save())
				$this->redirect(array('complaint/update','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionPrint()
	{
		$model=$this->loadModel();
		$heading="
					<table align=\"center\">
						<tr><td>UNITED REPUBLIC OF TANZANIA</td></tr>
						<tr><td>TANZANIA COMMUNICATIONS REGULATORY AUTHORITY</td></tr>
						<tr><td><img src=\"".dirname(__FILE__)."/../../images/logo.jpg\" /></td></tr>
					
					</table>
					";
		$html=$heading;
		$id=$model->id;	
		$complaintTypesTable="<table width=\"100%\" border=\"0\" class=\"detail-view\">
				<tr><td  style=\"background-color:#D7DEEE;\">NATURE OF COMPLAINT</td></tr>";
		$count=1;
		$color='#E5F1F4';
		foreach ($model->complaintTypes as $complaintType){
			$complaintTypesTable.="<tr style=\"background-color:$color;\"><td>$count. ".$complaintType->name."</td></tr>";
			if ($color=='#E5F1F4')
				$color='#F8F8F8';
			else 
				$color='#E5F1F4';
			$count++;
		}
		$complaintTypesTable.="
		 <tr>
		       	<td>&nbsp;</td>
		 </tr>
		</table>";
	
		$mainTable="
		<table width=\"100%\" border=\"0\" class=\"detail-view\">
		      <tr>
		        <td colspan=\"4\" style=\"background-color:#D7DEEE;\"><div align=\"left\">COMPLIANT DETAILS</div></td>
		        </tr>
		      <tr  style=\"background-color:#F8F8F8;\">
		        <td width=\"31%\" >Complainant:</td>
		        <td width=\"23%\">".$model->complainant->name."</td>
		        <td width=\"23%\">Repondent:</td>
		        <td width=\"23%\">".$model->respondent->name."</td>
		      </tr>
		      <tr  style=\"background-color:#E5F1F4;\">
		        <td>Description:</td>
		        <td>".$model->description."</td>
		        <td>Responce:</td>
		        <td>".$model->responce."</td>
		      </tr>
		      <tr   style=\"background-color:#F8F8F8;\">
		      	<td>Relief:</td>
		        <td>".$model->relief."</td>
		        <td>Relief Type:</td>
		        <td>".$model->reliefType->name."</td>
		        
		      </tr>
		      
		       <tr  style=\"background-color:#E5F1F4;\">
		      	<td >Verification and Investigation:</td>
		        <td>".$model->verification."</td>
		        <td>&nbsp;</td>
		        <td>&nbsp;</td>
		      </tr>
		      <tr>
		       	<td>&nbsp;</td>
		        <td>&nbsp;</td>
		      	<td>&nbsp;</td>
		        <td>&nbsp;</td>
		      </tr>
		      </table>
		      ";
		$declaration="
		<table width=\"100%\">
		      <tr>
		        <td colspan=\"4\" style=\"background-color:#D7DEEE;\"><div align=\"left\">DECLARATION</div></td>
		        </tr>
		      <tr style=\"background-color:#E5F1F4;\">
		        <td>Complainant:</td>
		        <td>".$model->verification_comp_signatory."</td>
		        <td>Date:</td>
		        <td>".$model->verification_comp_date."</td>
		      </tr>
		      
		      <tr style=\"background-color:#F8F8F8;\">
		        <td>TCRA Officer:</td>
		        <td>".$model->verification_tcra_signatory."</td>
		        <td>Date:</td>
		        <td>".$model->verification_tcra_date."</td>
		      </tr>
		      
		      <tr  style=\"background-color:#E5F1F4;\">
		        <td>Respondent:</td>
		        <td>".$model->verification_resp_signatory."</td>
		        <td>Date:</td>
		        <td>".$model->verification_resp_date."</td>
		      </tr>
			  <tr>
		       	<td>&nbsp;</td>
		        <td>&nbsp;</td>
		      	<td>&nbsp;</td>
		        <td>&nbsp;</td>
		      </tr>
		      
		    </table>
		";
		
		$historyTable="
		<table width=\"100%\">
		<tr style=\"background-color:#D7DEEE;\"><td colspan=\"5\">COMPLAINT HISTORY</td></tr>
		<tr style=\"background-color:#F8F8F8;font-weight:bold;\"><td width=\"12%\">Date</td><td width=\"20%\">Type of Decision</td><td width=\"20%\">Team</td><td width=\"30%\">Decision/Comment</td><td width=\"18%\">Stage</td></tr>";
		$logs=Log::model()->findAll("entity_id=$model->id AND entity_type='complaint'");
		$color='#E5F1F4';
		foreach ($logs as $log){
			$log_id=$log->id;
			$historyTable.="<tr style=\"background-color:$color;\"><td>".$log->day."</td><td>".$log->action."</td><td>".$log->team."</td><td>".$log->remarks."</td><td>".$log->stage."</td></tr>";
			if ($color=='#E5F1F4')
				$color='#F8F8F8';
			else 
				$color='#E5F1F4';
		}
		
		$historyTable.="</table>";
		$html.=$mainTable.$complaintTypesTable.$declaration.$historyTable;
		$pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf', 'P', 'cm', 'A4', true, 'UTF-8');
					$pdf->SetCreator(PDF_CREATOR);
					$pdf->SetAuthor("Mohamed Manja");
					$pdf->setPrintHeader(false);
					$pdf->setPrintFooter(false);
					$pdf->AliasNbPages();
					$pdf->AddPage();
					$pdf->writeHTML($html, true, false, true, false, '');
					$pdf->Output("compliant-".date('Y-m-d_H_i_s').".pdf", "D");
			

	}
	public function actionCommittee()
	{
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Complaint']))
		{
			$model->attributes=$_POST['Complaint'];
			if($model->save());
		}

		$this->render('committee',array(
			'model'=>$model,
		));
	}
	public function actionTcra()
	{
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Complaint']))
		{
			$model->attributes=$_POST['Complaint'];
			if($model->save());
		}

		$this->render('tcra',array(
			'model'=>$model,
		));
	}
	public function actionTribunal()
	{
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Complaint']))
		{
			$model->attributes=$_POST['Complaint'];
			if($model->save());
		}

		$this->render('tribunal',array(
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
		$dataProvider=new CActiveDataProvider('Complaint');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Complaint('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Complaint']))
			$model->attributes=$_GET['Complaint'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionCommitteeList()
	{
		$model=new Complaint('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Complaint']))
			$model->attributes=$_GET['Complaint'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionViewList()
	{
		$model=new Complaint('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Complaint']))
			$model->attributes=$_GET['Complaint'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionTribunalList()
	{
		$model=new Complaint('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Complaint']))
			$model->attributes=$_GET['Complaint'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionTcraList()
	{
		$model=new Complaint('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Complaint']))
			$model->attributes=$_GET['Complaint'];

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
				$this->_model=Complaint::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='complaint-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
