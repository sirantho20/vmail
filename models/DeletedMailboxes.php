<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "deleted_mailboxes".
 *
 * @property string $id
 * @property string $timestamp
 * @property string $username
 * @property string $domain
 * @property string $maildir
 * @property string $admin
 */
class DeletedMailboxes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deleted_mailboxes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['timestamp'], 'safe'],
            [['username', 'domain', 'maildir', 'admin'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'timestamp' => 'Timestamp',
            'username' => 'Username',
            'domain' => 'Domain',
            'maildir' => 'Maildir',
            'admin' => 'Admin',
        ];
    }
}
