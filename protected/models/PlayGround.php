<?php

/**
 * This is the model class for table "tbl_play_ground".
 *
 * The followings are the available columns in table 'tbl_play_ground':
 * @property integer $ID
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $ADDRESS
 * @property string $PHONE_NUMBER
 * @property integer $ACTIVE
 * @property string $MAP_STRING
 *
 * The followings are the available model relations:
 * @property MatchGame[] $matchGames
 */
class PlayGround extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PlayGround the static model class
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
		return 'tbl_play_ground';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ACTIVE', 'numerical', 'integerOnly'=>true),
			array('NAME', 'length', 'max'=>50),
			array('DESCRIPTION, ADDRESS', 'length', 'max'=>100),
			array('PHONE_NUMBER', 'length', 'max'=>30),
			array('MAP_STRING', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, NAME, DESCRIPTION, ADDRESS, PHONE_NUMBER, ACTIVE, MAP_STRING', 'safe', 'on'=>'search'),
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
			'matchGames' => array(self::HAS_MANY, 'MatchGame', 'PLAY_GROUND_ID'),
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
			'ADDRESS' => 'Address',
			'PHONE_NUMBER' => 'Phone Number',
			'ACTIVE' => 'Active',
			'MAP_STRING' => 'Map String',
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
		$criteria->compare('ADDRESS',$this->ADDRESS,true);
		$criteria->compare('PHONE_NUMBER',$this->PHONE_NUMBER,true);
		$criteria->compare('ACTIVE',$this->ACTIVE);
		$criteria->compare('MAP_STRING',$this->MAP_STRING,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}



	public function getActiveOptions()
	{
		return array(
			0 => 'SELECCIONE',
				1 => 'DISPONIBLE',
				2 => 'NO DISPONIBLE',
			
	
		);
	}





}


