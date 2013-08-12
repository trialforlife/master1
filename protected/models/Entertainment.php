<?php

/**
 * This is the model class for table "entertainment".
 *
 * The followings are the available columns in table 'entertainment':
 * @property integer $en_id
 * @property string $en_name
 * @property string $en_content
 * @property string $en_image
 * @property string $en_type
 * @property string $en_time
 * @property string $en_price
 * @property string $en_content_add
 * @property integer $en_published
 */
class Entertainment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Entertainment the static model class
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
		return 'entertainment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('en_name, en_content, en_image, en_type, en_time, en_price, en_content_add, en_published', 'required'),
			array('en_published', 'numerical', 'integerOnly'=>true),
			array('en_name, en_type, en_time, en_price', 'length', 'max'=>1000),
			array('en_content_add', 'length', 'max'=>10000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('en_id, en_name, en_content, en_image, en_type, en_time, en_price, en_content_add, en_published', 'safe', 'on'=>'search'),
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
			'en_id' => 'En',
			'en_name' => 'En Name',
			'en_content' => 'En Content',
			'en_image' => 'En Image',
			'en_type' => 'En Type',
			'en_time' => 'En Time',
			'en_price' => 'En Price',
			'en_content_add' => 'En Content Add',
			'en_published' => 'En Published',
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

		$criteria->compare('en_id',$this->en_id);
		$criteria->compare('en_name',$this->en_name,true);
		$criteria->compare('en_content',$this->en_content,true);
		$criteria->compare('en_image',$this->en_image,true);
		$criteria->compare('en_type',$this->en_type,true);
		$criteria->compare('en_time',$this->en_time,true);
		$criteria->compare('en_price',$this->en_price,true);
		$criteria->compare('en_content_add',$this->en_content_add,true);
		$criteria->compare('en_published',$this->en_published);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}