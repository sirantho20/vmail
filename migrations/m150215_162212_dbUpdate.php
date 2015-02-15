<?php

use yii\db\Schema;
use yii\db\Migration;

class m150215_162212_dbUpdate extends Migration
{
    public function safeup()
    {
        $this->createTable('account',[
            'id' => Schema::TYPE_PK.' AUTO_INCREMENT',
            'name' => Schema::TYPE_STRING.' NOT NULL',
            'description' => Schema::TYPE_STRING,
            'package_id' => Schema::TYPE_INTEGER.' NOT NULL',
            'date_added' => Schema::TYPE_DATETIME.' NOT NULL',
            'status' => Schema::TYPE_BOOLEAN,
        ]);

        $this->createTable('account_package',[
           'id' => Schema::TYPE_PK.' AUTO_INCREMENT',
            'package_name' => Schema::TYPE_STRING,
            'emails_allowed' => Schema::TYPE_INTEGER,
            'quota_allowed' => Schema::TYPE_INTEGER,
            'next_due_date' => Schema::TYPE_DATE,
            'status' => Schema::TYPE_BOOLEAN,
        ]);

        $this->createTable('account_domains',[
            'account_id' => Schema::TYPE_INTEGER,
            'domain' => Schema::TYPE_STRING.'(255)',
        ]);

        $this->addPrimaryKey('pm_key', 'account_domains',[
            'account_id',
            'domain'
        ]);

        $this->createTable('account_users',[
            'id' => Schema::TYPE_PK.' AUTO_INCREMENT',
            'first_name' => Schema::TYPE_STRING.' NOT NULL',
            'last_name' => Schema::TYPE_STRING.' NOT NULL',
            'account_id' => Schema::TYPE_INTEGER.' NOT NULL',
            'auth_key' => Schema::TYPE_STRING.' NOT NULL',
            'password_hash' => Schema::TYPE_STRING.' NOT NULL',
            'password_reset_token' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING,
            'role' => Schema::TYPE_SMALLINT.' NOT NULL',
            'status' => Schema::TYPE_BOOLEAN.' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME,
            'updated_at' => Schema::TYPE_DATETIME,
            'last_login' => Schema::TYPE_DATETIME,
            'account_id' => Schema::TYPE_INTEGER
        ]);

    }

    public function safedown()
    {
        $this->dropTable('account_users');
        $this->dropTable('account_domains');
        $this->dropTable('account_package');
        $this->dropTable('account');
    }
}
