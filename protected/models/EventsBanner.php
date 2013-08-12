<?php

/**
 * This is the model class for table "events_banner".
 *
 * The followings are the available columns in table 'events_banner':
 * @property integer $evb_id
 * @property integer $ev_id
 * @property string $evb_banner
 * @property integer $evb_published
 */
class EventsBanner extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EventsBanner the static model class
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
		return 'events_banner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ev_id, evb_banner, evb_published', 'required'),
			array('ev_id, evb_published', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('evb_id, ev_id, evb_banner, evb_published', 'safe', 'on'=>'search'),
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
			'evb_id' => 'Evb',
			'ev_id' => 'Ev',
			'evb_banner' => 'Evb Banner',
			'evb_published' => 'Evb Published',
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

		$criteria->compare('evb_id',$this->evb_id);
		$criteria->compare('ev_id',$this->ev_id);
		$criteria->compare('evb_banner',$this->evb_banner,true);
		$criteria->compare('evb_published',$this->evb_published);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}