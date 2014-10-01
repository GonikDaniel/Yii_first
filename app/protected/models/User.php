<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $created
 * @property string $role
 * @property integer $ban
 */
class User extends CActiveRecord
{
	const ROLE_ADMIN = 'ADMIN';
    const ROLE_USER = 'USER';
    const ROLE_BANNED = 'banned';
    public $verifyCode;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email', 'required'),
			array('ban', 'numerical', 'integerOnly'=>true),
			array('username, password, email', 'length', 'max'=>80),
			array('email', 'email'),
			array('email', 'unique'),
			array('username', 'match', 'pattern'=>'/^[a-zA-Z0-9_\.]+$/u', 'message'=>'Допустимыми символами являются только буквы латинского алфавита, цифры, точка и знак подчеркивания.'),
			// The following rule is used by search().
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'on'=>'registration'),
			array('id, username, password, email, created, role, ban', 'safe', 'on'=>'search'),
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
			'username' => 'Имя пользователя',
			'password' => 'Пароль',
			'email' => 'E-mail',
			'created' => 'Дата регистрации',
			'role' => 'Роль',
			'ban' => 'Бан',
			'verifyCode' => 'Введите код с картинки:',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('ban',$this->ban);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	
	//перед добавлением записи добавляем автоматически дату создания
	public function beforeSave()
	{
		if ($this->isNewRecord) {
			$this->ban = 0;
		}
		$this->password = md5('jshd82hu' . $this->password);
		return parent::beforeSave();
	}

	//найдем всех пользователей для дальнейшей работы с ними
	public static function allUsers()
	{
		return CHtml::listData(self::model()->findAll(), 'id', 'username');
	}

}
