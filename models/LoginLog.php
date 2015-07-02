<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "login_log".
 *
 * @property integer $id
 * @property string $username
 * @property string $login_date
 * @property string $login_ip
 */
class LoginLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'login_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login_date'], 'safe'],
            [['username', 'login_ip'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'login_date' => 'Login Date',
            'login_ip' => 'Login Ip',
        ];
    }
}
