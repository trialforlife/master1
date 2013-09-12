<?php

/**
 * This is the model class for table "theatre_banner".
 *
 * The followings are the available columns in table 'theatre_banner':
 * @property integer $tb_id
 * @property integer $t_id
 * @property string $tb_banner
 */
class TheatreBanner extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TheatreBanner the static model class
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
		return 'theatre_banner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('t_id, tb_banner', 'required'),
			array('t_id', 'numerical', 'integerOnly'=>true),
			array('tb_banner', 'length', 'max'=>10000),
            array('tb_published', 'in', 'range'=>array(0,1)),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('tb_id, t_id, tb_banner', 'safe', 'on'=>'search'),
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
            'theatres' => array(self::BELONGS_TO, 'Theatre', 't_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
            'tb_id' => 'Cb',
            't_id' => 'Театр',
            'tb_banner' => 'Изображение',
            'tb_published' => 'Видимость',
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

		$criteria->compare('tb_id',$this->tb_id);
		$criteria->compare('t_id',$this->t_id);
		$criteria->compare('tb_banner',$this->tb_banner,true);
        $criteria->compare('tb_published',$this->tb_published);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}