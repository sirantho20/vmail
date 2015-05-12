<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "account_users".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property integer $account_id
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $role
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $last_login
 *
 * @property Account $account
 */
class AccountUsers extends ActiveRecord
{
    public $password;

    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 0;

    const ROLE_USER = 1;

    /**
     * @inheritdoc
     */
//    public function behaviors()
//    {
//        return [
//            'timestamp' => [
//                'class' => 'yii\behaviors\TimestampBehavior',
//                'attributes' => [
//                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
//                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
//                ],
//            ],
//        ];
//    }
    


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'password_hash', 'email', 'account_id'], 'required'],
            [['account_id', 'role', 'status'], 'integer'],
            [['created_at', 'updated_at', 'last_login', 'password'], 'safe'],
            [['first_name', 'last_name', 'auth_key', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],

            ['status', 'default', 'value' => self::STATUS_ACTIVE],

            ['role', 'default', 'value' => self::ROLE_USER],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'account_id' => 'Account ID',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'role' => 'Role',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'last_login' => 'Last Login',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccount()
    {
        return $this->hasOne(Account::className(), ['id' => 'account_id']);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->getSecurity()->generateRandomKey(10);
    }

    public function beforeValidate()
    {
        parent::beforeValidate();
        
        if($this->password != '')
        {
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
        }
        if($this->isNewRecord)
        {
            $this->generateAuthKey();
        }
        return true;
    }
}
