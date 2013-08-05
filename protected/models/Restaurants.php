<?php

/**
 * This is the model class for table "restaurants".
 *
 * The followings are the available columns in table 'restaurants':
 * @property integer $r_id
 * @property string $r_name
 * @property string $r_image
 * @property integer $r_published
 */
class Restaurants extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Restaurants the static model class
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
		return 'restaurants';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('r_name, r_image, r_published', 'required'),
			array('r_published', 'numerical', 'integerOnly'=>true),
			array('r_name', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('r_id, r_name, r_image, r_published', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'r_id' => 'R',
			'r_name' => 'R Name',
			'r_image' => 'R Image',
			'r_published' => 'R Published',
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

		$criteria->compare('r_id',$this->r_id);
		$criteria->compare('r_name',$this->r_name,true);
		$criteria->compare('r_image',$this->r_image,true);
		$criteria->compare('r_published',$this->r_published);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}