<?php

/**
 * This is the model class for table "tbl_cat_result".
 *
 * The followings are the available columns in table 'tbl_cat_result':
 * @property integer $ID
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property integer $TYPE_RESULT
 * @property integer $ACTIVE
 *
 * The followings are the available model relations:
 * @property MatchGame[] $tblMatchGames
 * @property PlayerResult[] $playerResults
 */
class CatResult extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CatResult the static model class
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
		return 'tbl_cat_result';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TYPE_RESULT,ACTIVE,NAME	', 'required'),
			array('TYPE_RESULT, ACTIVE', 'numerical', 'integerOnly'=>true),
			array('NAME', 'length', 'max'=>50),
			array('DESCRIPTION', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, NAME, DESCRIPTION, TYPE_RESULT, ACTIVE', 'safe', 'on'=>'search'),
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
			'tblMatchGames' => array(self::MANY_MANY, 'MatchGame', 'tbl_match_result(RESULT_ID, MATCH_ID)'),
			'playerResults' => array(self::HAS_MANY, 'PlayerResult', 'RESULT_ID'),
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
			'DESCRIPTION' => 'Description',
			'TYPE_RESULT' => 'Type Result',
			'ACTIVE' => 'Active',
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
		$criteria->compare('DESCRIPTION',$this->DESCRIPTION,true);
		$criteria->compare('TYPE_RESULT',$this->TYPE_RESULT);
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
				0 => 'SELECCIONE',
				1 => 'DISPONIBLE',
				2 => 'NO DISPONIBLE',
		);
	}
	
	/**
	 * Retrieves a list of activeOptions
	 * @return unknown_type
	 */
	public function getTypeResultOptions()
	{
		return array(
				
				1 => 'EQUIPO',
				2 => 'JUGADOR',
				3 => 'PARTIDO',
		);
	}
	
	
}