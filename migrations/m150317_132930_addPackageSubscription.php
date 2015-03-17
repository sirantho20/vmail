<?php

use yii\db\Schema;
use yii\db\Migration;

class m150317_132930_addPackageSubscription extends Migration
{
    public function safeup()
    {
        $this->createTable('account_subscription', [
            'id' => Schema::TYPE_PK.' AUTO_INCREMENT',
            'account_id' => Schema::TYPE_INTEGER. ' NOT NULL',
            'package_id' => Schema::TYPE_INTEGER. ' NOT NULL',
            'subscription_date' => Schema::TYPE_DATETIME. ' NOT NULL',
            'expiry_date' => Schema::TYPE_DATETIME. ' NOT NULL',
            'duration' => \yii\db\oci\Schema::TYPE_INTEGER.' NOT NULL'
            
        ]);
        
        $this->addForeignKey('account_subscription_account_fk', 'account_subscription', 'account_id', 'account', 'id','CASCADE', 'CASCADE');
        
        $this->addForeignKey('account_subscription_package_fk', 'account_subscription', 'package_id', 'account_package', 'id','CASCADE','CASCADE');
    }

    public function safedown()
    {
        $this->dropTable('account_subscription');
    }
}
