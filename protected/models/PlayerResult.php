<?php

/**
 * This is the model class for table "tbl_player_result".
 *
 * The followings are the available columns in table 'tbl_player_result':
 * @property integer $RESULT_ID
 * @property integer $PLAYER_ID
 * @property integer $MATCH_ID
 * @property integer $TOTAL
 * @property string $COMMENT
 *
 * The followings are the available model relations:
 * @property CatResult $rESULT
 * @property Player $pLAYER
 * @property MatchGame $mATCH
 */
class PlayerResult extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PlayerResult the static model class
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
		return 'tbl_player_result';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('RESULT_ID, PLAYER_ID, MATCH_ID', 'required'),
			array('RESULT_ID, PLAYER_ID, MATCH_ID, TOTAL', 'numerical', 'integerOnly'=>true),
			array('COMMENT', 'length', 'max'=>300),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('RESULT_ID, PLAYER_ID, MATCH_ID, TOTAL, COMMENT', 'safe', 'on'=>'search'),
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
			'rESULT' => array(self::BELONGS_TO, 'CatResult', 'RESULT_ID'),
			'pLAYER' => array(self::BELONGS_TO, 'Player', 'PLAYER_ID'),
			'mATCH' => array(self::BELONGS_TO, 'MatchGame', 'MATCH_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'RESULT_ID' => 'Result',
			'PLAYER_ID' => 'Player',
			'MATCH_ID' => 'Match',
			'TOTAL' => 'Total',
			'COMMENT' => 'Comment',
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

		$criteria->compare('RESULT_ID',$this->RESULT_ID);
		$criteria->compare('PLAYER_ID',$this->PLAYER_ID);
		$criteria->compare('MATCH_ID',$this->MATCH_ID);
		$criteria->compare('TOTAL',$this->TOTAL);
		$criteria->compare('COMMENT',$this->COMMENT,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}