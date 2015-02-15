<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "domain_admins".
 *
 * @property string $username
 * @property string $domain
 * @property string $created
 * @property string $modified
 * @property string $expired
 * @property integer $active
 */
class DomainAdmins extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'domain_admins';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'domain'], 'required'],
            [['created', 'modified', 'expired'], 'safe'],
            [['active'], 'integer'],
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
            'domain' => 'Domain',
            'created' => 'Created',
            'modified' => 'Modified',
            'expired' => 'Expired',
            'active' => 'Active',
        ];
    }
}
