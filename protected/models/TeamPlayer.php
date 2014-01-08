<?php

/**
 * This is the model class for table "tbl_team_player".
 *
 * The followings are the available columns in table 'tbl_team_player':
 * @property integer $PLAYER_ID
 * @property integer $TEAM_ID
 * @property integer $ROLE_ID
 * @property string $ADD_DATE
 * @property integer $ACTIVE
 * @property string $NUMBER
 * @property string $ALIAS
 */
class TeamPlayer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TeamPlayer the static model class
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
		return 'tbl_team_player';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PLAYER_ID, TEAM_ID, ROLE_ID', 'required'),
			array('PLAYER_ID, TEAM_ID, ROLE_ID, ACTIVE', 'numerical', 'integerOnly'=>true),
			array('NUMBER', 'length', 'max'=>100),
			array('ALIAS', 'length', 'max'=>200),
			array('ADD_DATE', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('PLAYER_ID, TEAM_ID, ROLE_ID, ADD_DATE, ACTIVE, NUMBER, ALIAS', 'safe', 'on'=>'search'),
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
				'tEAM' => array(self::BELONGS_TO, 'Team', 'TEAM_ID'),
				'pLAYER' => array(self::BELONGS_TO, 'Player', 'PLAYER_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'PLAYER_ID' => 'Player',
			'TEAM_ID' => 'Team',
			'ROLE_ID' => 'Role',
			'ADD_DATE' => 'Add Date',
			'ACTIVE' => 'Active',
			'NUMBER' => 'Number',
			'ALIAS' => 'Alias',
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

//		$criteria->compare('PLAYER_ID',$this->PLAYER_ID);
		$criteria->compare('TEAM_ID',$this->TEAM_ID);
	/*	$criteria->compare('ROLE_ID',$this->ROLE_ID);
		$criteria->compare('ADD_DATE',$this->ADD_DATE,true);
		$criteria->compare('ACTIVE',$this->ACTIVE);
		$criteria->compare('NUMBER',$this->NUMBER,true);
		$criteria->compare('ALIAS',$this->ALIAS,true);
*/
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}