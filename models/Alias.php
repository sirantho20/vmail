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
 * 
 * @property MailboxAlias $mailbox
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
    
    public function getMailbox()
    {
        return $this->hasOne(Mailbox::className(), ['username' => 'goto']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address', 'goto'], 'required'],
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
    
    public function beforeValidate() {
        if(parent::beforeValidate())
        {
            $exp = explode('@', $this->goto);
            $this->domain = $exp[1];
            $this->created = new \yii\db\Expression('now()');
            return true;
        }
    }
}
