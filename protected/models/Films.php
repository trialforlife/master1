<?php

/**
 * This is the model class for table "films".
 *
 * The followings are the available columns in table 'films':
 * @property integer $f_id
 * @property integer $c_id
 * @property string $f_name
 * @property string $f_time
 * @property string $f_price
 * @property string $f_content
 * @property string $f_image
 */
class Films extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Films the static model class
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
		return 'films';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('c_id, f_name, f_time, f_price, f_content, f_image', 'required'),
			array('c_id', 'numerical', 'integerOnly'=>true),
			array('f_name, f_price', 'length', 'max'=>1000),
			array('f_time', 'length', 'max'=>10000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('f_id, c_id, f_name, f_time, f_price, f_content, f_image', 'safe', 'on'=>'search'),
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
			'f_id' => 'F',
			'c_id' => 'C',
			'f_name' => 'F Name',
			'f_time' => 'F Time',
			'f_price' => 'F Price',
			'f_content' => 'F Content',
			'f_image' => 'F Image',
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

		$criteria->compare('f_id',$this->f_id);
		$criteria->compare('c_id',$this->c_id);
		$criteria->compare('f_name',$this->f_name,true);
		$criteria->compare('f_time',$this->f_time,true);
		$criteria->compare('f_price',$this->f_price,true);
		$criteria->compare('f_content',$this->f_content,true);
		$criteria->compare('f_image',$this->f_image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}