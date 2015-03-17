<?php

use yii\db\Schema;
use yii\db\Migration;

class m150317_151422_addDurationtoAccount extends Migration
{
    public function up()
    {
        $this->addColumn('account', 'duration', \yii\db\oci\Schema::TYPE_INTEGER);

    }

    public function down()
    {
        $this->dropColumn('account', 'duration');
    }
}
