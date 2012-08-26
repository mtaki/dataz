<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $id
 * @property string $password
 * @property string $username
 */
class User extends CActiveRecord
{
	public $password1;
	public $password2;
	public $password3;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Users the static model class
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
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name,email,password', 'length', 'max'=>50),
			array('email','email'),
			array('department_id', 'numerical', 'integerOnly'=>true),
			
			array('username','unique'),
			array('username', 'length', 'min'=>2, 'max'=>20),
			array('name,username','required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, username', 'safe', 'on'=>'search'),
			array('password1,password2,password3','length','max'=>20),
			array('password1', 'compare', 'compareAttribute'=>'password2','message'=>'Passwords must be identical'),
			//array('password2', 'compare', 'compareAttribute'=>'password1','message'=>'Passwords must be identical'),
			array('password3', 'checkPassword','on'=>'changePassword'),
			array('password1,password2,password3','required','on'=>'changePassword'),
		);
	}

	public function checkPassword($attribute,$params)
	{
		$user=User::model()->find('username=?',array(Yii::app()->user->name));
		if ($user->password != md5($this->password3))
			$this->addError($attribute,'Password is incorrect.');
	}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'groups' => array(self::MANY_MANY, 'Groups', 'user_group(user_id, group_id)'),
			'department'=>array(self::BELONGS_TO, 'Department', 'department_id','joinType'=>'INNER JOIN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'password' => 'Password',
			'username' => 'Username',
			'email' => 'Email',
			'password1' => 'Password',
			'password2' => 'Confirm&nbsp;Password',
			'password3' => 'Current&nbsp;Password',
			'department_id'=>'Department',
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

		$criteria->compare('id',$this->id,false);

		$criteria->compare('username',$this->username,true);
		$criteria->compare('name',$this->name,true);
		return new CActiveDataProvider('User', array(
			'criteria'=>$criteria,
		));
	}
	
	public function validatePassword($password)
	{
		return md5($password)===$this->password;
	}
	public function behaviors(){
          return array( 'CAdvancedArBehavior' => array('class' => 'application.extensions.CAdvancedArBehavior'),
          	'ActiveRecordLogableBehavior'=>array('class'=>'application.behaviors.ActiveRecordLogableBehavior')
          );
   }
}
