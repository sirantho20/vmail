<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $package_id
 * @property string $date_added
 * @property integer $status
 *
 * @property AccountPackage $package
 * @property AccountDomains[] $accountDomains
 * @property AccountUsers[] $accountUsers
 */
class Account extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'date_added'], 'required'],
            [['package_id', 'status'], 'integer'],
            [['date_added'], 'safe'],
            [['name', 'description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'package_id' => 'Package ID',
            'date_added' => 'Date Added',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackage()
    {
        return $this->hasOne(AccountPackage::className(), ['id' => 'package_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountDomains()
    {
        return $this->hasMany(AccountDomains::className(), ['account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountUsers()
    {
        return $this->hasMany(AccountUsers::className(), ['account_id' => 'id']);
    }
}
