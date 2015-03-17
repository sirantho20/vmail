<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "anyone_shares".
 *
 * @property string $from_user
 * @property string $dummy
 */
class AnyoneShares extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anyone_shares';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from_user'], 'required'],
            [['from_user'], 'string', 'max' => 255],
            [['dummy'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'from_user' => 'From User',
            'dummy' => 'Dummy',
        ];
    }
}
