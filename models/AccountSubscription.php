<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account_subscription".
 *
 * @property integer $id
 * @property integer $account_id
 * @property integer $package_id
 * @property string $subscription_date
 * @property string $expiry_date
 * @property integer $duration
 *
 * @property Account $account
 * @property AccountPackage $package
 */
class AccountSubscription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account_subscription';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account_id', 'package_id', 'subscription_date', 'expiry_date'], 'required'],
            [['account_id', 'package_id'], 'integer'],
            [['subscription_date', 'expiry_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'account_id' => 'Account ID',
            'package_id' => 'Package ID',
            'subscription_date' => 'Subscription Date',
            'expiry_date' => 'Expiry Date',
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
     * @return \yii\db\ActiveQuery
     */
    public function getPackage()
    {
        return $this->hasOne(AccountPackage::className(), ['id' => 'package_id']);
    }
}
