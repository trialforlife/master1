<?php

/**
 * This is the model class for table "cinema_banner".
 *
 * The followings are the available columns in table 'cinema_banner':
 * @property integer $cb_id
 * @property integer $c_id
 * @property string $banner
 */
class CinemaBanner extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CinemaBanner the static model class
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
		return 'cinema_banner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('c_id, cb_banner, cb_published', 'required'),
			array('c_id', 'numerical', 'integerOnly'=>true),
            array('cb_published', 'in', 'range'=>array(0,1)),
            array('cb_banner', 'length', 'max'=>10000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cb_id, c_id, cb_banner', 'safe', 'on'=>'search'),
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
            'cinemas' => array(self::BELONGS_TO, 'Cinema', 'c_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cb_id' => 'Cb',
			'c_id' => 'Кинотеатр',
			'cb_banner' => 'Изображение',
            'cb_published' => 'Видимость',
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

		$criteria->compare('cb_id',$this->cb_id);
		$criteria->compare('c_id',$this->c_id);
		$criteria->compare('cb_banner',$this->cb_banner,true);
        $criteria->compare('cb_published',$this->cb_published);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}