<?php

namespace app\models;

use Yii;
use yii\db\Expression;

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
 * @property integer $duration How long customer will be signed up for
 *
 * @property AccountPackage $package
 */
class Account extends \yii\db\ActiveRecord
{

    public function behaviors()
{
    return [
        [
            'class' => \yii\behaviors\TimestampBehavior::className(),
            'createdAtAttribute' => 'date_added',    //or 'LastEdited'
            'updatedAtAttribute' => false,
            'value' => new Expression('NOW()'),
        ],
    ];
}
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
            [['duration'], 'safe'],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackage()
    {
        return $this->hasOne(AccountPackage::className(), ['id' => 'package_id']);
    }
    
    public function signup()
    {
        if($this->save())
        {
            $sub = new AccountSubscription();
            $sub->account_id = $this->id;
            $sub->package_id = $this->package_id;
            $sub->subscription_date = new \yii\db\Expression('now()');
            $sub->duration = $this->duration;
            $sub->expiry_date = new \yii\db\Expression('DATE_ADD(now(),INTERVAL :interval MONTH)',['interval'=>$this->duration]);
            if($sub->save())
            {
                return true;
            }
            else 
            {
                print_r($sub->getErrors());
                die();
            }
        }
        else
        {
            return false;
        }

    }
}
