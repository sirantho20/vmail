<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "domain".
 *
 * @property string $domain
 * @property string $description
 * @property string $disclaimer
 * @property integer $aliases
 * @property integer $mailboxes
 * @property integer $maxquota
 * @property integer $quota
 * @property string $transport
 * @property integer $backupmx
 * @property string $settings
 * @property string $created
 * @property string $modified
 * @property string $expired
 * @property integer $active
 */
class Domain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'domain';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['domain'], 'required'],
            [['description', 'disclaimer', 'settings'], 'string'],
            [['aliases', 'mailboxes', 'maxquota', 'quota', 'backupmx', 'active'], 'integer'],
            [['created', 'modified', 'expired'], 'safe'],
            [['domain', 'transport'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'domain' => 'Domain',
            'description' => 'Description',
            'disclaimer' => 'Disclaimer',
            'aliases' => 'Aliases',
            'mailboxes' => 'Mailboxes',
            'maxquota' => 'Maxquota',
            'quota' => 'Quota',
            'transport' => 'Transport',
            'backupmx' => 'Backupmx',
            'settings' => 'Settings',
            'created' => 'Created',
            'modified' => 'Modified',
            'expired' => 'Expired',
            'active' => 'Active',
        ];
    }
}
