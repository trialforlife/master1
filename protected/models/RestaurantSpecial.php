<?php

/**
 * This is the model class for table "restaurant_special".
 *
 * The followings are the available columns in table 'restaurant_special':
 * @property integer $rs_id
 * @property integer $r_id
 * @property string $rs_name
 * @property string $rs_image
 * @property string $rs_content
 * @property string $rs_price
 * @property integer $rs_published
 */
class RestaurantSpecial extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RestaurantSpecial the static model class
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
		return 'restaurant_special';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('r_id, rs_name, rs_image, rs_content, rs_price, rs_published', 'required'),
			array('r_id, rs_published', 'numerical', 'integerOnly'=>true),
			array('rs_name, rs_price', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('rs_id, r_id, rs_name, rs_image, rs_content, rs_price, rs_published', 'safe', 'on'=>'search'),
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
			'rs_id' => 'Rs',
			'r_id' => 'R',
			'rs_name' => 'Rs Name',
			'rs_image' => 'Rs Image',
			'rs_content' => 'Rs Content',
			'rs_price' => 'Rs Price',
			'rs_published' => 'Rs Published',
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

		$criteria->compare('rs_id',$this->rs_id);
		$criteria->compare('r_id',$this->r_id);
		$criteria->compare('rs_name',$this->rs_name,true);
		$criteria->compare('rs_image',$this->rs_image,true);
		$criteria->compare('rs_content',$this->rs_content,true);
		$criteria->compare('rs_price',$this->rs_price,true);
		$criteria->compare('rs_published',$this->rs_published);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}