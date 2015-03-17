<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $domain
 * @property integer $package_id
 * @property string $date_added
 * @property string $status
 *
 * @property AccountPackage $package
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
            [['package_id'], 'integer'],
            [['date_added'], 'safe'],
            [['name', 'description', 'domain'], 'string', 'max' => 45],
            [['status'], 'string', 'max' => 1]
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
            'domain' => 'Domain',
            'package_id' => 'Package',
            'status' => 'Status',
        ];
    }
    public function beforeSave() {
        $this->date_added = new \yii\db\Expression('now()');
        return parent::beforeValidate();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackage()
    {
        return $this->hasOne(AccountPackage::className(), ['id' => 'package_id']);
    }
}
