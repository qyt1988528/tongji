<?php

/**
 * This is the model class for table "tongji_data".
 *
 * The followings are the available columns in table 'tongji_data':
 * @property integer $id
 * @property string $title
 * @property integer $ranking
 * @property integer $type
 * @property string $searchtime
 *
 * The followings are the available model relations:
 * @property TongjiType $type0
 */
class TongjiData extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TongjiData the static model class
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
		return 'tongji_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, type_id, searchtime', 'required'),
			array('ranking, type_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, ranking, type_id, searchtime', 'safe', 'on'=>'search'),
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
			'types' => array(self::BELONGS_TO, 'TongjiType', 'type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'ranking' => 'Ranking',
			'type_id' => 'TypeID',
			'searchtime' => 'Searchtime',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('ranking',$this->ranking);
		$criteria->compare('type_id',$this->typeId);
		$criteria->compare('searchtime',$this->searchtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    public function insertData($data) {
        $this->title = $data['title'];
        $this->ranking = $data['ranking'];
        $this->type_id = $data['type'];
        $this->searchtime = $data['searchtime'];
        $this->save();
    }
    public function getOldDatas($days, $data) {
        $criteria = new CDbCriteria;
        $criteria->condition = "type_id=:type_id and title = :title and searchtime > :searchtime";
        $criteria->params = array(':type_id'=>$data->type_id,':title'=>$data->title,':searchtime'=> date("Y-m-d", strtotime("-7 days")) . ' 00-00-00');
        return $this->findAll($criteria);
    }
}
