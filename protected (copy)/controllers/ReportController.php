<?php

class ReportController extends Controller
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
				'actions'=>array('generate','admin'), 
				'users'=>array('@'),
			),
			array('allow', 
				'actions'=>array('create','delete','update','view'), 
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->getPermission("reportAdmin")',
			),
			
			array('allow', 
				'actions'=>array('statisticsList','licencingList','accountsList','systemUnitList','spectrumList','broadcastingList','numberingList','complaintList'), 
				'users'=>array('@'),
			),
			array('allow',
				'actions'=>array('complaintList'), 
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->getPermission("reportComplaint")',
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
		$model=new Report;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Report']))
		{
			$model->attributes=$_POST['Report'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['Report']))
		{
			$model->attributes=$_POST['Report'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function actionGenerate()
	{
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$rules=array();
		$labels=array();
		for($i=1;$i<=5;$i++){
			$attr='type'.$i;
			$attrValue=$model->$attr;
			$field='field'.$i;
			$input='input'.$i;
			$labels[$input]=$model->$field;
			if ($attrValue=='date')
				$rules[$i-1]=array($input,'type', 'type'=>$attrValue,'dateFormat' => 'dd-MM-yyyy');
			elseif($attrValue=='numerical'){
				$rules[$i-1]=array($input,$attrValue);
			}
			
		}
		$model->setRules($rules);
		$model->setLabels($labels);
		if(isset($_POST['generateReport']))
		{
			
			for($i=1;$i<=5;$i++){
				$attr='input'.$i;
				
				if(!empty($_POST[$attr])){
					$model->$attr=$_POST[$attr];
				}
			}
			
			if ($model->validate()){
				$model=Report::model()->findByPk($model->id);
				//$this->layout='plain';
				$sql=$model->sql;
				//create where condition of sql
				$whereOrHaving='';
				if ($model->use_having == 'Yes')
					$whereOrHaving='having';
				else
					$whereOrHaving='where';
				$where='';
		
				if (!empty($model->sql_where) && $whereOrHaving=='where'){
					$where="	$whereOrHaving ".$model->sql_where;
				}
				for($i=1;$i<=5;$i++){
					$attr='input'.$i;
					$column='column'.$i;
					$condition='condition'.$i;
					$type='type'.$i;
					$typeValue=$model->$type;
					$attrValue=$model->$attr;
					$conditionValue=$model->$condition;
					$columnValue=$model->$column;
					if(!empty($_POST[$attr])){
						$value=$_POST[$attr];
						if($typeValue=='date')
							$value=date('Y-m-d',strtotime($value));
						
						if ($condition == 'like'){
							$mysearch="$columnValue $conditionValue '%$value%'";
						}
						else{
							$mysearch="$columnValue $conditionValue '$value'";
						}
						if($typeValue=='quarter'){
							if ($value==1)
								$myquarter="'January','February','March'";
							if ($value==2)
								$myquarter="'April','May','June'";
							if ($value==3)
								$myquarter="'July','August','September'";
							if ($value==4)
								$myquarter="'October','November','December'";
							$mysearch="$columnValue IN ($myquarter)";
						}
						if($typeValue=='quarterNumber'){
							
							$mysearch="$columnValue between ($value*3 - 2) and ($value*3)";
						}
						
						if (empty($where))
							$where=" $whereOrHaving $mysearch"; 
						else
							$where.=" and $mysearch";
					}
				}
				if ($whereOrHaving=='where'){
					$sql.=' '.$where;
					if (!empty($model->sql_group)){
						$sql.=' group by '.$model->sql_group;
					}
				}else{ //use having
					
					if (!empty($model->sql_where)){
						$sql.=' where '.$model->sql_where;
					}
					if (!empty($model->sql_group)){
						$sql.=' group by '.$model->sql_group;
					}
					$sql.=' '.$where;
				}
	
				if (!empty($model->sql_order)){
					$sql.=' order by '.$model->sql_order;
				}
				//echo $sql;
				///*//
				$continue=false;
				Yii::log($sql);
				$command=Yii::app()->getDb()->createCommand($sql);
				$row=$command->queryRow();
				$use_file=false;
				if (strlen($model->file_name) > 2)
					$use_file=true;
				if (!empty($row)){
					$rs=$command->queryAll(false);
					$keys=array_keys($row);
					$continue=true;
				}
				$reportName=str_replace(' ','_',$model->name);
				$reportName=str_replace('-','_',$reportName);
				if ($use_file && $continue){
					header("Pragma: public");
    				header("Expires: 0");
    				header("Content-Type: application/vnd.ms-word");
    				header("Content-Disposition: attachment;filename=".$reportName.date('_Y_m_d_H_i_s').".doc");
					$this->layout='plain';
					$this->render($model->file_name,array(
						'model'=>$model,'rs'=>$rs
					));
					Yii::app()->end();
				}
				
				if ($_POST['export']=='excel' && $continue && !$use_file){
					// Send Header
    				header("Pragma: public");
    				header("Expires: 0");
    				header("Content-Type: application/vnd.ms-excel");
    				header("Content-Disposition: attachment;filename=".$reportName.date('_Y_m_d_H_i_s').".xls");
    				header("Content-Transfer-Encoding: binary");
					
			    	// XLS Data Cell
					$this->xlsBOF();
					for($i=0;$i<count($keys);$i++){
						$this->xlsWriteLabel(0,$i,$keys[$i]);
					}
					$rowNumber=1;
					foreach ($rs as $row){
						for($i=0;$i<count($keys);$i++){
							//$this->xlsWriteLabel($rowNumber,$i,''.$row[$i]);
							if (is_numeric($row[$i]) && (substr($row[$i], 0, 1)!='0' || $row[$i]==0))
								$this->xlsWriteNumber($rowNumber,$i,''.$row[$i]);
							else
								$this->xlsWriteLabel($rowNumber,$i,''.$row[$i]);
						}
						$rowNumber++;
					}
					$this->xlsEOF();
				}elseif ($_POST['export']=='pdf' && $continue && !$use_file){
					$title="$model->name Report";
					if (!empty($_POST['customTitle']))
						$title=$_POST['customTitle'];
					$heading="
					<table align=\"center\">
						<tr><td>UNITED REPUBLIC OF TANZANIA</td></tr>
						<tr><td>TANZANIA COMMUNICATIONS REGULATORY AUTHORITY</td></tr>
						<tr><td><img src=\"".dirname(__FILE__)."/../../images/logo.jpg\" /></td></tr>
						<tr><td align=\"left\">$title</td></tr>
					</table>
					";
					$table=$heading."<table cellspacing=\"3\" border-color=\"white\">";
					$table.='<tr style="background-color:#D7DEEE;">';
					for($i=0;$i<count($keys);$i++){
						$table.='<td>'.$keys[$i].'</td>';
					}
					$table.='</tr>';
					$rowColor="#E5F1F4";
					foreach ($rs as $row){
						$table.="<tr bgcolor=\"$rowColor\">";
						for($i=0;$i<count($keys);$i++){
							$table.='<td >'.$row[$i].'</td>';
						}
						$table.='</tr>';
						if ($rowColor=='#E5F1F4')
							$rowColor='#F8F8F8';
						else 
							$rowColor='#E5F1F4';
					}
					$table.="</table>";
					$html=$table;
					$pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf', 'P', 'cm', 'A4', true, 'UTF-8');
					$pdf->SetCreator(PDF_CREATOR);
					$pdf->SetAuthor("TCRA MIS");
					$pdf->setPrintHeader(false);
					$pdf->setPrintFooter(false);
					$pdf->AliasNbPages();
					$pdf->AddPage();
					$pdf->writeHTML($html, true, false, true, false, '');
					$pdf->Output($reportName.date('_Y_m_d_H_i_s').".pdf", "D");
				}else{
					$this->render('generate',array(
						'model'=>$model,
					));
				}
			}else {
				$this->render('generate',array(
				'model'=>$model,
				));
			}
			
		}else
			$this->render('generate',array(
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
		$dataProvider=new CActiveDataProvider('Report');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Report('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Report']))
			$model->attributes=$_GET['Report'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionLicencingList()
	{
		$model=new Report('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Report']))
			$model->attributes=$_GET['Report'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionAccountsList()
	{
		$model=new Report('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Report']))
			$model->attributes=$_GET['Report'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionSystemUnitList()
	{
		$model=new Report('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Report']))
			$model->attributes=$_GET['Report'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionSpectrumList()
	{
		$model=new Report('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Report']))
			$model->attributes=$_GET['Report'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionBroadcastingList()
	{
		$model=new Report('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Report']))
			$model->attributes=$_GET['Report'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionNumberingList()
	{
		$model=new Report('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Report']))
			$model->attributes=$_GET['Report'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionComplaintList()
	{
		$model=new Report('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Report']))
			$model->attributes=$_GET['Report'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionStatisticsList()
	{
		$model=new Report('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Report']))
			$model->attributes=$_GET['Report'];

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
				$this->_model=Report::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='report-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	function xlsBOF() {
    echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);  
    return;
	}

	function xlsEOF() {
		 echo pack("ss", 0x0A, 0x00);
		 return;
	}

	function xlsWriteNumber($Row, $Col, $Value) {
		 echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
		 echo pack("d", $Value);
		 return;
	}

	function xlsWriteLabel($Row, $Col, $Value ) {
		 $L = strlen($Value);
		 echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
		 echo $Value;
	return;
	}
}
