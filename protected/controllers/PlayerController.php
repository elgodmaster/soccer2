<?php

class PlayerController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	
		
	
	public function actions()
	{
		return array(
				'upload'=>array(
						'class'=>'xupload.actions.XUploadAction',
						'path' =>Yii::app() -> getBasePath() . "/../uploads",
						'publicPath' => Yii::app() -> getBaseUrl() . "/uploads",
				),
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','report','upload', 'uploadTest'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','updateDocumentation','updateDocumentation2','deleteDocument','report','upload','uploadTest'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','updateDocumentation','updateDocumentation2','deleteDocument','report','upload','uploadTest'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		
		$documentPlayer = new DocumentPlayer();
		$documentPlayer->ID_PLAYER = $id;
		$documentPlayer->STATUS = 1;
		$documentPlayer->ID_DOCUMENT = 1;
		$document = null;
		
		
		foreach ($documentPlayer->search()->getData() as $document){
		}
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'documentModel'=>$document,	
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Player;
		$document = new DocumentPlayer();
	    
		$document->ID_DOCUMENT = 1;
		$document->ID_PLAYER = 1;
		$document->NAME = 'Acta de Juanito Perez';
		$document->PATH='En case la verga';
		$document->SIZE=2;
		
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Player']))
		{
			$model->attributes=$_POST['Player'];
			//$document->save();
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Player']))
		{
			$model->attributes=$_POST['Player'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	
	


	/**
	 * Delete a particular Document of The Player.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param string $file name of the document
	 */
	public function actionDeleteDocument($file)	
	{
		
		$document=DocumentPlayer::model()->find('NAME=:NAME', array(':NAME'=>$file));
		
		if($document===null)
			throw new CHttpException(404,'The requested page does not exist.');
		$document->STATUS = 0;
		$document->save();
		
	}
	

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdateDocumentation2($id)
	{
		
		
	//	$document=Document::model()->find('DESCRIPTION=:DESCRIPTION', array(':DESCRIPTION'=>'Fotito'));
		//$document->DESCRIPTION = 'Hola a todods';
	//	$document->save();
		
		//Yii::import( "xupload.models.XUploadForm" );
		//$photos = new XUploadForm;
	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	
	
		//error_reporting(E_ALL | E_STRICT);
		//Yii::setPathOfAlias('UploadHandler', Yii::app()->request->baseUrl.'/blue/server/php/UploadHandler.php');
		//Yii::import('UploadHandler', true);
		
		
			$upload_handler = new UploadHandler();
	
		//	require_once Yii::app()->request->baseUrl.'/blue/server/php/UploadHandler.php';
	/*
		if(isset($_POST['Player']))
		{
			$model->attributes=$_POST['Player'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
		}
	
		$this->render('updateDocumentationTest',array(
				'model'=>$model,
				'documentModel'=>$document,
				'catDocumentModel'=>$catDocument,
				//	'photoModel'=>$photos,
		));*/
	}
	
	
	
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdateDocumentation($id)
	{
		$model=$this->loadModel($id);
		
		$document = new DocumentPlayer();
		$catDocument = new Document();

		
		$documents = $model->documents;
		
	
		
		if(isset($_POST['Player']))
		{
			$model->attributes=$_POST['Player'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
		}
	
		
		Yii::import("xupload.models.XUploadForm");
		$fileModel = new XUploadForm;
		
		
		$this->render('updateDocumentationTest',array(
				'model'=>$model,
				'documentModel'=>$document,
				'documents'=>$documents,
				'catDocumentModel'=>$catDocument,
				'fileModel'=> $fileModel,
			//	'file'=>$json,
			//	'photoModel'=>$photos,
		));
		
		
	
		
		
	
	}
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

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
		$dataProvider=new CActiveDataProvider('Player');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	
	/**
	 * Displays a particular report of model.'dataProvider'=>$dataProvider,
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionReport($id)
	{
	
	
	
	
		//$this->render('testReport', array());
	
	
		$model = $this->loadModel($id);
		
		$dataProvider=new CActiveDataProvider('Tournament');
	
	
		# mPDF
		//$mPDF1 = Yii::app()->ePdf->mpdf();
	
		# You can easily override default constructor's params
		$mPDF1 = Yii::app()->ePdf->mpdf('win-1252','A4','','',20,15,48,25,10,10);
	
	
		$mPDF1->useOnlyCoreFonts = true;    // false is default
		$mPDF1->SetProtection(array('print'));
		$mPDF1->SetTitle("Acme Trading Co. - Invoice");
		$mPDF1->SetAuthor("Acme Trading Co.");
		$mPDF1->SetWatermarkText("SOCCER");
		$mPDF1->showWatermarkText = true;
		$mPDF1->watermark_font = 'DejaVuSansCondensed';
		$mPDF1->watermarkTextAlpha = 0.1;
		$mPDF1->SetDisplayMode('fullpage');
	
	
		$documentPlayer = new DocumentPlayer();
		$documentPlayer->ID_PLAYER = $id;
		$documentPlayer->STATUS = 1;
		$documentPlayer->ID_DOCUMENT = 1;
		$document = null;
		
		
		foreach ($documentPlayer->search()->getData() as $document){
		}
	
	
		# render (full page)
		//	$mPDF1->WriteHTML($this->render('index', array('dataProvider'=>$dataProvider), true));
	
		# Load a stylesheet
		//	$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/main.css');
		//		$mPDF1->WriteHTML($stylesheet, 1);
	
	
		# renderPartial (only 'view' of current controller)
		//$mPDF1->WriteHTML($this->renderPartial('view', array(), true));
		# Renders image
		//$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/bg.gif' ));
		$mPDF1->WriteHTML($this->renderPartial('reports/credentialReport', array('model'=>$model, 'documentModel'=>$document),true));
		# Outputs ready PDF
		$mPDF1->Output();
	
	
	
		//$html2pdf = Yii::app()->ePdf->HTML2PDF();
		//$html2pdf->WriteHTML($this->render('update', array('model'=>$this->loadModel($id),), true));
		//$html2pdf->Output();
	
	
		//	Yii::app()->jasPHP->create(getcwd() . '/reports/', 'report1.jrxml', array('title' => $title,));
	
		//	Yii::app()->jasPHP->create(getcwd() . '/reports/', 'report1.jrxml', array('title' => $title,), array('property1' => $title,));
	
		//Yii::import('application.extensions.ireport.*');
	
		//$AReport = new IReport(dirname(__FILE__) . '/hello.jrxml');
	
		//$AReport->parameters = array("title"=>1);
	
		//$AReport->execute();
	
		//$this->render('index');
	
	
	}
	
	
	public function actionUploadTestsss($id){
		
			Yii::import("xupload.models.XUploadForm");
		
			$model = new XUploadForm();
		
	}
	
	
	public function actionUploadTest($id){
	
		Yii::import( "xupload.models.XUploadForm" );
		//Here we define the paths where the files will be stored temporarily
		$path = realpath( Yii::app( )->getBasePath( )."/../uploads" )."/players/{$id}/";
		$publicPath = Yii::app( )->getBaseUrl( )."/uploads/players/{$id}/";
		
		//This is for IE which doens't handle 'Content-type: application/json' correctly
		header( 'Vary: Accept' );
		if( isset( $_SERVER['HTTP_ACCEPT'] )
		&& (strpos( $_SERVER['HTTP_ACCEPT'], 'application/json' ) !== false) ) {
			header( 'Content-type: application/json' );
		} else {
			header( 'Content-type: text/plain' );
		}
		
		//Here we check if we are deleting and uploaded file
		if( isset( $_GET["_method"] ) ) {
			if( $_GET["_method"] == "delete" ) {
				if( $_GET["file"][0] !== '.' ) {
					$file = $path.$_GET["file"];
					if( is_file( $file ) ) {
						
						$idDocumentPlayer = $_GET["idDocumentPlayer"];
						
						$documentPlayer =  DocumentPlayer::model()->findByPk($idDocumentPlayer);	
											
						$documentPlayer->STATUS = 0;
						
						$documentPlayer->save();
						
						unlink( $file );
					}
				}
				echo json_encode( true );
			}
		} else {
			$model = new XUploadForm;
			$model->file = CUploadedFile::getInstance( $model, 'file' );
			//We check that the file was successfully uploaded
			if( $model->file !== null ) {
				//Grab some data
				$model->mime_type = $model->file->getType( );
				$model->size = $model->file->getSize( );
				$model->name = $model->file->getName( );
				//(optional) Generate a random name for our file
				$filename = md5( Yii::app( )->user->id.microtime( ).$model->name);
				$filename .= ".".$model->file->getExtensionName( );
				if( $model->validate( ) ) {
					
					if( !is_dir( $path.'thumbs/' ) ) {
						mkdir( $path.'thumbs/',0777,true);
					}
					
					//Move our file to our temporary dir
					$model->file->saveAs( $path.$filename );
					chmod( $path.$filename, 0777 );
					//here you can also generate the image versions you need
					//using something like PHPThumb
		
					
					try{
						
						$thumb=Yii::app()->phpThumb->create($path.$filename);
						$thumb->resize(100,100);
						$thumb->save($path."thumbs/$filename");

						$thumbURL =  $publicPath."thumbs/$filename";
						
					}catch (Exception $e){
						
						$thumbURL =  Yii::app( )->getBaseUrl( )."/uploads/default/defaultFile.png";
						
					}
					
					
					//Now we need to save this path to the user's session
					if( Yii::app( )->user->hasState( 'images' ) ) {
						$userImages = Yii::app( )->user->getState( 'images' );
					} else {
						$userImages = array();
					}
					$userImages[] = array(
							"path" => $path.$filename,
							//the same file or a thumb version that you generated
							"thumb" => $path.$filename,
							"filename" => $filename,
							'size' => $model->size,
							'mime' => $model->mime_type,
							'name' => $model->name,
					);
					Yii::app( )->user->setState( 'images', $userImages );
					
					
					/**
					 * Database implementation
					 *  
					 * 
					 * */
					
					
					$postDocuments = array();
					$postDocuments = $_POST['_DOCUMENT'];
					
					$document = $postDocuments[$model->name];
					
					$documentToSave = new DocumentPlayer();
									
					$documentToSave->ID_DOCUMENT = $document['TYPE'];
					$documentToSave->NAME = $model->name;
					$documentToSave->DESCRIPTION = $document['DESCRIPTION'];
					$documentToSave->setOwnerId($id);
					$documentToSave->PATH = $publicPath.$filename;
					$documentToSave->SIZE = $model->size;
					$documentToSave->TYPE = $model->mime_type;
					$documentToSave->THUMBNAIL = $thumbURL;
					$documentToSave->DELURL = $this->createUrl( "uploadTest", array(
									"id"=>$id,
									"_method" => "delete",
									"file" => $filename,
							));
					$documentToSave->DELTYPE = 'POST';
					$documentToSave->STATUS = 1;
					
					$documentToSave->save();
					
		
					//Now we need to tell our widget that the upload was succesfull
					//We do so, using the json structure defined in
					// https://github.com/blueimp/jQuery-File-Upload/wiki/Setup
					echo json_encode( array( array(
							"name" => $model->name,
							"type" => $model->mime_type,
							"size" => $model->size,
							"url" => $publicPath.$filename,
							"description"=>$documentToSave->DESCRIPTION,
							"tDocument"=>$documentToSave->iDDOCUMENT->NAME,
							"thumbnail_url" => $thumbURL,// $publicPath."thumbs/$filename",
							"delete_url" => $this->createUrl( "uploadTest", array(
									"id"=>$id,
									"_method" => "delete",
									"file" => $filename,
									"idDocumentPlayer"=>$documentToSave->ID_DOCUMENT_PLAYER,
							) ),
							"delete_type" => "POST"
					) ) );
				} else {
					//If the upload failed for some reason we log some data and let the widget know
					echo json_encode( array(
							array( "error" => $model->getErrors( 'file' ),
							) ) );
					Yii::log( "XUploadAction: ".CVarDumper::dumpAsString( $model->getErrors( ) ),
					CLogger::LEVEL_ERROR, "xupload.actions.XUploadAction"
							);
				}
			} else {
				throw new CHttpException( 500, "Could not upload file" );
			}
		}
		
		
		
	}
	
	
	
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Player('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Player']))
			$model->attributes=$_GET['Player'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Player::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='player-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
