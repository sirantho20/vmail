<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sender_bcc_domain".
 *
 * @property string $domain
 * @property string $bcc_address
 * @property string $created
 * @property string $modified
 * @property string $expired
 * @property integer $active
 */
class SenderBccDomain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sender_bcc_domain';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['domain'], 'required'],
            [['created', 'modified', 'expired'], 'safe'],
            [['active'], 'integer'],
            [['domain', 'bcc_address'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'domain' => 'Domain',
            'bcc_address' => 'Bcc Address',
            'created' => 'Created',
            'modified' => 'Modified',
            'expired' => 'Expired',
            'active' => 'Active',
        ];
    }
}
