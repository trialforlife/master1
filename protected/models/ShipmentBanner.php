<?php

/**
 * This is the model class for table "shipment_banner".
 *
 * The followings are the available columns in table 'shipment_banner':
 * @property integer $sb_id
 * @property integer $s_id
 * @property string $sb_banner
 */
class ShipmentBanner extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ShipmentBanner the static model class
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
		return 'shipment_banner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sb_id, s_id, sb_banner', 'required'),
			array('sb_id, s_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('sb_id, s_id, sb_banner', 'safe', 'on'=>'search'),
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
			'sb_id' => 'Sb',
			's_id' => 'S',
			'sb_banner' => 'Sb Banner',
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

		$criteria->compare('sb_id',$this->sb_id);
		$criteria->compare('s_id',$this->s_id);
		$criteria->compare('sb_banner',$this->sb_banner,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}