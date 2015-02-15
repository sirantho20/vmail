<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "used_quota".
 *
 * @property string $username
 * @property integer $bytes
 * @property integer $messages
 * @property string $domain
 */
class UsedQuota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'used_quota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['bytes', 'messages'], 'integer'],
            [['username', 'domain'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'bytes' => 'Bytes',
            'messages' => 'Messages',
            'domain' => 'Domain',
        ];
    }
}
