<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sender_bcc_user".
 *
 * @property string $username
 * @property string $bcc_address
 * @property string $domain
 * @property string $created
 * @property string $modified
 * @property string $expired
 * @property integer $active
 */
class SenderBccUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sender_bcc_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['created', 'modified', 'expired'], 'safe'],
            [['active'], 'integer'],
            [['username', 'bcc_address', 'domain'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'bcc_address' => 'Bcc Address',
            'domain' => 'Domain',
            'created' => 'Created',
            'modified' => 'Modified',
            'expired' => 'Expired',
            'active' => 'Active',
        ];
    }
}
