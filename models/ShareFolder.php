<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "share_folder".
 *
 * @property string $from_user
 * @property string $to_user
 * @property string $dummy
 */
class ShareFolder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'share_folder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from_user', 'to_user'], 'required'],
            [['from_user', 'to_user'], 'string', 'max' => 255],
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
            'to_user' => 'To User',
            'dummy' => 'Dummy',
        ];
    }
}
