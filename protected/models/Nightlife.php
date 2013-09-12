<?php

/**
 * This is the model class for table "nightlife".
 *
 * The followings are the available columns in table 'nightlife':
 * @property integer $n_id
 * @property string $n_name
 * @property string $n_image
 * @property string $n_adress
 * @property string $n_time
 * @property string $n_date
 * @property string $n_banner
 * @property string $n_site
 * @property string $n_phone
 * @property string $n_content
 * @property integer $n_published
 */
class Nightlife extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'nightlife';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('n_name, n_image, n_adress, n_time, n_date, n_banner, n_site, n_phone, n_content, n_published', 'required'),
			array('n_published', 'numerical', 'integerOnly'=>true),
			array('n_name, n_phone', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('n_id, n_name, n_image, n_adress, n_time, n_date, n_banner, n_site, n_phone, n_content, n_published', 'safe', 'on'=>'search'),
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
			'n_id' => 'Номер',
			'n_name' => 'Название',
			'n_image' => 'Изображение в меню',
			'n_adress' => 'Адресс',
			'n_time' => 'Время',
			'n_date' => 'Дата',
			'n_banner' => 'Баннер',
			'n_site' => 'Сайт',
			'n_phone' => 'Телефон',
			'n_content' => 'Контент',
			'n_published' => 'Видимость',
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

		$criteria->compare('n_id',$this->n_id);
		$criteria->compare('n_name',$this->n_name,true);
		$criteria->compare('n_image',$this->n_image,true);
		$criteria->compare('n_adress',$this->n_adress,true);
		$criteria->compare('n_time',$this->n_time,true);
		$criteria->compare('n_date',$this->n_date,true);
		$criteria->compare('n_banner',$this->n_banner,true);
		$criteria->compare('n_site',$this->n_site,true);
		$criteria->compare('n_phone',$this->n_phone,true);
		$criteria->compare('n_content',$this->n_content,true);
		$criteria->compare('n_published',$this->n_published);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Nightlife the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
