<?php

use yii\db\Schema;
use yii\db\Migration;

class m150626_095228_createLoginLogTable extends Migration
{
    public function up()
    {
        $this->createTable('login_log', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING,
            'login_date' => Schema::TYPE_DATETIME,
            'login_ip' => Schema::TYPE_STRING,
            'domain' => Schema::TYPE_STRING
        ]);
        
        
    }

    public function down()
    {
        $this->dropTable('login_log');
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
