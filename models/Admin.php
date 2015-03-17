<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $language
 * @property string $passwordlastchange
 * @property string $settings
 * @property string $created
 * @property string $modified
 * @property string $expired
 * @property integer $active
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['passwordlastchange', 'created', 'modified', 'expired'], 'safe'],
            [['settings'], 'string'],
            [['active'], 'integer'],
            [['username', 'password', 'name'], 'string', 'max' => 255],
            [['language'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password' => 'Password',
            'name' => 'Name',
            'language' => 'Language',
            'passwordlastchange' => 'Passwordlastchange',
            'settings' => 'Settings',
            'created' => 'Created',
            'modified' => 'Modified',
            'expired' => 'Expired',
            'active' => 'Active',
        ];
    }
}
