<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account_signup_transaction".
 *
 * @property integer $id
 * @property string $account_name
 * @property string $domain
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property integer $package_id
 * @property string $transaction_date
 * @property string $payment_status
 * @property string $payment_date
 * @property double $amount_paid
 * @property string $transaction_id
 */
class AccountSignupTransaction extends \yii\db\ActiveRecord
{
    public $captcha;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account_signup_transaction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account_name', 'domain', 'email', 'first_name', 'last_name', 'package_id', 'transaction_date', 'payment_status'], 'required'],
            [['account_name', 'domain', 'email', 'first_name', 'last_name'], 'filter', 'filter' => 'trim','skipOnArray' => true],
            [['package_id'], 'integer'],
            [['transaction_date', 'payment_date','captcha'], 'safe'],
            [['amount_paid'], 'number'],
            [['account_name', 'domain', 'email', 'first_name', 'last_name', 'payment_status', 'transaction_id'], 'string', 'max' => 255],
            [['captcha'],'captcha'],
            [['email'], 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'account_name' => 'Account/Business Name',
            'domain' => 'Domain Name',
            'email' => 'Email',
            'first_name' => 'Your First Name',
            'last_name' => 'Your Last Name',
            'package_id' => 'Email Package',
            'transaction_date' => 'Transaction Date',
            'payment_status' => 'Payment Status',
            'payment_date' => 'Payment Date',
            'amount_paid' => 'Amount Paid',
            'transaction_id' => 'Transaction ID',
            'captcha' => 'Are you human?',
        ];
    }
    public function beforeValidate() {
        parent::beforeValidate();
        
        if($this->isNewRecord)
        {
            $this->transaction_date = new \yii\db\Expression('now()');
            $this->payment_status = 'unpaid';
        }
        
        return true;
    }
}
