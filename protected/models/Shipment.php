<?php

/**
 * This is the model class for table "shipment".
 *
 * The followings are the available columns in table 'shipment':
 * @property integer $s_id
 * @property string $s_name
 * @property string $s_content
 * @property string $s_image
 * @property integer $s_published
 */
class Shipment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Shipment the static model class
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
		return 'shipment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('s_id, s_name, s_content, s_image, s_published', 'required'),
			array('s_id, s_published', 'numerical', 'integerOnly'=>true),
			array('s_name', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('s_id, s_name, s_content, s_image, s_published', 'safe', 'on'=>'search'),
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
			's_id' => 'S',
			's_name' => 'S Name',
			's_content' => 'S Content',
			's_image' => 'S Image',
			's_published' => 'S Published',
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

		$criteria->compare('s_id',$this->s_id);
		$criteria->compare('s_name',$this->s_name,true);
		$criteria->compare('s_content',$this->s_content,true);
		$criteria->compare('s_image',$this->s_image,true);
		$criteria->compare('s_published',$this->s_published);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}