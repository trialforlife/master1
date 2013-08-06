<?php

/**
 * This is the model class for table "cinema".
 *
 * The followings are the available columns in table 'cinema':
 * @property integer $c_id
 * @property string $c_name
 * @property string $c_adress
 */
class Cinema extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cinema the static model class
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
		return 'cinema';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('c_name, c_adress', 'required'),
			array('c_name', 'length', 'max'=>1000),
			array('c_published', 'in', 'range'=>array(0,1)),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('c_id, c_name, c_adress', 'safe', 'on'=>'search'),
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
			/*'c_id' => array(self::BELONGS_TO, 'cinema_banner', 'c_id'),
        	'cinema' => array(self::HAS_MANY, 'cinema_banner', 'c_id',
            'condition'=>'cinema_banner.cb_published = 1',//для админки нужно убрать
            //'order'=>'comments.create_time DESC'),
        	'cinemaCount' => array(self::STAT, 'cinema', 'c_id',
            'condition'=>'status='cinemaCount.c_published::STATUS_APPROVED),
            */
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'c_id' => 'C',
			'c_name' => 'C Name',
			'c_adress' => 'C Adress',
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

		$criteria->compare('c_id',$this->c_id);
		$criteria->compare('c_name',$this->c_name,true);
		$criteria->compare('c_adress',$this->c_adress,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}