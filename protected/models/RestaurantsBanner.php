<?php

/**
 * This is the model class for table "restaurants_banner".
 *
 * The followings are the available columns in table 'restaurants_banner':
 * @property integer $rb_id
 * @property integer $r_id
 * @property string $rb_banner
 * @property integer $rb_published
 */
class RestaurantsBanner extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RestaurantsBanner the static model class
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
		return 'restaurants_banner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rb_id, r_id, rb_banner, rb_published', 'required'),
			array('rb_id, r_id, rb_published', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('rb_id, r_id, rb_banner, rb_published', 'safe', 'on'=>'search'),
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
			'rb_id' => 'Rb',
			'r_id' => 'R',
			'rb_banner' => 'Rb Banner',
			'rb_published' => 'Rb Published',
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

		$criteria->compare('rb_id',$this->rb_id);
		$criteria->compare('r_id',$this->r_id);
		$criteria->compare('rb_banner',$this->rb_banner,true);
		$criteria->compare('rb_published',$this->rb_published);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}