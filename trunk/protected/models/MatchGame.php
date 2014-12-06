<?php

/**
 * This is the model class for table "tbl_match_game".
 *
 * The followings are the available columns in table 'tbl_match_game':
 * @property integer $ID
 * @property integer $PLAY_GROUND_ID
 * @property integer $VISITOR
 * @property integer $TOURNAMENT_ID
 * @property integer $LOCAL
 * @property string $TIME
 * @property string $GROUP
 * @property integer $ID_REFEREE
 * @property integer $ACTIVE
 * @property string $NAME
 * @property integer $TYPE
 * @property integer $STATUS
 *
 * The followings are the available model relations:
 * @property Team $vISITOR
 * @property Tournament $tOURNAMENT
 * @property Team $lOCAL
 * @property PlayGround $pLAYGROUND
 * @property MatchResult[] $matchResults
 * @property PlayerResult[] $playerResults
 */
class MatchGame extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MatchGame the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	
	/**
	 * Match Game  status
	 * @var string array
	 */
	public $aStatus= array(
	
			1=>'CONFIGURANDO',
			2=>'LISTO PARA PROGRAMAR',
			3=>'PROGRAMADO',
			4=>'PUBLICADO',
			5=>'EVALUANDO',
			6=>'CERRADO',
				
	);
	
	
	/**
	 * Match Type
	 * @var unknown
	 */
	private $types = array(
				
			16=>'Octavos de final',
			8=>'Cuartos de final',
			4=>'Semifinal',
			2=>'Final',
				
	);
	
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_match_game';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NAME,TIME, ID_REFEREE, PLAY_GROUND_ID', 'required', 'message'=>'{attribute}, no puede ir en blanco', 'on'=>'register'),
			array('VISITOR,TYPE, STATUS,TOURNAMENT_ID, LOCAL', 'numerical', 'integerOnly'=>true, ),
			array('ID_REFEREE', 'isAvaliableReferee' ,'on'=>'register'),
			array('PLAY_GROUND_ID', 'isAvaliableGround','on'=>'register' ),
			//array('PLAY_GROUND_ID', 'numerical', 'integerOnly'=>true, 'tooSmall'=>'Debes seleccionar una cancha.', 'min'=>0, ),
			array('GROUP', 'length', 'max'=>10),
			array('NAME', 'length', 'max'=>100),
			array('TIME', 'scheduleAvaliable','on'=>'register' ),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, STATUS, TYPE, VISITOR, TOURNAMENT_ID,ID_REFEREE, LOCAL, TIME, GROUP, ACTIVE, NAME', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'vISITOR' => array(self::BELONGS_TO, 'Team', 'VISITOR'),
			'tOURNAMENT' => array(self::BELONGS_TO, 'Tournament', 'TOURNAMENT_ID'),
			'lOCAL' => array(self::BELONGS_TO, 'Team', 'LOCAL'),
			'rEFEREE' => array(self::BELONGS_TO, 'Referee', 'ID_REFEREE'),
			'pLAYGROUND' => array(self::BELONGS_TO, 'PlayGround', 'PLAY_GROUND_ID'),
			'matchResults' => array(self::HAS_MANY, 'MatchResult', 'MATCH_ID'),
			'playerResults' => array(self::HAS_MANY, 'PlayerResult', 'MATCH_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'PLAY_GROUND_ID' => 'Cancha',
			'VISITOR' => 'Visitor',
			'TOURNAMENT_ID' => 'Tournament',
			'LOCAL' => 'Local',
			'TIME' => 'Time',
			'GROUP' => 'Group',
			'ACTIVE' => 'Active',
			'NAME' => 'Name',
			'ID_REFEREE' => 'Arbitro',
			'TYPE' => 'Tipo partido',
				
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID',$this->ID);
		$criteria->compare('PLAY_GROUND_ID',$this->PLAY_GROUND_ID);
		$criteria->compare('VISITOR',$this->VISITOR);
		$criteria->compare('TOURNAMENT_ID',$this->TOURNAMENT_ID);
		$criteria->compare('LOCAL',$this->LOCAL);
		$criteria->compare('TIME',$this->TIME,true);
		$criteria->compare('GROUP',$this->GROUP,true);
		$criteria->compare('ACTIVE',$this->ACTIVE);
		$criteria->compare('NAME',$this->NAME,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	
	/**
	 * 
	 */
	public function  getTypeDescription(){
		
		return isset($this->types[$this->TYPE]) ? $this->types[$this->TYPE] : '-';
		
	}

	
	
	/**
	 * This is the 'isAvaliableReeferee' validator as declared in rules().
	 * @param unknown $attribute
	 * @param unknown $params
	 */
	public function isAvaliableReferee($attribute,$params){
		
		
		$end_time = strtotime('+'.$this->tOURNAMENT->MATCH_LONG_TIME.' minutes', strtotime($this->TIME));
		
		$start_time = strtotime('-'.$this->tOURNAMENT->MATCH_LONG_TIME.' minutes', strtotime($this->TIME));

		$end_time = date('Y-m-d H:i:s', $end_time);
		
		$start_time = date('Y-m-d H:i:s', $start_time);
		
		$avaliable = MatchGame::model()->findAll(array(
				'condition'=>'ID <>:id AND
						  ID_REFEREE=:id_referee AND
						  STATUS < 6 AND
						  TIME BETWEEN :start_time AND :end_time',
				'params'=>array(':id'=>$this->ID,
						':id_referee'=>$this->ID_REFEREE,
						':start_time'=>$start_time,
						':end_time'=>$end_time),
		));
		
		if(count($avaliable))
			$this->addError($attribute, 'Este arbitro, ya tiene asignado otro encuentro en el horario seleccionado!');
		
	}
	
	
	/**
	 * This is the 'scheduleAvaliable' validator as declared in rules().
	 * @param unknown $attribute
	 * @param unknown $params
	 */
	public function scheduleAvaliable($attribute,$params)
	{
		
		
		$tournament = $this->ID_REFEREE;
		
		$tournamentModel = $this->tOURNAMENT;
		
		$end_time = strtotime('+'.$this->tOURNAMENT->MATCH_LONG_TIME.' minutes', strtotime($this->TIME));
		
		$start_time = strtotime('-'.$this->tOURNAMENT->MATCH_LONG_TIME.' minutes', strtotime($this->TIME));
		
		$end_time = date('Y-m-d H:i:s', $end_time);
		
		$start_time = date('Y-m-d H:i:s', $start_time);
		
		$avaliable = MatchGame::model()->findAll(array(
    		'condition'=>'ID <>:id AND 
						  ID_REFEREE=:id_referee AND 
						  PLAY_GROUND_ID = :id_play_ground AND 
						  STATUS < 6 AND 
						  TIME BETWEEN :start_time AND :end_time',
   			'params'=>array(':id'=>$this->ID,
   							':id_referee'=>$this->ID_REFEREE,
   							':id_play_ground'=>$this->PLAY_GROUND_ID,
   							':start_time'=>$start_time,
   							':end_time'=>$end_time),
		));
		/*if ($params['strength'] === self::WEAK)
			$pattern = '/^(?=.*[a-zA-Z0-9]).{5,}$/';
		elseif ($params['strength'] === self::STRONG)
		$pattern = '/^(?=.*\d(?=.*\d))(?=.*[a-zA-Z](?=.*[a-zA-Z])).{5,}$/';
	
	
		if(!preg_match($pattern, $this->$attribute))*/
		
		$t_array = count($avaliable);
		if(count($avaliable))
			$this->addError($attribute, '! Este encuentro interfiere con otro !');
	}
	
	
	
	/**
	 * This is the 'isAvaliableGround' validator as declared in rules().
	 * @param unknown $attribute
	 * @param unknown $params
	 */
	public function isAvaliableGround($attribute,$params)
	{
	
	
	
		$end_time = strtotime('+'.$this->tOURNAMENT->MATCH_LONG_TIME.' minutes', strtotime($this->TIME));
	
		$start_time = strtotime('-'.$this->tOURNAMENT->MATCH_LONG_TIME.' minutes', strtotime($this->TIME));
	
		$end_time = date('Y-m-d H:i:s', $end_time);
	
		$start_time = date('Y-m-d H:i:s', $start_time);
	
		$avaliable = MatchGame::model()->findAll(array(
				'condition'=>'ID <>:id AND
						  PLAY_GROUND_ID = :id_play_ground AND
						  STATUS < 6 AND
						  TIME BETWEEN :start_time AND :end_time',
				'params'=>array(':id'=>$this->ID,
						':id_play_ground'=>$this->PLAY_GROUND_ID,
						':start_time'=>$start_time,
						':end_time'=>$end_time),
		));
	
		if(count($avaliable))
			$this->addError($attribute, 'La cancha ya esta ocupada para otro encuentro');
	}
	
	
}