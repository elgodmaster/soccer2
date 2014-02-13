<?php

/**
 * This is the model class for table "tbl_tournament".
 *
 * The followings are the available columns in table 'tbl_tournament':
 * @property integer $ID
 * @property integer $ID_CATEGORY
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $START_DATE
 * @property string $END_DATE
 * @property string $BASES
 * @property string $RULES
 * @property string $PROMO
 * @property integer $STATUS
 * @property string $SCHEDULE_CONFIG
 * @property string $SCHEDULE_D
 * @property integer $TYPE
 * @property integer $LAP_CONF
 * @property integer $START_E
 * @property integer $WIN_PLACE
 * @property integer $ELI_CONF
 * @property integer $ACTIVE
 *
 * The followings are the available model relations:
 * @property DocumentTournament[] $documentTournaments
 * @property MatchGame[] $matchGames
 * @property Category $iDCATEGORY
 */
class Tournament extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tournament the static model class
	 */
	
	public $typeTournament = array(
			2=>'Eliminacion directa',
			4=>'Todos vs todos',
			6=>'Grupos',
			
	);
	
	/**
	 * Tournament  status
	 * @var string array
	 */
	public $aStatus= array(

			1=>'ABIERTO',
			2=>'CONFIGURACION',
			3=>'LISTO PARA CERRAR',
			4=>'CERRADO-CONFIGURANDO JORNADAS',
			5=>'CERRADO- OPERACION',
			6=>'ELIMINATORIA',
			7=>'FINALIZADO',
			
	);
	
	private $eliConfig = array(
			
			16=>'Octavos de final',
			8=>'Cuartos de final',
			4=>'Semifinal',
			2=>'Final',
			
	);
	
	
	private $aWinPlace = array(
		
			1=>'Primer lugar',
			2=>'Primer y segundo lugar',
			4=>'Primero, Segundo y Tercer Lugar',
			
	);
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_tournament';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('ID_CATEGORY, NAME', 'required'),
				array('ID_CATEGORY, ACTIVE, TYPE, LAP_CONF, START_E, WIN_PLACE, ELI_CONF', 'numerical', 'integerOnly'=>true),
				array('NAME', 'length', 'max'=>100),
				array('DESCRIPTION', 'length', 'max'=>500),
				array('BASES', 'length', 'max'=>500),
				array('RULES', 'length', 'max'=>500),
				array('PROMO', 'length', 'max'=>500),
				array('SCHEDULE_CONFIG', 'length', 'max'=>100),
				array('SCHEDULE_D', 'length', 'max'=>100),
				array('START_DATE, END_DATE', 'safe'),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('ID, ID_CATEGORY,START_E,WIN_PLACE NAME,TYPE,ELI_CONF, DESCRIPTION,LAP_CONF, START_DATE, END_DATE, ACTIVE, SCHEDULE_CONFIG, SCHEDULE_D', 'safe', 'on'=>'search'),
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
				'documents' => array(self::HAS_MANY, 'DocumentTournament', 'ID_OWNER', 'condition'=>'STATUS=1'),
				'matchGames' => array(self::HAS_MANY, 'MatchGame', 'TOURNAMENT_ID'),
				'iDCATEGORY' => array(self::BELONGS_TO, 'Category', 'ID_CATEGORY'),
				'teams' => array(self::HAS_MANY, 'TournamentTeam', 'ID_TOURNAMENT', 'condition'=>'ACTIVE=1'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'ID' => 'ID',
				'ID_CATEGORY' => 'Categoria',
				'NAME' => 'Nombre',
				'DESCRIPTION' => 'Descripcion',
				'START_DATE' => 'Fecha de Inicio',
				'END_DATE' => 'Fecha de Fin',
				'BASES' => 'Bases',
				'RULES' => 'Reglas',
				'PROMO' => 'Convocatoria',
				'STATUS' => 'Estatus',
				'SCHEDULE_CONFIG' => 'Horarios disponibles',
				'SCHEDULE_D' => 'Dias disponibles',
				'TYPE' => 'Tipos disponibles',
				'LAP_CONF'=> 'Clasificacion disponible',
				'START_E'=> 'Disponibles',
				'WIN_PLACE'=> 'Lugares disponible',
				'ELI_CONF'=>'Disponibles',
				'ACTIVE' => 'Activo',
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
		$criteria->compare('ID_CATEGORY',$this->ID_CATEGORY);
		$criteria->compare('NAME',$this->NAME,true);
		$criteria->compare('DESCRIPTION',$this->DESCRIPTION,true);
		$criteria->compare('START_DATE',$this->START_DATE,true);
		$criteria->compare('END_DATE',$this->END_DATE,true);
		$criteria->compare('ACTIVE',$this->ACTIVE);

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}



	/**
	 * Retrieves a list of activeOptions
	 * @return unknown_type
	 */
	public function getEnabledOptions()
	{
		return array(
				1 => 'DISPONIBLE',
				0 => 'NO DISPONIBLE',
		);
	}

	
	/**
	 * Retrieves a list of activeOptions
	 * @return unknown_type
	 */
	public function getTournamentType()
	{
		return $this->typeTournament;
	}
		
	
	/**
	 * Retrives a string value of tournament type
	 * @return string
	 */
	public function getStringTournamentType(){
		
	return ($this->TYPE == 0) ? 'No asignado' :$this->typeTournament[$this->TYPE];	
		
	}
	

	/**
	 * Retrives a string value of tournament type
	 * @return string
	 */
	public function isEnabledToGenerateMatch(){
		
		$nTeams = count($this->teams);
		
		return ($nTeams && $this->TYPE && $this->START_E && $nTeams > 3 && $nTeams > $this->TYPE && $nTeams > $this->START_E);
	
	}
	
	
	
	/**
	 *retrives Start eliminatory options 
	 */
	public function getEliConf(){
		
		$nteams = count($this->teams);
		$avaliable = array();
		
		foreach ($this->eliConfig as $key=>$value){
			
			if ($nteams >= $key) {
				$avaliable[$key] = $value;
			}
		}
		
		return $avaliable;
		
	}
	
	
	
	
	

}

