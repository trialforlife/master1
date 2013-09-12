<?php

/**
 * This is the model class for table "shipment".
 *
 * The followings are the available columns in table 'shipment':
 * @property integer $s_id
 * @property string $s_name
 * @property string $s_content
 * @property string $s_phone
 * @property string $s_image
 * @property string $s_type
 * @property integer $s_published
 * @property string $s_site
 * @property string $s_banner
 * @property string $s_adress
 * @property string $s_special
 */
class Shipment extends CActiveRecord
{
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
			array('s_name, s_content, s_phone, s_image, s_type, s_published, s_site, s_adress, s_special', 'required'),
			array('s_published', 'numerical', 'integerOnly'=>true),
			array('s_name, s_phone, s_type', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('s_id, s_name, s_content, s_phone, s_image, s_type, s_published, s_site, s_banner, s_adress, s_special', 'safe', 'on'=>'search'),
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
			's_id' => 'Номер',
			's_name' => 'Название',
			's_content' => 'Описание',
			's_phone' => 'Телефон',
			's_image' => 'Изображение',
			's_type' => 'Тип',
			's_published' => 'Видимость',
			's_site' => 'Сайт',
			's_banner' => 'S Banner',
			's_adress' => 'Адресс',
			's_special' => 'Специальное предложение',
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

		$criteria->compare('s_id',$this->s_id);
		$criteria->compare('s_name',$this->s_name,true);
		$criteria->compare('s_content',$this->s_content,true);
		$criteria->compare('s_phone',$this->s_phone,true);
		$criteria->compare('s_image',$this->s_image,true);
		$criteria->compare('s_type',$this->s_type,true);
		$criteria->compare('s_published',$this->s_published);
		$criteria->compare('s_site',$this->s_site,true);
		$criteria->compare('s_banner',$this->s_banner,true);
		$criteria->compare('s_adress',$this->s_adress,true);
		$criteria->compare('s_special',$this->s_special,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Shipment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
