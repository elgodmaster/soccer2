<?php

// uncomment the following to define a path alias
 //Yii::setPathOfAlias('UploadHandler','../../blue/server/php');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'SOCCER2',
	'theme'=>'bootstrap',	

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.jasPHP.*',
		'ext.yiimailer.YiiMailer'	
	),
		'aliases' => array(
				//If you used composer your path should be
			//	'xupload' => 'ext.vendor.asgaroth.xupload',
				//If you manually installed it
				'xupload' => 'ext.xupload'
		),

		
		
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'natax621',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			
				'generatorPaths'=>array(
						'bootstrap.gii',
				),
		),
		
	),

	// application components
	'components'=>array(
	
	'facebook'=>array(
			'class' => 'ext.yii-facebook-opengraph.SFacebook',
			'appId'=>'799321876751692', // needed for JS SDK, Social Plugins and PHP SDK
			'secret'=>'40cd488a3a3d0daa774e92e22e9cf032', // needed for the PHP SDK
			//'fileUpload'=>false, // needed to support API POST requests which send files
			//'trustForwarded'=>false, // trust HTTP_X_FORWARDED_* headers ?
			//'locale'=>'en_US', // override locale setting (defaults to en_US)
			//'jsSdk'=>true, // don't include JS SDK
			//'async'=>true, // load JS SDK asynchronously
			//'jsCallback'=>false, // declare if you are going to be inserting any JS callbacks to the async JS SDK loader
			//'status'=>true, // JS SDK - check login status
			'cookie'=>true, // JS SDK - enable cookies to allow the server to access the session
			//'oauth'=>true,  // JS SDK - enable OAuth 2.0
			//'xfbml'=>true,  // JS SDK - parse XFBML / html5 Social Plugins
			//'frictionlessRequests'=>true, // JS SDK - enable frictionless requests for request dialogs
			//'html5'=>true,  // use html5 Social Plugins instead of XFBML
			'ogTags'=>array(  // set default OG tags
			'og:title'=>'Scoccer2',
			'og:description'=>'Ligas de futbol',
					//'og:image'=>'URL_TO_WEBSITE_LOGO',
					),
			),
	
		'user'=>array(
			// enable cookie-based authentication 
			'allowAutoLogin'=>true,
		),
		'jasPHP' => array('class' => 'JasPHP'),
			
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		//'db'=>array(
			//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		//),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=soccer',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		
		
		'phpThumb'=>array(
				'class'=>'ext.EPhpThumb.EPhpThumb',
				'options'=>array()
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
					'levels'=>'error',
				),
				// uncomment the following to show log messages on web pages
				
				array(
					'class'=>'CWebLogRoute',
				),	
				
			),
		),
		
		'bootstrap'=>array(
				'class'=>'bootstrap.components.Bootstrap',
		),
		
		
		'ePdf' => array(
				'class'         => 'ext.yii-pdf.EYiiPdf',
				'params'        => array(
						'mpdf'     => array(
								'librarySourcePath' => 'application.vendors.mpdf.*',
								'constants'         => array(
										'_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
								),
								'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
								/*'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
										'mode'              => '', //  This parameter specifies the mode of the new document.
										'format'            => 'A4', // format A4, A5, ...
										'default_font_size' => 0, // Sets the default document font size in points (pt)
										'default_font'      => '', // Sets the default font-family for the new document.
										'mgl'               => 15, // margin_left. Sets the page margins for the new document.
										'mgr'               => 15, // margin_right
										'mgt'               => 16, // margin_top
										'mgb'               => 16, // margin_bottom
										'mgh'               => 9, // margin_header
										'mgf'               => 9, // margin_footer
										'orientation'       => 'P', // landscape or portrait orientation
								)*/
		),
		'HTML2PDF' => array(
				'librarySourcePath' => 'application.vendors.html2pdf.*',
				'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
								/*'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
										'orientation' => 'P', // landscape or portrait orientation
				'format'      => 'A4', // format A4, A5, ...
				'language'    => 'en', // language: fr, en, it ...
				'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
				'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
				'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
		)*/
		)
		),
		),
		
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'jjnataren@hotmail.com',
	),
);