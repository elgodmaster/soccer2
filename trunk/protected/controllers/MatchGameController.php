<?php

class MatchGameController extends Controller
{

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	
	
	
	public function actionIndex()
	{
		$this->render('index');
	}

	
	
	
	/**
	 * Manages Player Results
	 * @param Integer $id
	 * @param Integer $playerId
	 */
	public function actionManageMatchGameByPlayer($id, $playerId){

		$MATCH_TYPE = 2;
		
		$ACTIVE = 1;
		
		$model = $this->loadModel($id);
		
		$playerModel = Player::model()->findByPK($playerId);
		
		if($playerModel===null)
			throw new CHttpException(404,'The requested page does not exist.');
		
		
		if(isset($_POST['PlayerResult'])){

			$players = $_POST['PlayerResult'];
			
			foreach ($players as $playerResultPost)	{	
			
			$catResult = isset($playerResultPost['RESULT_ID']) ? $playerResultPost['RESULT_ID'] : -1 ;
			$matchId =  isset($playerResultPost['MATCH_ID']) ? $playerResultPost['MATCH_ID'] : -1;			
			
			$playerResult = PlayerResult::model()->findByPK(array('RESULT_ID'=>$catResult, 'PLAYER_ID'=>$playerId, 'MATCH_ID'=>$matchId));
			
			if ($playerResult != null){
				
				$playerResult->attributes = $playerResultPost;
				$playerResult->save();
				
			}else {
				
				throw new CHttpException(404,'The requested page does not exist.');
				
			}
			
			}
			
			$this->redirect(array('manage','id'=>$matchId));
			
		}
		
		$catResult = new CatResult();
		
		$catResult->TYPE_RESULT = $MATCH_TYPE;
		
		$catResult->ACTIVE = $ACTIVE;
		
		$catResults = array();
		
		$catResults = $catResult->search()->getData();
		
		$playerResults = array();
		
		foreach ($catResults as $_catResult){
			
			$playerResult = PlayerResult::model()->findByPK(array('RESULT_ID'=>$_catResult->ID, 'PLAYER_ID'=>$playerId, 'MATCH_ID'=>$id));
			
			if ($playerResult === null){
				
				$playerResult = new PlayerResult();
				
				$playerResult->MATCH_ID = $id;
				$playerResult->PLAYER_ID = $playerId;
				$playerResult->RESULT_ID = $_catResult->ID;	

				$playerResult->save();
				
			}
			
			$playerResults[] = $playerResult;
			
			
		}
		
		
		$this->renderPartial('_playerResultForm',array(
				'model'=>$model,
				'playerModel'=>$playerModel,
				'playerResults'=>$playerResults,
		));
		
		
		
	}
	
	
	/**
	 * Manages MatchGame 
	 * @param unknown $id
	 */
	public function actionManage($id)
	{
		
		$MATCH_TYPE = 3;
		
		$ACTIVE = 1;
		
		$model = $this->loadModel($id);
		
		
		
		if(isset($_POST['MatchResult'])){
				
			$matchResultArray = array();
		
				$matchResultArray = $_POST['MatchResult'];
		
				foreach ($matchResultArray as $matchResult){
						
		
						
					if (isset($matchResult['MATCH_ID']) && $matchResult['MATCH_ID'] > 0 && isset($matchResult['RESULT_ID']) && $matchResult['RESULT_ID'] > 0 ){
		
						$dbMatchResult = MatchResult::model()->findByPk(array('RESULT_ID'=>$matchResult['RESULT_ID'], 'MATCH_ID'=>$matchResult['MATCH_ID']));
		
					}else{
						
						throw new CHttpException(400,'The requested page does not exist.'); // confirm http estatus code = 400 Bad Request
		
					}
		
					
					if($dbMatchResult === null) $dbMatchResult = new MatchResult();
		
						
						
					$dbMatchResult->attributes = $matchResult;
						
					$dbMatchResult->save();
						
				}
				
				$this->redirect(array('manage','id'=>$id));
		
		}
		
		
		
		
		$currentResults = $model->matchResults;
				
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
				
		}
		
		
		$this->render('manage',array(
				'model'=>$model,
				'matchResults'=>$matchResults,
		));
		
		
	}
	
	
	
	
	
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=MatchGame::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
}