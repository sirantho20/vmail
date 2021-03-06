<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account_package".
 *
 * @property integer $id
 * @property string $package_name
 * @property integer $emails_allowed
 * @property integer $quota_allowed
 * @property string $next_due_date
 * @property integer $status
 * @property boolean $is_public Whether or not the package is listed publicly
 * @property string $package_slug Slug to identify package
 * @property integer $price Price of package
 *
 * @property Account[] $accounts
 */
class AccountPackage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account_package';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emails_allowed', 'quota_allowed', 'status'], 'integer'],
            [['next_due_date', 'is_public', 'package_slug', 'price'], 'safe'],
            [['package_slug'], 'unique'],
            [['package_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'package_name' => 'Package Name',
            'emails_allowed' => 'Emails Allowed',
            'quota_allowed' => 'Quota Allowed',
            'next_due_date' => 'Next Due Date',
            'status' => 'Status',
            'is_public' =>'Show Publicly'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccounts()
    {
        return $this->hasMany(Account::className(), ['package_id' => 'id']);
    }
}
