<?php

/**
 * This is the model class for table "entertainment_banner".
 *
 * The followings are the available columns in table 'entertainment_banner':
 * @property integer $enb_id
 * @property integer $en_id
 * @property string $enb_banner
 */
class EntertainmentBanner extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EntertainmentBanner the static model class
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
		return 'entertainment_banner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('en_id, enb_banner', 'required'),
			array('en_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('enb_id, en_id, enb_banner', 'safe', 'on'=>'search'),
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
			'enb_id' => 'Enb',
			'en_id' => 'En',
			'enb_banner' => 'Enb Banner',
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

		$criteria->compare('enb_id',$this->enb_id);
		$criteria->compare('en_id',$this->en_id);
		$criteria->compare('enb_banner',$this->enb_banner,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}