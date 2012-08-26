<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>'protected',
	'name'=>'TCRA Management Information System',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1234',
			// 'ipFilters'=>array(...a list of IPs...),
			// 'newFileMode'=>0666,
			// 'newDirMode'=>0777,
		),
	),
	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			//'allowAutoLogin'=>true,
			'class' => 'WebUser',
	
		),
		'request'=>array(
            'enableCookieValidation'=>true,
        ),
		
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>true,
			'rules'=>array(
				
			),
		),
		
		
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=tcra',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '1234',
			'charset' => 'utf8',
			'enableParamLogging'=>true,
    		'enableProfiling'=>true,

		),
		'dbdata'=>array(
			'class'=>'CDbConnection',
			'connectionString' => 'dblib:host=127.0.0.1;dbname=TCRAData',
			'username' => 'sa',
			'password' => '1234',
		),
		'dbcontrol'=>array(
			'class'=>'CDbConnection',
			'connectionString' => 'dblib:host=127.0.0.1;dbname=TCRAControl',
			'username' => 'sa',
			'password' => '1234',
		),
		'dbproduct'=>array(
			'class'=>'CDbConnection',
			'connectionString' => 'dblib:host=127.0.0.1;dbname=Northwind',
			'username' => 'sa',
			'password' => '1234',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning,info',
				),
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	
	'params'=>array(
		//email
		'SMTPAuth'=>true,
		'SMTPSecure'=>"ssl",
		'Host'=>"smtp.gmail.com",
		'Port' => 465,
		'Username' => "manjatesting",
		'Password' => "mohaya19",
		
		
		'datePickerFormat'=>'dd-mm-yy',//date picker
		'serverAddress'=>'http://test.tcra.go.tz',//server address
		'emailSystem'=>'noreply@tcra.go.tz',//system email
	
		//emails for notifications
		'emailLegal'=>'mohamedmanja@gmail.com',
		'emailPostal'=>'mohamedmanja@gmail.com',
		'emailSpectrum'=>'mohamedmanja@gmail.com',
		'emailBroadcasting'=>'mohamedmanja@gmail.com',
		'emailNumbering'=>'mohamedmanja@gmail.com',
		'emailComplaint'=>'mohamedmanja@gmail.com',
		'emailStatistics'=>'mohamedmanja@gmail.com',
		'emailAccounts'=>'mohamedmanja@gmail.com',
		'emailAdmin'=>'mohamedmanja@gmail.com',
		
	),
	
			
	
);
