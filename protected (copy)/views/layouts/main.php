<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/file-upload.css" />
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/ajaxupload.3.5.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<!--div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div-->
	</div><!-- header -->

	<div id="topmenu" align="right">
	
		<?php 
			if (!Yii::app()->user->isGuest) 
				echo 'Logged in as: '.Yii::app()->user->name." <a href='".Yii::app()->createUrl('site/logout')."'>Logout</a>&nbsp;";
			else
				echo "<a href='".Yii::app()->createUrl('site/login')."'>Login</a>&nbsp;";

		?>
	</div><!-- mainmenu -->

	<!-- breadcrumbs -->

	<?php echo $content; ?>
	<div id='footer'>
		All rights Reserved.&copy 2009, Tanzania Communications Regulatory Authority<BR/><small>Developed by DataVision International</small>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
