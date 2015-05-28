<?php

use yii\db\Schema;
use yii\db\Migration;

class m150528_222750_alterAccountPackageAddaliasAndIspublic extends Migration
{
    public function up()
    {
         $this->addColumn('account_package', 'is_public', Schema::TYPE_BOOLEAN);
         $this->addColumn('account_package', 'package_slug', Schema::TYPE_STRING);
    }

    public function down()
    {
        $this->dropColumn('account_package', 'package_slug');
        $this->dropColumn('account_package', 'is_public');
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
