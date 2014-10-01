<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property string $id
 * @property string $title
 * @property string $position
 */
class Category extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, position', 'required'),
			array('title', 'length', 'max'=>100),
			array('position', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, position', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'title' => 'Название',
			'position' => 'Расположение',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('position',$this->position,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function allCategories()
	{
		return CHtml::listData(self::model()->findAll(), 'id', 'title');
	}

	public static function menu($position)
	{
		$models = self::model()->findAllByAttributes(array('position' => $position));
		if ($position == 'top') {
			$array[] = array('label'=>'Главная', 'url'=>array('/site/index'));
			$array[] = array('label'=>'Обратная связь', 'url'=>array('/site/contact'));
		}
		foreach ($models as $model) {
			$array[] = array('label'=>$model->title, 'url'=>array('/page/index/id/' . $model->id));
		}
		if ($position == 'top') {
			$array[] = array('label'=>'Вход', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest);
			$array[] = array('label'=>'Выход ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest);
			$array[] = array('label'=>'Регистрация', 'url'=>array('/site/registration'), 'visible'=>Yii::app()->user->isGuest);
			if (Yii::app()->user->role == "ADMIN") {
				$array[] = array('label'=>'Админка', 'url'=>array('/admin'));
			}
		}

		return $array;
	}
}
