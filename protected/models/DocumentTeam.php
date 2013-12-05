<?php

/**
 * This is the model class for table "tbl_document_team".
 *
 * The followings are the available columns in table 'tbl_document_team':
 * @property integer $ID_DOCUMENT_TEAM
 * @property integer $ID_DOCUMENT
 * @property integer $ID_TEAM
 * @property string $PATH
 * @property integer $SIZE
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $THUMBNAIL
 * @property string $TYPE
 * @property string $DELTYPE
 * @property string $DELURL
 * @property integer $STATUS
 *
 * The followings are the available model relations:
 * @property Document $iDDOCUMENT
 * @property Team $iDTEAM
 */
class DocumentTeam extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DocumentTeam the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	
	/**
	 * Set Owner id of document
	 * @param Integer $id
	 */
	public function setOwnerId($id) {
	
		$this->ID_TEAM=$id;
	}
	
	/**
	 * retrieves Owner id of document
	 * @param Integer $id
	 */
	public function getOwnerId() {
	
	 return	$this->ID_TEAM;
	}
	
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_document_team';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_DOCUMENT, ID_TEAM, SIZE, STATUS', 'numerical', 'integerOnly'=>true),
			array('PATH, THUMBNAIL, DELTYPE, DELURL', 'length', 'max'=>300),
			array('NAME, TYPE', 'length', 'max'=>100),
			array('DESCRIPTION', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_DOCUMENT_TEAM, ID_DOCUMENT, ID_TEAM, PATH, SIZE, NAME, DESCRIPTION, THUMBNAIL, TYPE, DELTYPE, DELURL, STATUS', 'safe', 'on'=>'search'),
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
			'iDDOCUMENT' => array(self::BELONGS_TO, 'Document', 'ID_DOCUMENT'),
			'iDTEAM' => array(self::BELONGS_TO, 'Team', 'ID_TEAM'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_DOCUMENT_TEAM' => 'Id Document Team',
			'ID_DOCUMENT' => 'Id Document',
			'ID_TEAM' => 'Id Team',
			'PATH' => 'Path',
			'SIZE' => 'Size',
			'NAME' => 'Name',
			'DESCRIPTION' => 'Description',
			'THUMBNAIL' => 'Thumbnail',
			'TYPE' => 'Type',
			'DELTYPE' => 'Deltype',
			'DELURL' => 'Delurl',
			'STATUS' => 'Status',
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

		$criteria->compare('ID_DOCUMENT_TEAM',$this->ID_DOCUMENT_TEAM);
		$criteria->compare('ID_DOCUMENT',$this->ID_DOCUMENT);
		$criteria->compare('ID_TEAM',$this->ID_TEAM);
		$criteria->compare('PATH',$this->PATH,true);
		$criteria->compare('SIZE',$this->SIZE);
		$criteria->compare('NAME',$this->NAME,true);
		$criteria->compare('DESCRIPTION',$this->DESCRIPTION,true);
		$criteria->compare('THUMBNAIL',$this->THUMBNAIL,true);
		$criteria->compare('TYPE',$this->TYPE,true);
		$criteria->compare('DELTYPE',$this->DELTYPE,true);
		$criteria->compare('DELURL',$this->DELURL,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}