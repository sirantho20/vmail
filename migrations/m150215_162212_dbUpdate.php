<?php

use yii\db\Schema;
use yii\db\Migration;

class m150215_162212_dbUpdate extends Migration
{
    
    public function safeup()
    {
        $this->execute(file_get_contents(\Yii::getAlias('@app').'/data/db.sql'));
    }

    public function safedown()
    {
        $this->dropTable('account_users');
        $this->dropTable('account_subscription');
        $this->dropTable('account');
        $this->dropTable('account_package');
    }
}
