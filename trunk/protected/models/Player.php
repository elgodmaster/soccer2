<?php

/**
 * This is the model class for table "tbl_player".
 *
 * The followings are the available columns in table 'tbl_player':
 * @property integer $ID
 * @property string $NAME
 * @property string $BIRTH
 * @property string $PHONE
 * @property string $EMAIL
 * @property string $ADDRESS
 * @property string $FACE_BOOK
 * @property string $TWITER
 * @property integer $GENDER
 * @property integer $ACTIVE
 *
 * The followings are the available model relations:
 * @property DocumentPlayer[] $documentPlayers
 * @property PlayerResult[] $playerResults
 * @property Team[] $tblTeams
 * @property TeamPlayer $teamPlayer
 */
class Player extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Player the static model class
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
		return 'tbl_player';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('GENDER, ACTIVE, NAME, BIRTH','required'), 
			array('GENDER, ACTIVE', 'numerical', 'integerOnly'=>true),
			array('NAME, PHONE, EMAIL, FACE_BOOK, TWITER', 'length', 'max'=>50),
			array('ADDRESS', 'length', 'max'=>300),
			array('BIRTH', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, NAME, BIRTH, PHONE, EMAIL, ADDRESS, FACE_BOOK, TWITER, GENDER, ACTIVE', 'safe', 'on'=>'search'),
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
			'documents' => array(self::HAS_MANY, 'DocumentPlayer', 'ID_PLAYER', 'condition'=>'STATUS=1'),
			'playerResults' => array(self::HAS_MANY, 'PlayerResult', 'PLAYER_ID'),
			'tblTeams' => array(self::MANY_MANY, 'Team', 'tbl_team_player(PLAYER_ID, TEAM_ID)'),
			'teamPlayer' => array(self::BELONGS_TO, 'TeamPlayer', 'ID'),
				
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'NAME' => 'Nombre',
			'BIRTH' => 'Edad',
			'PHONE' => 'Telefono',
			'EMAIL' => 'Correo Electronico',
			'ADDRESS' => 'Dirección',
			'FACE_BOOK' => 'Face Book',
			'TWITER' => 'Twiter',
			'GENDER' => 'Sexo',
			'ACTIVE' => 'Active',
		);
	}
	
	/**
	 * Retrieves a list of genders
	 * @return unknown_type
	 */
	public function getGenderOptions()
	{
		return array(
				'' => 'SELECCIONE',
				1 => 'Hombre',
				2 => 'Mujer',
		);
	}
	
	
	/**
	 * Retrieves a list of activeOptions
	 * @return unknown_type
	 */
	public function getEnabledOptions()
	{
		return array(
				0 => 'SELECCIONE',
				1 => 'DISPONIBLE',
				2 => 'NO DISPONIBLE',
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
		$criteria->compare('NAME',$this->NAME,true);
		$criteria->compare('BIRTH',$this->BIRTH,true);
		$criteria->compare('PHONE',$this->PHONE,true);
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('ADDRESS',$this->ADDRESS,true);
		$criteria->compare('FACE_BOOK',$this->FACE_BOOK,true);
		$criteria->compare('TWITER',$this->TWITER,true);
		$criteria->compare('GENDER',$this->GENDER);
		$criteria->compare('ACTIVE',$this->ACTIVE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function searchList($teamId)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
	
		$criteria=new CDbCriteria;
		//$criteria->addInCondition('ID',$arraySearch);
		
		$criteria->mergeWith(array(
				'join'=>'LEFT JOIN tbl_team_player pt ON pt.PLAYER_ID = t.ID',
				'condition'=>'pt.TEAM_ID = '.$teamId,
		));
		
		
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	
	/**
	 * This funciont retrieves Player's Age
	 * 
	 * @return integer
	 */
	
	public function getAge(){
		return floor((time() - strtotime($this->BIRTH))/31556926); 
	}
	
}