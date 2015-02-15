<?php

use yii\db\Schema;
use yii\db\Migration;

class m150215_171559_foreighKeys extends Migration
{
    public function safeup()
    {
        $this->addForeignKey('user_account_user','account_users','account_id','account','id','CASCADE','CASCADE');
        $this->addForeignKey('account_package_account_fk','account','package_id','account_package','id','CASCADE','CASCADE');
        $this->addForeignKey('domain_account_domain','account_domains','account_id','account','id','CASCADE','CASCADE');
        //$this->addForeignKey('account_account_domain_domain','account_domains','domain','domain','domain','','CASCADE');
    }

    public function safedown()
    {
        //$this->dropForeignKey('account_account_domain_domain','account_domains');
        $this->dropForeignKey('domain_account_domain','account_domains');
        $this->dropForeignKey('account_package_account_fk','account');
        $this->dropForeignKey('user_account_user','account_users');
    }
}
