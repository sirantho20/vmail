<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alias".
 *
 * @property string $address
 * @property string $goto
 * @property string $name
 * @property string $moderators
 * @property string $accesspolicy
 * @property string $domain
 * @property integer $islist
 * @property string $created
 * @property string $modified
 * @property string $expired
 * @property integer $active
 */
class Alias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address'], 'required'],
            [['goto', 'moderators'], 'string'],
            [['islist', 'active'], 'integer'],
            [['created', 'modified', 'expired'], 'safe'],
            [['address', 'name', 'domain'], 'string', 'max' => 255],
            [['accesspolicy'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'address' => 'Address',
            'goto' => 'Goto',
            'name' => 'Name',
            'moderators' => 'Moderators',
            'accesspolicy' => 'Accesspolicy',
            'domain' => 'Domain',
            'islist' => 'Islist',
            'created' => 'Created',
            'modified' => 'Modified',
            'expired' => 'Expired',
            'active' => 'Active',
        ];
    }
}
