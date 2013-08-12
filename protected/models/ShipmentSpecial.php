<?php

/**
 * This is the model class for table "shipment_special".
 *
 * The followings are the available columns in table 'shipment_special':
 * @property integer $ss_id
 * @property integer $s_id
 * @property string $ss_name
 * @property string $ss_image
 * @property string $ss_content
 * @property string $ss_price
 * @property integer $ss_published
 */
class ShipmentSpecial extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ShipmentSpecial the static model class
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
		return 'shipment_special';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('s_id, ss_name, ss_image, ss_content, ss_price, ss_published', 'required'),
			array('s_id, ss_published', 'numerical', 'integerOnly'=>true),
			array('ss_name, ss_price', 'length', 'max'=>1000),
			array('ss_image', 'length', 'max'=>10000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ss_id, s_id, ss_name, ss_image, ss_content, ss_price, ss_published', 'safe', 'on'=>'search'),
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
			'ss_id' => 'Ss',
			's_id' => 'S',
			'ss_name' => 'Ss Name',
			'ss_image' => 'Ss Image',
			'ss_content' => 'Ss Content',
			'ss_price' => 'Ss Price',
			'ss_published' => 'Ss Published',
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

		$criteria->compare('ss_id',$this->ss_id);
		$criteria->compare('s_id',$this->s_id);
		$criteria->compare('ss_name',$this->ss_name,true);
		$criteria->compare('ss_image',$this->ss_image,true);
		$criteria->compare('ss_content',$this->ss_content,true);
		$criteria->compare('ss_price',$this->ss_price,true);
		$criteria->compare('ss_published',$this->ss_published);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}