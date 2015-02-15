<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account_domains".
 *
 * @property integer $account_id
 * @property string $domain
 *
 * @property Account $account
 */
class AccountDomains extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account_domains';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account_id', 'domain'], 'required'],
            [['account_id'], 'integer'],
            [['domain'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'account_id' => 'Account ID',
            'domain' => 'Domain',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccount()
    {
        return $this->hasOne(Account::className(), ['id' => 'account_id']);
    }
}
