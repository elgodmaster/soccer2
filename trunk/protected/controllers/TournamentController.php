<?php

class TournamentController extends Controller
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
						'actions'=>array('index','view','manageTeams','searchAvaliableTeams','addTeamTournament','unsubscribeTeam','report'),
						'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('create','update','manageTeams','searchAvaliableTeams','addTeamTournament','generateMatch','manageMatchs','manage'),
						'users'=>array('@'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array('admin','delete','manageTeams','searchAvaliableTeams','addTeamTournament','manageDocuments','uploadDocument','updateByFm','updateBySchedule', 'manageResults','publish'),
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
		$this->render('view',array(
				'model'=>$this->loadModel($id),
		));
	}




	/**
	 * retrieves a total  matchs
	 * @param integer $nTeams the Total of teams on tournament
	 * @param integer $teamsVs teams on match
	 */
	public function getTotalMatchs($nTeams, $teamsVs)
	{

		return  $this->factorial($nTeams) / $this->factorial($nTeams-$teamsVs);

	}

	/**
	 * Generate matchs
	 * @param integer $nTeams the Total of teams on tournament
	 */
	public function getMatchsByDate($nTeams)
	{

		return  $nTeams / 2;

	}



	/**
	 * Generate matchs
	 * @param integer $nTeams the Total of teams on tournament
	 */
	public function getTotalDates($nTeams,$simultaneus)
	{

		return  $nTeams / $simultaneus;

	}



	/**
	 * Gets factorial of a number
	 * @param integer $in
	 * @return number
	 */
	function factorial($in) {
		// 0! = 1! = 1
		$out = 1;

		// Only if $in is >= 2
		for ($i = 2; $i <= $in; $i++) {
			$out *= $i;
		}

		return $out;
	}

	/**
	 * genera el arreglo de equipos disponibles para el fixture
	 * @param integer $nTeams
	 * @return multitype:numbere
	 */
	public function getDisponibles($nTeams){

		$disponibles = array();

		for ($i=0; $i<$nTeams; $i++)
			$disponibles[$i] = 0;

		return $disponibles;
	}

	/**
	 * Genera la matriz entre equipos del fixture
	 * @param integer $nTeams
	 * @return Ambigous <multitype:, number>
	 */
	public function getMatriz($nTeams){

		$matriz = array();

		for($i=0; $i<$nTeams; $i++)
		for($j=0; $j<$nTeams; $j++)
			$matriz[$i][$j]=0;

		return $matriz;
	}


	/**
	 * Genera matriz hap
	 * @param integer $nTeams
	 * @return Ambigous <multitype:, number>
	 */
	public function getHap($nTeams){

		$local = 0;
		$visita = 1;
		$nPartidos = 1;
		$hap = array();
		$middle = ($nTeams / 2);
		$switch = 2;
		$cont = 0;
		
		$estado = 0;
	
		
		for($i=0; $i<$nTeams; $i++){
		 
		
			
				
			//	$hap[$i][0] = $estado;
			//	$hap[$i][1] = 3;
				$cont++;
				
	
				if($i<3){
					
					$hap[$i][0] = 1;
					$hap[$i][1] = 2;
					
					
				}else {
				
					$hap[$i][0] = 0;
					$hap[$i][1] = 2;
						
					
				}
				
				
				
	
	if ($cont == 2){
		
		if ($estado == 0){
			
			$estado = 1;
		}elseif ($estado == 1){
			
			$estado=0;
		}
		
		
		$cont = 0;
	}
				
			/*}else {
			
			$estado = 0;
			$cont = 0;	
			$hap[$i][0] = 0;		 
		 	$hap[$i][1] = 1;
		 	
		 	$cont++;
		 	*/
			
			
		}

		return $hap;
	}

	/**
	 * Genera matriz hap
	 * @param integer $nTeams
	 * @return Ambigous <multitype:, number>
	 */
	public function getUltimaFecha($nTeams){

		$ultimaFecha = array();

		for($i=0; $i<$nTeams; $i++){
			$ultimaFecha[$i] = -1;
		}

		return $ultimaFecha;
	}


	/**
	 * Genera matriz hap
	 * @param integer $nTeams
	 * @return Ambigous <multitype:, number>
	 */
	public function getEquipos($teams){

		$equipos = array();

		foreach ($teams as $team){
				
			$equipos[] = $team;
		}
		return $equipos;
	}


	/**
	 * Manages march results of tournament
	 * it support post and get methods
	 * @param integer $id
	 * @return multitype:
	 */
	public function actionManageResults($id){
		
		$model = $this->loadModel($id);
		$currentRound = 1;
		
		$currentRound = isset($_GET['roundId']) ? $_GET['roundId'] : 1;
		
		/**
		 * Get the mandatory id for score
		 */
		$MATCH_TYPE = 3;
		
		$ACTIVE = 1;
		
		$matchGame = MatchGame::model()->findByPk(109);
		
		$results = $matchGame->matchResults;
		
		/**
		 * Validate if exists more than 1 match
		 * true: continue
		 * false: redirect to home
		 */	if (1){}
		
		/**
		 * Evaluate  current Round
		 */if(1){}
		
		
		

/*
		$currentResults = $matchGame->matchResults;
		
		$catResult = new CatResult();
		
		$catResult->TYPE_RESULT = $MATCH_TYPE;
		
		$catResult->ACTIVE = $ACTIVE;
		
		$catResults = array();
		
		$catResults = $catResult->search()->getData();
		
		$matchResults = array();
		
		foreach ($catResults as $_catResult){
		
				
			$matchResult = MatchResult::model()->findByPk(array('RESULT_ID'=>$_catResult->ID, 'MATCH_ID'=>$id));
				
			if($matchResult === null){
		
				$matchResult = new MatchResult();
		
				$matchResult->MATCH_ID = $id;
					
				$matchResult->RESULT_ID = $_catResult->ID;
					
			}
		
			$matchResults[] = $matchResult;
		
		}*/
		
		
		$this->render('matchResults',array(
				'model'=>$model,
				'roundId'=>$currentRound,
		));
		
	}
	

	/**
	 * Controlller for manage matchs
	 * it support post and get methods
	 * @param integer $id
	 * @return multitype:
	 */
	public function actionManageMatchs($id){

		$playGround = new PlayGround();

		$model = $this->loadModel($id);
		
		$roundId = isset($_GET['roundId']) ? $_GET['roundId'] : 1; 

		if(isset($_POST['MatchGame']) && $model->STATUS == 4){
				
			$matchArray = array();
				
			if (isset($_POST['saveRound'])){


				$matchArray = $_POST['MatchGame'];

				foreach ($matchArray as $match){
						

						
					if (isset($match['ID']) && $match['ID'] > 0){

						$dbMatch = MatchGame::model()->findByPk($match['ID']);


					}else{
						
						$dbMatch = new MatchGame();

					}					
						
					$dbMatch->attributes = $match;
					
					
					/*Send to match validation*/
					if ($this->performMatchValidation($dbMatch, $model)){
											
						$dbMatch->STATUS = 2;
						$dbMatch->save();
						
					}
						
					
						
				}

			} else if (isset($_POST['publishRound'])) {
				

				$matchArray = $_POST['MatchGame'];
				
				foreach ($matchArray as $match){
				
				
				
					if (isset($match['ID']) && $match['ID'] > 0){
				
						$dbMatch = MatchGame::model()->findByPk($match['ID']);
						$dbMatch->STATUS = 3;
						$dbMatch->save();
				
					}
				}
			}

			$this->redirect(array('manageMatchs','id'=>$model->ID,'roundId'=>$roundId,));
			
		}

		
		

		if (count($model->matchGames) > 0) {
				
			$this->render('matchs',array(
					'model'=>$model,
					'matchGames'=>$model->matchGames,
					'playGround'=>$playGround,
					'roundId'=>$roundId,
			));
				
		}else{
				

			$toMatch = $this->generateMatchs($id);
				
			$this->render('matchs',array(
					'model'=>$model,
					'matchGames'=>$toMatch,
					'playGround'=>$playGround,
					'roundId'=>$roundId,
			));
				
		}

	}


	/**
	 * Generate matchs
	 * @param integer $id the ID of the model to be displayed
	 */
	public function generateMatchs($id)
	{

		/*
		 * Determinar esto mediante formulas matematicas de
		* variacion
		* */

		/*Integers*/


		$teams = $this->loadModel($id)->teams;
		$numeroEquipos = sizeof($teams);
		
		if( $numeroEquipos % 2 ){
			
			$auxTeam = new TournamentTeam();
			
			$auxTeam->ACTIVE=1;
			$auxTeam->ID_TOURNAMENT = $id;
			$auxTeam->ID_TEAM=0;
			$auxTeam->STATUS=1;
			
			
			
			//$teams[] = $auxTeam;
			array_unshift($teams, $auxTeam);
			$numeroEquipos ++;			
		}


		$numeroPartidos = $this->getTotalMatchs($numeroEquipos, 2);
		$numeroFechas = $this->getTotalDates($numeroPartidos, $this->getMatchsByDate($numeroEquipos));

		$local;

		$programandoPartido=1;
		$programandoFecha =1;

		$visita = 0;

		/*Arrays*/
		$fixture = array();
		$disponibles = $this->getDisponibles($numeroEquipos);


		$matriz = $this->getMatriz($numeroEquipos);

			
		/*array(
		 array(0,0,0,0),
				array(0,0,0,0),
				array(0,0,0,0),
				array(0,0,0,0),
		);
		*/

		$registroHap = $this->getHap($numeroEquipos);

		/*array(
		 array(0,1),
				array(0,1),
				array(0,1),
				array(0,1),
		);
		*/


		$ultimaFecha = $this->getUltimaFecha($numeroEquipos);// array(0,1,2,3);
		$equipos = $this->getEquipos($teams); //array(0,1,2,3);

		/**Booleans*/
		$iguales = false;
		$disponibilidad = false;
		$programado = false;
		$rival = false;
		$hapLocal = false;
		$hapVisita = false;
		$hap = false;

		//llenar Matriz
		//llenar hap

		Yii::log('EQUPOS == '.CJSON::encode($equipos),'info', CLogger::LEVEL_ERROR);
		
		$rounds = $this->getFixture($numeroEquipos);
		
		Yii::log('ROUNDS == '.CJSON::encode($rounds),'info', CLogger::LEVEL_ERROR);
		
		$matchs = array();
		
		$mirror = array();
		
		$group = 0;
		
		foreach ($rounds as $round){
			
			$group++;
			
			$matchName = 0;
			
			foreach ($round as $match){
				
				$matchName++;
				
				$components = array();
					
				$components =  split(' v ', $match);
				
				$matchGame = new MatchGame();
				
				$matchGame->GROUP = $group;
				
				$matchGame->TOURNAMENT_ID = $id;
				
				$matchGame->lOCAL = $equipos[intval($components[0])]->iDTEAM;
				
				$matchGame->vISITOR =$equipos[intval( $components[1])]->iDTEAM;
				
				$matchGame->NAME = $matchName;
				
				
				$matchGameMirror = new MatchGame();			
				
				
				$matchGameMirror->TOURNAMENT_ID = $id;
				
				$matchGameMirror->GROUP = $group;
				
				$matchGameMirror->lOCAL = $equipos[intval($components[1])]->iDTEAM;
				
				$matchGameMirror->vISITOR =$equipos[intval( $components[0])]->iDTEAM;
				
				$matchGameMirror->NAME = $matchName;
				
				$mirror [] = $matchGameMirror;
				
				$matchs[] = $matchGame;
				
				
			}
			
			
			
		}
		
		
		if(1) //Secong half. you have to configure it
		
		$tMatchs = sizeof($mirror);
		
		foreach ($mirror as $match){
			
			$match->GROUP+=$group;
			
			$matchs[] = $match;
			
			
		}
		
		
		
		
		/*
		while ($programandoFecha <= 3){
				
			$disponibles = $this->getDisponibles($numeroEquipos);
			//$disponibles = array(0,0,0,0);
			
			Yii::log('MARTRIZ == '.CJSON::encode($matriz),'info', CLogger::LEVEL_ERROR);
			Yii::log('ULTIMA FECHA == '.CJSON::encode($ultimaFecha),'info', CLogger::LEVEL_ERROR);
			Yii::log('HAP == '.CJSON::encode($registroHap),'info', CLogger::LEVEL_ERROR);
			Yii::log('FIXTURE == '.CJSON::encode($fixture),'info', CLogger::LEVEL_ERROR);
			
			for ($local=0; $local<$numeroEquipos; $local++){

				for ($visita=0; $visita<$numeroEquipos; $visita++){
						
					$iguales = ($local != $visita); // boolean false 
					$programado = ($matriz[$local][$visita]==0); // boolean true
					$disponibilidad = ($disponibles[$local] ==0 && $disponibles[$visita] ==0); //true
					$rival = ($visita!=$ultimaFecha[$local]);//true
						
					if($registroHap[$local][0] != 0 || ($registroHap[$local][0]==0 && $registroHap[$local][1]>0)) {

						$hapLocal = true;
							
					}
					else{

						$hapLocal=false;
							
					}
						
					if($registroHap[$visita][0] != 1 || ($registroHap[$visita][0]==1 && $registroHap[$local][1]>0)) {
							
						$hapVisita = true;
							
					}
					else{
							
						$hapVisita=false;
							
					}
						
					$hap =($hapLocal && $hapVisita);
					
					//Yii::log('LOCAL='.$local.' VISITA='.$visita,'info', CLogger::LEVEL_ERROR);
					//Yii::log('LOCAL='.$local.' VISITA='.$visita."\n".'iguales='.$iguales.', disponibilidad='.$disponibilidad.',programado='.$programado.',rival='.$rival.',hap='.$hap,'info', CLogger::LEVEL_ERROR);
					
						
					if($iguales && $disponibilidad && $programado && $rival && $hap){


						$matriz[$local][$visita] = $programandoPartido;

						$fixture[$programandoPartido-1][0] = "".$programandoFecha;
						$fixture[$programandoPartido-1][1] = $equipos[$local];
						$fixture[$programandoPartido-1][2] = $equipos[$visita];

						$disponibles[$local] =1;
						$disponibles[$visita]=1;

						$ultimaFecha[$local] = $visita;
						$ultimaFecha[$visita] = $local;

						if($registroHap[$local][0] == 0){
								
							$registroHap[$local][1]--;
								
						}
						else{
								
							$registroHap[$local][0] = 0;
							$registroHap[$local][1] = 2;
						}

						if($registroHap[$visita][0] == 1){

							$registroHap[$visita][1]--;

						}
						else{

							$registroHap[$visita][0] = 1;
							$registroHap[$visita][1] = 2;
						}


						$programandoPartido++;
					}
						
					Yii::log('LOCAL='.$local.' VISITA='.$visita."\n".'iguales='.$iguales.', disponibilidad='.$disponibilidad.',programado='.$programado.',rival='.$rival.',hap='.$hap."\n".'ULTIMA_FECHA='.CJSON::encode($ultimaFecha)."\n".'disponibles == '.CJSON::encode($disponibles),'info', CLogger::LEVEL_ERROR);
					
				}


			}
				
			$programandoFecha++;
				
		}

		$matchs = array(); //

		foreach ($fixture as $match){

			$matchGame = new MatchGame();
				
			$matchGame->GROUP = $match[0];
				
			$matchGame->TOURNAMENT_ID = $id;
				
			$matchGame->lOCAL = $match[1]->iDTEAM;
				
			$matchGame->vISITOR = $match[2]->iDTEAM;
				
			$matchs[] = $matchGame;
				
		}
*/


		return $matchs;

	}



	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Tournament;

		$catCategory = new Category();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tournament']))
		{
			$model->attributes=$_POST['Tournament'];
			
			/**
			 * Default values.
			 */
			$model->ACTIVE = 1;
			$model->TYPE = 0;
			$model->START_E = 8;
			
			
			if($model->save()){
				
				Yii::app()->user->setFlash('success', '<strong>!Listo</strong> Se ha creado el torneo y puede configurarlo.');
				
				$this->redirect(array('manage','id'=>$model->ID));
			}
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

		if(isset($_POST['Tournament']))
		{
			$model->attributes=$_POST['Tournament'];
					
			if($model->save()){
				Yii::app()->user->setFlash('success', '<strong>!Listo.</strong> Guardado Correctamente.');
				$this->redirect(array('manage','id'=>$model->ID));
			}
		}

		$this->render('update',array(
				'model'=>$model,
				'catCategory'=>$catCategory,
				'form'=>'_form'
		));
	}
	
	

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdateByFm($id,$fm)
	{
		$model=$this->loadModel($id);
		$catCategory = new Category();
	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	
		if(isset($_POST['Tournament']))
		{
			$model->attributes=$_POST['Tournament'];
							
			if($model->save()){
				Yii::app()->user->setFlash('success', '<strong>!Listo.</strong> Guardado Correctamente.');
				$this->redirect(array('manage','id'=>$model->ID));
			}
		}
	
		$this->render('update',array(
				'model'=>$model,
				'catCategory'=>$catCategory,
				'form'=>$fm
		));
	}
	
	
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdateBySchedule($id)
	{
		$model=$this->loadModel($id);
		$catCategory = new Category();
	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	
		if(isset($_POST['Tournament']))
		{
			$model->attributes=$_POST['Tournament'];
			
			$schedule = $_POST['Tournament'];
			
			
			try {
			$model->SCHEDULE_CONFIG = implode(",", is_array($schedule['SCHEDULE_CONFIG'])? $schedule['SCHEDULE_CONFIG'] : array() );			
			$model->SCHEDULE_D = implode(",", is_array($schedule['SCHEDULE_D'])? $schedule['SCHEDULE_D'] : array());
			}catch (Exception $ex){			
			}
			
			if($model->save()){
				Yii::app()->user->setFlash('success', '<strong>!Listo.</strong> Guardado Correctamente.');
				$this->redirect(array('manage','id'=>$model->ID));
			}
		}
	
		try{
		$model->SCHEDULE_CONFIG = explode(",", $model->SCHEDULE_CONFIG);
		$model->SCHEDULE_D = explode(",", $model->SCHEDULE_D);
		}catch (Exception $ex){}
		
		
		
		$this->render('update',array(
				'model'=>$model,
				'catCategory'=>$catCategory,
				'form'=>'_scheduleForm'
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
	 * Manages  a  whole Tournament
	 * here can configure the key view
	 * @param integer $id the ID of the Tournament
	 */
	public function actionManage($id)
	{
		
		$model = $this->loadModel($id);
		
		$model->STATUS = $this->getOverViewStatus($model);
		
		$model->save();
		
		
		$activeMatch =  isset($_GET['matchId']) ? $_GET['matchId'] : 1 ;
		
		
		if($model->STATUS  ==  3 && isset($_POST['Tournament'])){
			
			
			$model->STATUS = 4; // CERRADO
		
			
			
			$matchs = $this->generateMatchs($id);
			
			foreach ($matchs as $match){
				
				$match->LOCAL = $match->lOCAL->ID;
				$match->VISITOR= $match->vISITOR->ID;
				$match->save();// Verificar transaccionalidad
				
			}
		
			$model->save(); // Unir en transaccionalidad
			
			$this->redirect(array('manage','id'=>$id));
			
			
		}
		
		
		$this->render('manage',array(
				'model'=>$model,
		));
		
	
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Tournament');
		$this->render('index',array(
				'dataProvider'=>$dataProvider,
		));
	}


	/**
	 * Manage Teams of tournament.
	 */
	public function actionManageTeams($tournamentId)
	{

		$tournament = $this->loadModel($tournamentId);

		$tt = new TournamentTeam();

		$tt->ID_TOURNAMENT = $tournamentId;

		$tt->ACTIVE = 1;

		$this->render('manageTeams',array(
				'model'=>$tournament,'dataProvider'=>$tt->search(),
		));
	}

	/**
	 * Search avaliable teams for tournament
	 */
	public function actionSearchAvaliableTeams($tournamentId)
	{

		$tournament = $this->loadModel($tournamentId);

		$oDBC = new CDbCriteria();

		$oDBC->condition = '((t.ID NOT IN (SELECT ID_TEAM FROM tbl_tournament_team WHERE ACTIVE=1)) AND (t.ID_CATEGORY = '.$tournament->ID_CATEGORY.') AND (t.ACTIVE = 1))';
		//$oDBC->join = 'LEFT JOIN TBL_TEAM_PLAYER PT ON t.ID = PT.PLAYER_ID AND PT.ID_TEAM=6';

		$team= new Team();
		$model = new CActiveDataProvider('Team', array('criteria'=>$oDBC,));


		Yii::app()->clientScript->scriptMap['jquery.js'] = false;
		$this->renderPartial('searchAvaliableTeamsModal',array('team'=>$team,'model'=>$model,'tournament'=>$tournament),false,true);
			

	}


	/**
	 * Add a team to tournament
	 */
	public function actionAddTeamTournament($tournamentId,$teamId){

		$tt = new TournamentTeam();
		$tt->ID_TOURNAMENT = $tournamentId;
		$tt->ID_TEAM = $teamId;
		$tt->STATUS = 0;
		$tt->ACTIVE = 1;

		if($tt->save()){
				
			$this->redirect(array('manageTeams','tournamentId'=>$tournamentId));
		}


	}

	/**
	 * Unsusbribe a team from tournament
	 */

	public function actionUnsubscribeTeam($tournamentId,$teamId){



		$tt = TournamentTeam::model()->findByAttributes(array('ID_TEAM'=>$teamId,'ID_TOURNAMENT'=>$tournamentId));


		if($tt->delete()){
				
			$this->redirect(array('manageTeams','tournamentId'=>$tournamentId));
		}

	}


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tournament('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tournament']))
			$model->attributes=$_GET['Tournament'];

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
		$model=Tournament::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	/**
	 * Displays a particular report of model.'dataProvider'=>$dataProvider,
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionReport($id)
	{




		//$this->render('testReport', array());


		$dataProvider=new CActiveDataProvider('Tournament');


		# mPDF
		//$mPDF1 = Yii::app()->ePdf->mpdf();

		# You can easily override default constructor's params
		$mPDF1 = Yii::app()->ePdf->mpdf('win-1252','A4','','',20,15,48,25,10,10);


		$mPDF1->useOnlyCoreFonts = true;    // false is default
		$mPDF1->SetProtection(array('print'));
		$mPDF1->SetTitle("Acme Trading Co. - Invoice");
		$mPDF1->SetAuthor("Acme Trading Co.");
		$mPDF1->SetWatermarkText("SOCCER 2");
		$mPDF1->showWatermarkText = true;
		$mPDF1->watermark_font = 'DejaVuSansCondensed';
		$mPDF1->watermarkTextAlpha = 0.1;
		$mPDF1->SetDisplayMode('fullpage');




		# render (full page)
		//	$mPDF1->WriteHTML($this->render('index', array('dataProvider'=>$dataProvider), true));

		# Load a stylesheet
		//	$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/main.css');
		//		$mPDF1->WriteHTML($stylesheet, 1);

		$html = '
				<html>
				<head>
				<style>
				body {font-family: sans-serif;
				font-size: 10pt;
	}
				p {    margin: 0pt;
	}
				td { vertical-align: top; }
				.items td {
				border-left: 0.1mm solid #000000;
				border-right: 0.1mm solid #000000;
	}
				table thead td { background-color: #EEEEEE;
				text-align: center;
				border: 0.1mm solid #000000;
	}
				.items td.blanktotal {
				background-color: #FFFFFF;
				border: 0mm none #000000;
				border-top: 0.1mm solid #000000;
				border-right: 0.1mm solid #000000;
	}
				.items td.totals {
				text-align: right;
				border: 0.1mm solid #000000;
	}
				</style>
				</head>
				<body>

				<!--mpdf
				<htmlpageheader name="myheader">
				<table width="100%"><tr>
				<td width="50%" style="color:#0000BB;"><span style="font-weight: bold; font-size: 14pt;">Liga de Futbol</span><br />123 Anystreet<br />Your City<br />GD12 4LP<br /><span style="font-size: 15pt;">&#9742;</span> 01777 123 567</td>
				<td width="50%" style="text-align: right;">Invoice No.<br /><span style="font-weight: bold; font-size: 12pt;">0012345</span></td>
				</tr></table>
				</htmlpageheader>

				<htmlpagefooter name="myfooter">
				<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
				Page {PAGENO} of {nb}
				</div>
				</htmlpagefooter>

				<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
				<sethtmlpagefooter name="myfooter" value="on" />
				mpdf-->

				<div style="text-align: right">Date: '.date('jS F Y').'</div>

						<table width="100%" style="font-family: serif;" cellpadding="10">
						<tr>
						<td width="45%" style="border: 0.1mm solid #888888;"><span style="font-size: 7pt; color: #555555; font-family: sans;">SOLD TO:</span><br /><br />345 Anotherstreet<br />Little Village<br />Their City<br />CB22 6SO</td>
						<td width="10%">&nbsp;</td>
						<td width="45%" style="border: 0.1mm solid #888888;"><span style="font-size: 7pt; color: #555555; font-family: sans;">SHIP TO:</span><br /><br />345 Anotherstreet<br />Little Village<br />Their City<br />CB22 6SO</td>
						</tr>
						</table>


						<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse;" cellpadding="8">
						<thead>
						<tr>
						<td width="15%">REF. NO.</td>
						<td width="10%">QUANTITY</td>
						<td width="45%">DESCRIPTION</td>
						<td width="15%">UNIT PRICE</td>
						<td width="15%">AMOUNT</td>
						</tr>
						</thead>
						<tbody>
						<!-- ITEMS HERE -->
						<tr>
						<td align="center">MF1234567</td>
						<td align="center">10</td>
						<td>Large pack Hoover bags</td>
						<td align="right">&pound;2.56</td>
						<td align="right">&pound;25.60</td>
						</tr>
						<tr>
						<td align="center">MX37801982</td>
						<td align="center">1</td>
						<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
						<td align="right">&pound;112.56</td>
						<td align="right">&pound;112.56</td>
						</tr>
						<tr>
						<td align="center">MR7009298</td>
						<td align="center">25</td>
						<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
						<td align="right">&pound;12.26</td>
						<td align="right">&pound;325.60</td>
						</tr>
						<tr>
						<td align="center">MF1234567</td>
						<td align="center">10</td>
						<td>Large pack Hoover bags</td>
						<td align="right">&pound;2.56</td>
						<td align="right">&pound;25.60</td>
						</tr>
						<tr>
						<td align="center">MX37801982</td>
						<td align="center">1</td>
						<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
						<td align="right">&pound;112.56</td>
						<td align="right">&pound;112.56</td>
						</tr>
						<tr>
						<td align="center">MR7009298</td>
						<td align="center">25</td>
						<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
						<td align="right">&pound;12.26</td>
						<td align="right">&pound;325.60</td>
						</tr>
						<tr>
						<td align="center">MF1234567</td>
						<td align="center">10</td>
						<td>Large pack Hoover bags</td>
						<td align="right">&pound;2.56</td>
						<td align="right">&pound;25.60</td>
						</tr>
						<tr>
						<td align="center">MX37801982</td>
						<td align="center">1</td>
						<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
						<td align="right">&pound;112.56</td>
						<td align="right">&pound;112.56</td>
						</tr>
						<tr>
						<td align="center">MR7009298</td>
						<td align="center">25</td>
						<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
						<td align="right">&pound;12.26</td>
						<td align="right">&pound;325.60</td>
						</tr>
						<tr>
						<td align="center">MF1234567</td>
						<td align="center">10</td>
						<td>Large pack Hoover bags</td>
						<td align="right">&pound;2.56</td>
						<td align="right">&pound;25.60</td>
						</tr>
						<tr>
						<td align="center">MX37801982</td>
						<td align="center">1</td>
						<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
						<td align="right">&pound;112.56</td>
						<td align="right">&pound;112.56</td>
						</tr>
						<tr>
						<td align="center">MR7009298</td>
						<td align="center">25</td>
						<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
						<td align="right">&pound;12.26</td>
						<td align="right">&pound;325.60</td>
						</tr>
						<tr>
						<td align="center">MF1234567</td>
						<td align="center">10</td>
						<td>Large pack Hoover bags</td>
						<td align="right">&pound;2.56</td>
						<td align="right">&pound;25.60</td>
						</tr>
						<tr>
						<td align="center">MX37801982</td>
						<td align="center">1</td>
						<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
						<td align="right">&pound;112.56</td>
						<td align="right">&pound;112.56</td>
						</tr>
						<tr>
						<td align="center">MF1234567</td>
						<td align="center">10</td>
						<td>Large pack Hoover bags</td>
						<td align="right">&pound;2.56</td>
						<td align="right">&pound;25.60</td>
						</tr>
						<tr>
						<td align="center">MX37801982</td>
						<td align="center">1</td>
						<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
						<td align="right">&pound;112.56</td>
						<td align="right">&pound;112.56</td>
						</tr>
						<tr>
						<td align="center">MR7009298</td>
						<td align="center">25</td>
						<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
						<td align="right">&pound;12.26</td>
						<td align="right">&pound;325.60</td>
						</tr>
						<tr>
						<td align="center">MR7009298</td>
						<td align="center">25</td>
						<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
						<td align="right">&pound;12.26</td>
						<td align="right">&pound;325.60</td>
						</tr>
						<tr>
						<td align="center">MF1234567</td>
						<td align="center">10</td>
						<td>Large pack Hoover bags</td>
						<td align="right">&pound;2.56</td>
						<td align="right">&pound;25.60</td>
						</tr>
						<tr>
						<td align="center">MX37801982</td>
						<td align="center">1</td>
						<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
						<td align="right">&pound;112.56</td>
						<td align="right">&pound;112.56</td>
						</tr>
						<tr>
						<td align="center">MR7009298</td>
						<td align="center">25</td>
						<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
						<td align="right">&pound;12.26</td>
						<td align="right">&pound;325.60</td>
						</tr>
						<!-- END ITEMS HERE -->
						<tr>
						<td class="blanktotal" colspan="3" rowspan="6"></td>
						<td class="totals">Subtotal:</td>
						<td class="totals">&pound;1825.60</td>
						</tr>
						<tr>
						<td class="totals">Tax:</td>
						<td class="totals">&pound;18.25</td>
						</tr>
						<tr>
						<td class="totals">Shipping:</td>
						<td class="totals">&pound;42.56</td>
						</tr>
						<tr>
						<td class="totals"><b>TOTAL:</b></td>
						<td class="totals"><b>&pound;1882.56</b></td>
						</tr>
						<tr>
						<td class="totals">Deposit:</td>
						<td class="totals">&pound;100.00</td>
						</tr>
						<tr>
						<td class="totals"><b>Balance due:</b></td>
						<td class="totals"><b>&pound;1782.56</b></td>
						</tr>
						</tbody>
						</table>
						<div style="text-align: center; font-style: italic;">Payment terms: payment due in 30 days</div>
						</body>
						</html>
						';

		# renderPartial (only 'view' of current controller)
		//$mPDF1->WriteHTML($this->renderPartial('view', array(), true));
		# Renders image
		//$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/bg.gif' ));
		$mPDF1->WriteHTML($html);
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



	
	/**
	 *
	 * @param int $id
	 * @throws CHttpException
	 */
	
	public function actionUploadDocument($id){
	
		$this->loadModel($id);
	
		Yii::import( "xupload.models.XUploadForm" );
		//Here we define the paths where the files will be stored temporarily
		$path = realpath( Yii::app( )->getBasePath( )."/../uploads" )."/tournament/{$id}/";
		$publicPath = Yii::app( )->getBaseUrl( )."/uploads/tournament/{$id}/";
	
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
	
						$documentModel =  DocumentTournament::model()->findByPk($idDocumentModel);
							
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
	
					$documentToSave = new DocumentTournament();
	
					$documentToSave->ID_DOCUMENT = $document['TYPE'];
					$documentToSave->NAME = $model->name;
					$documentToSave->DESCRIPTION = $document['DESCRIPTION'];
					$documentToSave->ID_OWNER =$id;
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
									"idDocumentModel"=>$documentToSave->ID,
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
	
		$document = new DocumentTournament();
	
		$catDocument = new Document();
	
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
	 * does the publication for a once round
	 * 
	 * @param integer $id
	 * @return number
	 */
	public function actionPublish($id){

		
		/*$mail = new YiiMailer('contact', array('message' => 'Message to send', 'name' => 'John Doe', 'description' => 'Contact form'));
		
		$mail->setFrom('jesus.nataren@gmail.com', 'Jesus Nataren');
		$mail->setTo(Yii::app()->params['adminEmail']);
		$mail->setSubject('Proxima Jornada');*/
		
		$mail = new YiiMailer();
		//$mail->clearLayout();//if layout is already set in config
		/*$mail->setFrom('jesus.nataren@gmail.com', 'Jesus Nataren');
		$mail->setTo(Yii::app()->params['adminEmail']);
		$mail->setSubject('Mail subject');
		$mail->setBody('Simple message');
		$mail->send();*/
		
		
	
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 2;
		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
		//Set the hostname of the mail server
		$mail->Host = 'mail.google.com';
		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 25;
		//Set the encryption system to use - ssl (deprecated) or tls
		//$mail->SMTPSecure = 'tls';
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = "jesus.nataren@gmail.com";
		//Password to use for SMTP authentication
		$mail->Password = "K4r3n621Qu3tz41198";
		//Set who the message is to be sent from
		$mail->setFrom('jjnataren@hotmail.com', 'Jesus Nataren');
		//Set an alternative reply-to address
		//$mail->addReplyTo('replyto@example.com', 'First Last');
		//Set who the message is to be sent to
		$mail->addAddress('jesus.nataren@gmail.com', 'Jesus Nataren');
		//Set the subject line
		$mail->Subject = 'PHPMailer GMail SMTP test';
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$mail->msgHTML('<html><body><H1>HELLO</H1><body></html>');
		//Replace the plain text body with one created manually
		$mail->AltBody = 'This is a plain-text message body';
		//Attach an image file
		
		
		//send the message, check for errors
		if (!$mail->send()) {
		Yii::app()->user->setFlash('info', '<strong>Publicado. </strong>Se envio email a los participantes del torneo. ');
		} else {
		Yii::app()->user->setFlash('error', '<strong>Error. </strong>No se envio el email. ');
		}
		
		
		
		
		
		
		
		
		
		$this->redirect(array('manageMatchs','id'=>$id));
		
		return 1;
		
	}
	
	/**
	 * This function generates a fixture list.
	 * @param Integer $nTeams
	 * @return multitype:multitype: Ambigous <multitype:>
	 */
	function getFixture($nTeams) {
		
		$names = array();
		for ($i = 0; $i < $nTeams; $i++) {
			$names[] = $i;
		}
				
		$teams = sizeof($names);
	
		//print "<p>Fixtures for $teams teams.</p>";
	
		// If odd number of teams add a "ghost".
		$ghost = false;
		if ($teams % 2 == 1) {
		$teams++;
			$ghost = true;
		}
	
		// Generate the fixtures using the cyclic algorithm.
		$totalRounds = $teams - 1;
		$matchesPerRound = $teams / 2;
		$rounds = array();
		for ($i = 0; $i < $totalRounds; $i++) {
		$rounds[$i] = array();
	}
	 
	for ($round = 0; $round < $totalRounds; $round++) {
	for ($match = 0; $match < $matchesPerRound; $match++) {
	$home = ($round + $match) % ($teams - 1);
	$away = ($teams - 1 - $match + $round) % ($teams - 1);
	// Last team stays in the same place while the others
	// rotate around it.
	if ($match == 0) {
	$away = $teams - 1;
	}
	$rounds[$round][$match] =  $this->team_name($home + 1, $names)
	. " v " . $this->team_name($away + 1, $names);
	}
	}
	
	// Interleave so that home and away games are fairly evenly dispersed.
	$interleaved = array();
	for ($i = 0; $i < $totalRounds; $i++) {
	$interleaved[$i] = array();
	}
	
	$evn = 0;
	$odd = ($teams / 2);
	for ($i = 0; $i < sizeof($rounds); $i++) {
	if ($i % 2 == 0) {
	$interleaved[$i] = $rounds[$evn++];
	} else {
	$interleaved[$i] = $rounds[$odd++];
	}
	}
	
		$rounds = $interleaved;
	
		// Last team can't be away for every game so flip them
		// to home on odd rounds.
		for ($round = 0; $round < sizeof($rounds); $round++) {
			if ($round % 2 == 1) {
			$rounds[$round][0] = $this->flip($rounds[$round][0]);
			}
			}
			
		return $rounds;	
			
	}
	
	function team_name($num, $names) {
		$i = $num - 1;
		if (sizeof($names) > $i && strlen(trim($names[$i])) > 0) {
			return trim($names[$i]);
		} else {
			return $num;
		}
	}
	
	
	function flip($match) {
		$components = split(' v ', $match);
		return $components[1] . " v " . $components[0];
	}
	
	
	/*
	 * 
	 * 
	 * 
	 * <?php


function main() {
    ?>
    <style>
    input, textarea { display: block; margin-bottom: 1em; }
    label { font-weight: bold; display: block; }
    </style>
    <h1>Fixtures Generator</h1>
    <p>This page is part of <a
    href="http://bluebones.net/2005/05/league-fixtures-generator/">bluebones.net</a>.</p>
    <?php
    // Find out how many teams we want fixtures for.
    if (! isset($_GET['teams']) && ! isset($_GET['names'])) {
        print get_form(); 
    } else {
        # XXX check for int
        print show_fixtures(isset($_GET['teams']) ?  nums(intval($_GET['teams'])) : explode("\n", trim($_GET['names'])));
    }
}

function nums($n) {
    $ns = array();
    for ($i = 1; $i <= $n; $i++) {
        $ns[] = $i;
    }
    return $ns;
}

function show_fixtures($names) { 
    $teams = sizeof($names);

    print "<p>Fixtures for $teams teams.</p>";

    // If odd number of teams add a "ghost".
    $ghost = false;
    if ($teams % 2 == 1) {
        $teams++;
        $ghost = true;
    }
    
    // Generate the fixtures using the cyclic algorithm.
    $totalRounds = $teams - 1;
    $matchesPerRound = $teams / 2;
    $rounds = array();
    for ($i = 0; $i < $totalRounds; $i++) {
        $rounds[$i] = array();
    }
   
    for ($round = 0; $round < $totalRounds; $round++) {
        for ($match = 0; $match < $matchesPerRound; $match++) {
            $home = ($round + $match) % ($teams - 1);
            $away = ($teams - 1 - $match + $round) % ($teams - 1);
            // Last team stays in the same place while the others
            // rotate around it.
            if ($match == 0) {
                $away = $teams - 1;
            }
            $rounds[$round][$match] = team_name($home + 1, $names) 
                . " v " . team_name($away + 1, $names);
        }
    }

    // Interleave so that home and away games are fairly evenly dispersed.
    $interleaved = array();
    for ($i = 0; $i < $totalRounds; $i++) {
        $interleaved[$i] = array();
    }
    
    $evn = 0;
    $odd = ($teams / 2);
    for ($i = 0; $i < sizeof($rounds); $i++) {
        if ($i % 2 == 0) {
            $interleaved[$i] = $rounds[$evn++];
        } else {
            $interleaved[$i] = $rounds[$odd++];
        }
    }

    $rounds = $interleaved;

    // Last team can't be away for every game so flip them
    // to home on odd rounds.
    for ($round = 0; $round < sizeof($rounds); $round++) {
        if ($round % 2 == 1) {
            $rounds[$round][0] = flip($rounds[$round][0]);
        }
    }
    
    // Display the fixtures        
    for ($i = 0; $i < sizeof($rounds); $i++) {
        print "<p>Round " . ($i + 1) . "</p>\n";
        foreach ($rounds[$i] as $r) {
            print $r . "<br />"; 
        }
        print "<br />";
    }
    print "<p>Second half is mirror of first half</p>";
    $round_counter = sizeof($rounds) + 1;
    for ($i = sizeof($rounds) - 1; $i >= 0; $i--) {
        print "<p>Round " . $round_counter . "</p>\n";
        $round_counter += 1;
        foreach ($rounds[$i] as $r) {
            print flip($r) . "<br />";
        }
        print "<br />";
    }
    print "<br />";

    if ($ghost) {
        print "Matches against team " . $teams . " are byes.";
    }
}

function flip($match) {
    $components = split(' v ', $match);
    return $components[1] . " v " . $components[0];
}

function team_name($num, $names) {
    $i = $num - 1;
    if (sizeof($names) > $i && strlen(trim($names[$i])) > 0) {
        return trim($names[$i]);
    } else {
        return $num;
    }
}

function get_form() {
    $s = '';
    $s = '<p>Enter number of teams OR team names</p>' . "\n";
    $s .= '<form action="' . $_SERVER['SCRIPT_NAME'] . '">' . "\n";
    $s .= '<label for="teams">Number of Teams</label><input type="text" name="teams" />' . "\n";
    $s .= '<input type="submit" value="Generate Fixtures" />' . "\n";
    $s .= '</form>' . "\n";

    $s .= '<form action="' . $_SERVER['SCRIPT_NAME'] . '">' . "\n";
    $s .= '<div><strong>OR</strong></div>' . "\n";
    $s .= '<label for="names">Names of Teams (one per line)</label>'
        . '<textarea name="names" rows="8" cols="40"></textarea>' . "\n";
    $s .= '<input type="submit" value="Generate Fixtures" />' . "\n";
    $s .= "</form>\n";
    return $s;
}

main();

?>

	


	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tournament-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	
	/**
	 * 
	 * @param unknown $form
	 * @param unknown $model
	 * @return multitype:multitype:boolean NULL string
	 */
	public function getTabularFormTabs($form, $model, $matchGames)
	{
		$tabs = array();
		$count = 0;
		$inc = 0;
		$index= 0;
		$switchVar = 1;
		$LAP = array();
		
		foreach ($matchGames as $match){
			
			if($switchVar != $match->GROUP){
			
			$tabs[] = array(
					'active'=>$count++ === 0,//CRAP
					'label'=>'J'.$switchVar				,
					'content'=>$this->renderPartial('_tabMatchForm', array('form'=>$form, 'model'=>$model, 'matchs'=>$LAP, 'nLap' => $switchVar, 'index'=>$index), true),
			);
			
			$LAP = array();
			$LAP[] = $match;
			$switchVar = $match->GROUP;
			$index+=$inc;
			$inc=1;
			
			}else{
				
				$LAP[] = $match;
				$inc++;
				
			}
			
		}
		
		if($switchVar){		
		$tabs[] = array(
				'active'=>$count++ === 0,
				'label'=>'J'.$switchVar				,
				'content'=>$this->renderPartial('_tabMatchForm', array('form'=>$form, 'model'=>$model, 'matchs'=>$LAP, 'nLap' => $switchVar, 'index'=>$index), true),
		);
		}
		
		return $tabs;
	}
	
	
	
	/**
	 * This method evaluates the current tournament status
	 * 
	 * @param Tournament $model
	 * @return number
	 */

	private function getOverViewStatus($model){
		

		$state  = 0;
		$nTeams = count($model->teams);
		
		if($model->STATUS > 3 ) return $model->STATUS;
		
				
		if ($model->RULES == null || $model->BASES == null || $model->PROMO == null ){
			
			Yii::app()->user->setFlash('info', '<strong>Perfil. </strong>Complete BASE, PROMO, REGLAS. ');
			
		}
		


		if ($model->SCHEDULE_CONFIG == null || $model->SCHEDULE_D == null  ){
				
			Yii::app()->user->setFlash('warning', '<strong>Configuración. </strong>Complete: Horarios');
				
		}
		
		if (!$this->validateDate($model->START_DATE, 'Y-m-d')){
		
			Yii::app()->user->setFlash('warning', '<strong>Configuración. </strong>No ha definido fecha de inicio para el torneo');
		
		}
		
		if ($model->TYPE == 0 ){
		
			Yii::app()->user->setFlash('warning', '<strong>Configuración. </strong>Seleccione el tipo de torneo');
			
		
		}
		
		if ($model->START_E == null || $model->ELI_CONF == null || $model->WIN_PLACE == null  ){
		
			Yii::app()->user->setFlash('warning', '<strong>Configuración. </strong>Complete: Eliminatoría');
		
		}
		
		if ($nTeams >= $model->START_E && $model->TYPE != 4 ){
			
			Yii::app()->user->setFlash('success', '<strong>Listo.</strong> Ya puede generar el torneo. ');
			$state = 3;
			
		}elseif($model->TYPE == 4 && $nTeams >= ($model->START_E*2) ){

			Yii::app()->user->setFlash('success', '<strong>Listo.</strong> Ya puede generar el torneo. ');
			$state = 3;
				
			}else{
				
				
				
				Yii::app()->user->setFlash('warning', '<strong>Equipos.</strong> Es necesario agregar mas equipos. ');
				$state = 2;
				
			}
		
		
		return 	$state; //CERRADO
	} 
	
	
	/**
	 * 
	 * @param string $date
	 * @param string $format
	 * @return boolean
	 */
	function validateDate($date, $format = 'Y-m-d H:i:s')
	{
		$d = DateTime::createFromFormat($format, $date);
		return $d && $d->format($format) == $date;
	}
	
	
	
	
	
	
	/**
	 * Does  business validation between Tournament and MatchGame
	 * @param MatchGame $match
	 * @param Tournament $tournament
	 * @return boolean
	 */
	function performMatchValidation($match, $tournament){
			
		
		
		return true;
	}


}
