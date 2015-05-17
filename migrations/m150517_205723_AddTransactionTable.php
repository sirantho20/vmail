<?php

use yii\db\Schema;
use yii\db\Migration;

class m150517_205723_AddTransactionTable extends Migration
{
    public function up()
    {
        $this->createTable('account_signup_transaction', [
            'id' => Schema::TYPE_PK,
            'account_name' => Schema::TYPE_STRING.' not null',
            'domain' => Schema::TYPE_STRING.' not null',
            'email' => Schema::TYPE_STRING.' not null',
            'first_name' => Schema::TYPE_STRING.' not null',
            'last_name' => Schema::TYPE_STRING.' not null',
            'package_id' => Schema::TYPE_INTEGER.' not null',
            'transaction_date' => Schema::TYPE_DATETIME. ' not null',
            'payment_status' => Schema::TYPE_STRING.' not null',
            'payment_date' => Schema::TYPE_DATETIME,
            'amount_paid' => Schema::TYPE_DOUBLE,
            'transaction_id' => Schema::TYPE_STRING,
            
        ]);
    }

    public function down()
    {
        $this->dropTable('account_signup_transaction');
    }
    
}
