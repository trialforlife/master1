<?php

/**
 * This is the model class for table "events".
 *
 * The followings are the available columns in table 'events':
 * @property integer $ev_id
 * @property string $ev_name
 * @property string $ev_time
 * @property string $ev_image
 * @property string $ev_content
 * @property integer $ev_published
 */
class Events extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Events the static model class
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
		return 'events';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ev_name, ev_time, ev_image, ev_content, ev_published', 'required'),
			array('ev_published', 'numerical', 'integerOnly'=>true),
			array('ev_name', 'length', 'max'=>1000),
			array('ev_time', 'length', 'max'=>10000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ev_id, ev_name, ev_time, ev_image, ev_content, ev_published', 'safe', 'on'=>'search'),
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
			'ev_id' => 'Ev',
			'ev_name' => 'Ev Name',
			'ev_time' => 'Ev Time',
			'ev_image' => 'Ev Image',
			'ev_content' => 'Ev Content',
			'ev_published' => 'Ev Published',
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

		$criteria->compare('ev_id',$this->ev_id);
		$criteria->compare('ev_name',$this->ev_name,true);
		$criteria->compare('ev_time',$this->ev_time,true);
		$criteria->compare('ev_image',$this->ev_image,true);
		$criteria->compare('ev_content',$this->ev_content,true);
		$criteria->compare('ev_published',$this->ev_published);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}