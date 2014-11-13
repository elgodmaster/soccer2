<?php

/**
 * This is the model class for table "tbl_referee".
 *
 * The followings are the available columns in table 'tbl_referee':
 * @property integer $ID
 * @property string $NAME
 * @property string $ADDRESS
 * @property string $EMAIL
 * @property string $PHONE
 * @property integer $DATE_UP
 * @property integer $ACTIVE
 *
 * The followings are the available model relations:
 * @property MatchGame[] $matchGames
 */
class Referee extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Referee the static model class
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
		return 'tbl_referee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NAME, PHONE, DATE_UP, ACTIVE,ADDRESS,EMAIL', 'required'),
			array('DATE_UP, ACTIVE', 'numerical', 'integerOnly'=>true),
			array('NAME, EMAIL', 'length', 'max'=>300),
			array('ADDRESS', 'length', 'max'=>500),
			array('PHONE', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, NAME, ADDRESS, EMAIL, PHONE, DATE_UP, ACTIVE', 'safe', 'on'=>'search'),
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
			'matchGames' => array(self::HAS_MANY, 'MatchGame', 'ID_REFEREE'),
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
			'ADDRESS' => 'Dirección',
			'EMAIL' => 'Email',
			'PHONE' => 'Teléfono',
			'DATE_UP' => 'Dia ',
			'ACTIVE' => 'Activar',
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
		$criteria->compare('ADDRESS',$this->ADDRESS,true);
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('PHONE',$this->PHONE,true);
		$criteria->compare('DATE_UP',$this->DATE_UP);
		$criteria->compare('ACTIVE',$this->ACTIVE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}