<?php

/**
 * This is the model class for table "beautyandhealth".
 *
 * The followings are the available columns in table 'beautyandhealth':
 * @property integer $bh_id
 * @property string $bh_name
 * @property string $bh_image
 * @property integer $bh_published
 * @property string $bh_adress
 * @property string $bh_phone
 * @property string $bh_banner
 */
class Beautyandhealth extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'beautyandhealth';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bh_name, bh_image, bh_published, bh_adress, bh_phone', 'required'),
			array('bh_published', 'numerical', 'integerOnly'=>true),
			array('bh_phone', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('bh_id, bh_name, bh_image, bh_published, bh_adress, bh_phone, bh_banner', 'safe', 'on'=>'search'),
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
			'bh_id' => 'Номер',
			'bh_name' => 'Название',
			'bh_image' => 'Изображение',
			'bh_published' => 'Видимость',
			'bh_adress' => 'Адресс',
			'bh_phone' => 'Телефон',
			'bh_banner' => 'Баннер',
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

		$criteria->compare('bh_id',$this->bh_id);
		$criteria->compare('bh_name',$this->bh_name,true);
		$criteria->compare('bh_image',$this->bh_image,true);
		$criteria->compare('bh_published',$this->bh_published);
		$criteria->compare('bh_adress',$this->bh_adress,true);
		$criteria->compare('bh_phone',$this->bh_phone,true);
		$criteria->compare('bh_banner',$this->bh_banner,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Beautyandhealth the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
