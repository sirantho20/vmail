<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alias_domain".
 *
 * @property string $alias_domain
 * @property string $target_domain
 * @property string $created
 * @property string $modified
 * @property integer $active
 */
class AliasDomain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alias_domain';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias_domain', 'target_domain'], 'required'],
            [['created', 'modified'], 'safe'],
            [['active'], 'integer'],
            [['alias_domain', 'target_domain'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'alias_domain' => 'Alias Domain',
            'target_domain' => 'Target Domain',
            'created' => 'Created',
            'modified' => 'Modified',
            'active' => 'Active',
        ];
    }
}
