<?php

/**
 * This is the model class for table "play".
 *
 * The followings are the available columns in table 'play':
 * @property integer $p_id
 * @property integer $t_id
 * @property string $p_name
 * @property string $p_time
 * @property string $p_content
 * @property string $p_price
 * @property string $p_image
 * @property integer $p_published
 */
class Play extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'play';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('t_id, p_name, p_time, p_content, p_price, p_image, p_published', 'required'),
			array('t_id, p_published', 'numerical', 'integerOnly'=>true),
			array('p_name, p_price', 'length', 'max'=>1000),
			array('p_image', 'length', 'max'=>10000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('p_id, t_id, p_name, p_time, p_content, p_price, p_image, p_published', 'safe', 'on'=>'search'),
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
			'p_id' => 'Номер',
			't_id' => 'Театр',
			'p_name' => 'Название',
			'p_time' => 'Время',
			'p_content' => 'Описание',
			'p_price' => 'Цена',
			'p_image' => 'Изображение',
			'p_published' => 'Видимость',
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

		$criteria->compare('p_id',$this->p_id);
		$criteria->compare('t_id',$this->t_id);
		$criteria->compare('p_name',$this->p_name,true);
		$criteria->compare('p_time',$this->p_time,true);
		$criteria->compare('p_content',$this->p_content,true);
		$criteria->compare('p_price',$this->p_price,true);
		$criteria->compare('p_image',$this->p_image,true);
		$criteria->compare('p_published',$this->p_published);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Play the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
