<?php

/**
 * This is the model class for table "tbl_team".
 *
 * The followings are the available columns in table 'tbl_team':
 * @property integer $ID
 * @property integer $ID_CATEGORY
 * @property string $NAME
 * @property string $ADDRESS
 * @property string $DESCRIPTION
 * @property string $EMAIL
 * @property string $CONTACT_PHONE
 * @property string $CREATION_DATE
 * @property integer $ACTIVE
 *
 * The followings are the available model relations:
 * @property DocumentTeam[] $documentTeams
 * @property MatchGame[] $matchGames
 * @property MatchGame[] $matchGames1
 * @property Category $iDCATEGORY
 * @property Player[] $players
 */
class Team extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Team the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_team';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_CATEGORY,NAME,EMAIL,ADDRESS,CREATION_DATE,ACTIVE', 'required'),
			array('ID_CATEGORY, ACTIVE', 'numerical', 'integerOnly'=>true),
			array('NAME, EMAIL', 'length', 'max'=>50),
			array('ADDRESS, DESCRIPTION', 'length', 'max'=>100),
			array('CREATION_DATE', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, ID_CATEGORY, NAME, ADDRESS, DESCRIPTION, EMAIL, CREATION_DATE, ACTIVE, CONTACT_PHONE', 'safe', 'on'=>'search'),
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
			'documents' => array(self::HAS_MANY, 'DocumentTeam', 'ID_TEAM','condition'=>'STATUS=1'),
			'matchGames' => array(self::HAS_MANY, 'MatchGame', 'VISITOR'),
			'matchGames1' => array(self::HAS_MANY, 'MatchGame', 'LOCAL'),
			'iDCATEGORY' => array(self::BELONGS_TO, 'Category', 'ID_CATEGORY'),
			'players' => array(self::HAS_MANY, 'TeamPlayer', 'TEAM_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'ID_CATEGORY' => 'Id Categoría',
			'NAME' => 'Nombre',
			'ADDRESS' => 'Dirección',
			'DESCRIPTION' => 'Descripción',
			'EMAIL' => 'Email',
			'CONTACT_PHONE'=>'Teléfono de contacto',
			'CREATION_DATE' => 'Fecha de creación',
			'ACTIVE' => 'Activo',
		);
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
		$criteria->compare('ADDRESS',$this->ADDRESS,true);
		$criteria->compare('DESCRIPTION',$this->DESCRIPTION,true);
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('CREATION_DATE',$this->CREATION_DATE,true);
		$criteria->compare('ACTIVE',$this->ACTIVE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	
	/**
	 * retrieves a current logo file
	 */
	public function getLogo(){
				
		$documents = new DocumentTeam();
		$documents->ID_TEAM = $this->ID;
		$documents->STATUS = 1;
		$documents->ID_DOCUMENT = 11;
		
		
		foreach ($documents->search()->getData() as $document){
		}
		
		
		$path = isset($document)? $document->PATH : 	$thumbURL =  Yii::app( )->getBaseUrl( ).'/uploads/default/defaultTeam.jpg';
		
		return  $path;
	}
	
	
}