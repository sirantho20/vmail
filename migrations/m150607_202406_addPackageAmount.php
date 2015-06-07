<?php

use yii\db\Schema;
use yii\db\Migration;

class m150607_202406_addPackageAmount extends Migration
{
    public function up()
    {
        $this->addColumn('account_package', 'price', Schema::TYPE_FLOAT.' NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('account_package', 'price');
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
