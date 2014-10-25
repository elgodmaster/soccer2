<?php

/**
 * This is the model class for table "tbl_category".
 *
 * The followings are the available columns in table 'tbl_category':
 * @property integer $ID_CATEGORY
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property integer $MAX_YEAR
 * @property integer $MIN_YEAR
 * @property integer $GENDER
 * @property integer $ACTIVE
 *
 * The followings are the available model relations:
 * @property Team[] $teams
 */
class Category extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Category the static model class
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
		return 'tbl_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('MAX_YEAR, MIN_YEAR,NAME', 'required'),
			array('MAX_YEAR, MIN_YEAR, ACTIVE,GENDER', 'numerical', 'integerOnly'=>true),
			array('NAME', 'length', 'max'=>200),
			array('DESCRIPTION', 'length', 'max'=>300),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_CATEGORY, NAME,GENDER, DESCRIPTION, MAX_YEAR, MIN_YEAR, ACTIVE', 'safe', 'on'=>'search'),
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
			'teams' => array(self::HAS_MANY, 'Team', 'ID_CATEGORY'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_CATEGORY' => 'Id Category',
			'NAME' => 'Name',
			'DESCRIPTION' => 'Description',
			'MAX_YEAR' => 'Max Year',
			'MIN_YEAR' => 'Min Year',
			'GENDER' => 'SEXO',
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

		$criteria->compare('ID_CATEGORY',$this->ID_CATEGORY);
		$criteria->compare('NAME',$this->NAME,true);
		$criteria->compare('DESCRIPTION',$this->DESCRIPTION,true);
		$criteria->compare('MAX_YEAR',$this->MAX_YEAR);
		$criteria->compare('MIN_YEAR',$this->MIN_YEAR);
		$criteria->compare('GENDER',$this->GENDER);
		$criteria->compare('ACTIVE',$this->ACTIVE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	
}


public function getYearOptions()
{
	return array(

			0 => 'Todos',
			5 => '5 años',
			10 => '10 Años',
			15 => '15 Años',
			20 => '20 Años',
			25 => '25 Años',
			30 => '30 Años',
			31 => 'Mas de 30 Años',
				
	);
}




public function getTypeActiveOptions()
{
	return array(

			1 => 'DISPONIBLE',
			2 => 'NO DISPONIBLE',
			
	);
}

public function getGenderOptions()
{
	return array(

			1 => 'Solo Hombres',
			2 => 'Solo Mujeres',
			3 => 'Cualquiera',
			
	);
}



}