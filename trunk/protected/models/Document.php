<?php

/**
 * This is the model class for table "tbl_document".
 *
 * The followings are the available columns in table 'tbl_document':
 * @property integer $ID
 * @property string $NAME
 * @property integer $TYPE_DOCUMENT
 * @property string $DESCRIPTION
 *
 * The followings are the available model relations:
 * @property DocumentPlayer[] $documentPlayers
 * @property DocumentTeam[] $documentTeams
 */
class Document extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Document the static model class
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
		return 'tbl_document';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TYPE_DOCUMENT,  NAME','required'),
			array('TYPE_DOCUMENT', 'numerical', 'integerOnly'=>true),
			array('NAME', 'length', 'max'=>100),
			array('DESCRIPTION', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, NAME, TYPE_DOCUMENT, DESCRIPTION', 'safe', 'on'=>'search'),
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
			'documentPlayers' => array(self::HAS_MANY, 'DocumentPlayer', 'ID_DOCUMENT'),
			'documentTeams' => array(self::HAS_MANY, 'DocumentTeam', 'ID_DOCUMENT'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'NAME' => 'Name',
			'TYPE_DOCUMENT' => 'Type Document',
			'DESCRIPTION' => 'Description',
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

	//	$criteria->compare('ID',$this->ID);
	//	$criteria->compare('NAME',$this->NAME,true);
		$criteria->compare('TYPE_DOCUMENT',$this->TYPE_DOCUMENT);
	//	$criteria->compare('DESCRIPTION',$this->DESCRIPTION,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	/**
	 * Retrieves a list of activeOptions
	 * @return unknown_type
	 */
	public function getTypeDocumentOptions()
	{
		return array(
				'' => 'SELECCIONE',
				1 => 'EQUIPO',
				2 => 'JUGADOR',
				3 => 'TORNEO',
				4 => 'LIGA',
				5 => 'ARBITRO'
				
		);
	}
}