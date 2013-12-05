<?php

class TeamController extends Controller
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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','selectPlayer','addPlayer','manageTeamPlayer','addPlayerTeam','unsubscribe','manageDocuments','updateDocumentationProxy'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','selectPlayer','addPlayer','manageTeamPlayer','addPlayerTeam','unsubscribe','manageDocuments','updateDocumentationProxy','uploadDocument','detailView'),
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
		
		
		$model = $this->loadModel($id);
		
		$documents = new DocumentTeam();
		$documents->ID_TEAM = $id;
		$documents->STATUS = 1;
		$documents->ID_DOCUMENT = 8;
		$document = null;
		
		
		foreach ($documents->search()->getData() as $document){
		}
		
		$this->render('view',array(
			'model'=>$model,
			'documentModel'=>$document	
		));
	}
	
	
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionSelectPlayer($id)
	{
		
		$player = new Player("search");
		
		$this->render('selectPlayer',array(
				'model'=>$player,
		));
		
	}
	
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionTeamMembers($id)
	{
	
	/*	$player = new Player("search");
	
		$this->render('selectPlayer',array(
				'model'=>$player,
		));
	*/
		
	}
	
	/**
	 * 
	 * @param int $id
	 * @throws CHttpException
	 */

	public function actionUploadDocument($id){
		
		$this->loadModel($id);
	
		Yii::import( "xupload.models.XUploadForm" );
		//Here we define the paths where the files will be stored temporarily
		$path = realpath( Yii::app( )->getBasePath( )."/../uploads" )."/teams/{$id}/";
		$publicPath = Yii::app( )->getBaseUrl( )."/uploads/teams/{$id}/";
	
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
	
						$idDocumentModel = $_GET["idDocumentModel"];
	
						$documentModel =  DocumentTeam::model()->findByPk($idDocumentModel);
							
						$documentModel->STATUS = 0;
	
						$documentModel->save();
	
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
						
					$documentToSave = new DocumentTeam();
						
					$documentToSave->ID_DOCUMENT = $document['TYPE'];
					$documentToSave->NAME = $model->name;
					$documentToSave->DESCRIPTION = $document['DESCRIPTION'];
					$documentToSave->setOwnerId($id);
					$documentToSave->PATH = $publicPath.$filename;
					$documentToSave->SIZE = $model->size;
					$documentToSave->TYPE = $model->mime_type;
					$documentToSave->THUMBNAIL = $thumbURL;
					$documentToSave->DELURL = $this->createUrl( "uploadDocument", array(
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
							"delete_url" => $this->createUrl( "uploadDocument", array(
									"id"=>$id,
									"_method" => "delete",
									"file" => $filename,
									"idDocumentModel"=>$documentToSave->ID_DOCUMENT_TEAM,
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
	 * 
	 * @param int $id
	 */
	public function actionManageDocuments($id){
	
		$model=$this->loadModel($id);
				
		$document = new DocumentTeam();
		
		$catDocument = new Document();
		
		$catDocument->TYPE_DOCUMENT = 1;

		$documents = $model->documents;
		
		Yii::import("xupload.models.XUploadForm");
		$fileModel = new XUploadForm;

		$this->render('updateDocumentation',array(
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
	 * Proxy to Handle Files
	 */
	public function actionUpdateDocumentationProxy(){
		
		$upload_handler = new UploadHandler();
	}
	
	
	
	/**
	 * Manage TEAM Players
	*/
	public function actionManageTeamPlayer($id){
		
		
		$model = $this->loadModel($id);
		
		$playersTeam = new TeamPlayer();
		
		$playersTeam->TEAM_ID=$id;
		
		$dataProvider=new CActiveDataProvider('Player');
		
		$player = new Player("search");
		
		$players = new Player();
		
		$tmp = $playersTeam->search();
		
		$this->render('manageTeamPlayer',array(
				'model'=>$model,
				'dataProvider'=>$playersTeam->search(),
		));
		
		
	}
	
	/**
	 * Unsubscribe a Player to The team
	 * @param unknown $idTeam
	 * @param unknown $idPlayer
	 */
	public function actionUnsubscribe($teamId, $playerId){
	
		$playerTeam = PlayerTeam::model()->findByAttributes(array('PLAYER_ID'=>$playerId,'TEAM_ID'=>$teamId));
		
		if($playerTeam===null)
			throw new CHttpException(404,'The requested page does not exist.');
		
		$playerTeam->delete();
		
		$this->redirect(array('manageTeamPlayer','id'=>$teamId));
	}
	
	
	
	
	/**
	 * Add Player to The team
	 * @param unknown $idTeam
	 * @param unknown $idPlayer
	 */
	public function actionAddPlayerTeam($idTeam, $idPlayer){
		
		$player = Player::model()->findByPk($idPlayer);
		
		$playerTeam = PlayerTeam::model()->findByAttributes(array('PLAYER_ID'=>$idPlayer,'TEAM_ID'=>$idTeam));
		
		if ($playerTeam===null) $playerTeam=new PlayerTeam();
		
		if($player===null)
			throw new CHttpException(404,'The requested page does not exist.');
		
		$team = $this->loadModel($idTeam);
		
		
		if(isset($_POST['PlayerTeam']))
		{
			$playerTeam->attributes=$_POST['PlayerTeam'];
			//$playerPost =$_POST['Player'];
			//$teamPost =$_POST['team'];
			$playerTeam->TEAM_ID = $idTeam;
			$playerTeam->PLAYER_ID = $idPlayer;
			if($playerTeam->save())
				$this->redirect(array('manageTeamPlayer','id'=>$idTeam));
		}
		
		$this->render('addPlayerTeam',array(
				'model'=>$player,'team'=>$team, 'playerTeam'=>$playerTeam,
		));
		
		
				
	}
	
	
	/**
	 * Shows a Full Player Information
	 * @param integer $teamId
	 * @param integer $playerId
	 */
	public function actionDetailView($teamId, $playerId){
	
	
		$playerTeam = TeamPlayer::model()->findByAttributes(array('PLAYER_ID'=>$playerId,'TEAM_ID'=>$teamId));
	
		if ($playerTeam===null) 
			throw new CHttpException(404,'The requested page does not exist.');
	
			
	
		$this->render('detailView',array(
				'model'=>$playerTeam,
		));
	
	
	
	}
	
	
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionAddPlayer($id)
	{
		$team = $this->loadModel($id);//Team::model()->findByPk($idTeam);
		
		$MIN_YEAR = $team->iDCATEGORY->MIN_YEAR;
		$MAX_YEAR = $team->iDCATEGORY->MAX_YEAR;
		$GENDER = $team->iDCATEGORY->GENDER;
		
		
		$gender = ($team->ID_CATEGORY < 5) ? 1 : 2;
		
		
			
		$minYear = date('Y-m-d', strtotime('-'.$MIN_YEAR.' year'));
		
		$maxYear =  date('Y-m-d', strtotime('-'.$MAX_YEAR.' year'));
				
		$oDBC = new CDbCriteria();
		
		$oDBC->condition = '((t.ID NOT IN (SELECT PLAYER_ID FROM tbl_team_player WHERE ACTIVE=1)) AND (t.GENDER = '.$GENDER.') 
								AND (t.BIRTH BETWEEN "'.$maxYear.'" AND "'.$minYear.'"))';
		
		//AND (t.BIRTH BETWEEN "'.$minYear.'" AND "'.$maxYear.'")
		
		//$oDBC->join = 'LEFT JOIN TBL_TEAM_PLAYER PT ON t.ID = PT.PLAYER_ID AND PT.ID_TEAM=6';
		
		$player= new Player();
		
		$model = new CActiveDataProvider('Player', array('criteria'=>$oDBC,));
		
		
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			$this->renderPartial('createDialog',array('player'=>$player,'model'=>$model,'modelTeam'=>$team),false,true);
		
	}
	
	
	
	
	
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Team;
		$catCategory = new Category();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Team']))
		{
			$model->attributes=$_POST['Team'];
			$model->CREATION_DATE=  date("Y-m-d H:i:s"); 
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
		}

		$this->render('create',array(
			'model'=>$model,
			'catCategory'=>$catCategory,	
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
		$catCategory = new Category();
		
		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Team']))
		{
			$model->attributes=$_POST['Team'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
		}

		$this->render('update',array(
			'model'=>$model,'catCategory'=>$catCategory
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
		$dataProvider=new CActiveDataProvider('Team');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Team('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Team']))
			$model->attributes=$_GET['Team'];

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
		$model=Team::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='team-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
