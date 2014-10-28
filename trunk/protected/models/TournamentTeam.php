<?php

/**
 * This is the model class for table "tbl_tournament_team".
 *
 * The followings are the available columns in table 'tbl_tournament_team':
 * @property integer $ID_TOURNAMENT
 * @property integer $ID_TEAM
 * @property integer $STATUS
 * @property string $COMMENT
 * @property integer $ACTIVE
 *
 * The followings are the available model relations:
 * @property Team $iDTEAM
 */
class TournamentTeam extends CActiveRecord
{
	
	private $a_status =  array(
				'0'=>'<h4><i class="icon-ban-circle"></i> Sin confirmar </h4>',
				'1'=>'<i class="icon-thumbs-down"></i> Falta pago Inscripción',
				'2'=>'<i class="icon-folder-open"></i> Falta documentación',
				'3'=>'<i class="icon-ok-circle"></i> Confirmado',
		);
	
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TournamentTeam the static model class
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
		return 'tbl_tournament_team';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_TOURNAMENT, ID_TEAM,STATUS, COMMENT', 'required'),
			array('ID_TOURNAMENT, ID_TEAM,STATUS, ACTIVE', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_TOURNAMENT, ID_TEAM, ACTIVE,STATUS', 'safe', 'on'=>'search'),
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
			'iDTEAM' => array(self::BELONGS_TO, 'Team', 'ID_TEAM'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_TOURNAMENT' => 'Id Tournament',
			'ID_TEAM' => 'Id Team',
			'STATUS' => 'Estatus',
			'COMMENT' => 'Observaciones',
			'ACTIVE' => 'Active',
		);
	}

	
	
	public function getStatus(){
		return  (isset($this->a_status[$this->STATUS])?$this->a_status[$this->STATUS]:'Desconocido');
	}
	
	/**
	 * Returns status of teams inside of tournament
	 * @return multitype:string 
	 */	
	public function getAStatus(){
		
		return $this->a_status;
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

		$criteria->compare('ID_TOURNAMENT',$this->ID_TOURNAMENT);
		$criteria->compare('ID_TEAM',$this->ID_TEAM);
		$criteria->compare('ACTIVE',$this->ACTIVE);
		$criteria->compare('COMMENT',$this->COMMENT);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}