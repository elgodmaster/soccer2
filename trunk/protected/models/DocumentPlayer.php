<?php

/**
 * This is the model class for table "tbl_document_player".
 *
 * The followings are the available columns in table 'tbl_document_player':
 * @property integer $ID_DOCUMENT_PLAYER
 * @property integer $ID_DOCUMENT
 * @property integer $ID_PLAYER
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
 * @property Player $iDPLAYER
 */
class DocumentPlayer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DocumentPlayer the static model class
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
		return 'tbl_document_player';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_DOCUMENT, ID_PLAYER, SIZE', 'numerical', 'integerOnly'=>true),
			array('PATH', 'length', 'max'=>300),
			array('NAME', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_DOCUMENT, ID_PLAYER, PATH, SIZE, NAME', 'safe', 'on'=>'search'),
		);
	}
	
	/**
	 * retrieves Owner id of document
	 * @param Integer $id
	 */
	public function getOwnerId() {
	
		return	$this->ID_PLAYER;
	}
	
	
	
	/**
	 * Set Owner id of document
	 * @param Integer $id
	 */
	public function setOwnerId($id) {
		
		$this->ID_PLAYER=$id;
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
			'iDPLAYER' => array(self::BELONGS_TO, 'Player', 'ID_PLAYER'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_DOCUMENT' => 'Id Document',
			'ID_PLAYER' => 'Id Player',
			'PATH' => 'Path',
			'SIZE' => 'Size',
			'NAME' => 'Name',
				'DESCRIPTION' => 'Description',
				'THUMBNAIL' => 'Thumbnail',
				'TYPE' => 'Type',
				'DELTYPE' => 'Delete Type',
				'DELURL' => 'Delete URL',
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

		$criteria->compare('ID_DOCUMENT',$this->ID_DOCUMENT);
		$criteria->compare('ID_PLAYER',$this->ID_PLAYER);
		$criteria->compare('STATUS',$this->STATUS);
		//$criteria->compare('SIZE',$this->SIZE);
		//$criteria->compare('NAME',$this->NAME,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}