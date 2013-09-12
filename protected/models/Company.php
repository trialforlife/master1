<?php

/**
 * This is the model class for table "company".
 *
 * The followings are the available columns in table 'company':
 * @property integer $com_id
 * @property string $com_quote
 * @property string $com_logo
 * @property string $com_description
 * @property string $com_phone
 * @property string $com_site
 * @property integer $com_published
 */
class Company extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'company';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('com_quote, com_logo, com_description, com_phone, com_site, com_published', 'required'),
			array('com_published', 'numerical', 'integerOnly'=>true),
			array('com_phone', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('com_id, com_quote, com_logo, com_description, com_phone, com_site, com_published', 'safe', 'on'=>'search'),
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
			'com_id' => 'Com',
			'com_quote' => 'Com Quote',
			'com_logo' => 'Com Logo',
			'com_description' => 'Com Description',
			'com_phone' => 'Com Phone',
			'com_site' => 'Com Site',
			'com_published' => 'Com Published',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('com_id',$this->com_id);
		$criteria->compare('com_quote',$this->com_quote,true);
		$criteria->compare('com_logo',$this->com_logo,true);
		$criteria->compare('com_description',$this->com_description,true);
		$criteria->compare('com_phone',$this->com_phone,true);
		$criteria->compare('com_site',$this->com_site,true);
		$criteria->compare('com_published',$this->com_published);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Company the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
