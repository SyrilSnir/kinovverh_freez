<?php

use app\components\migration\KVMigration;
use yii\db\Schema;

/**
 * Handles the creation of table `user`.
 */
class m161209_144250_create_user_table extends KVMigration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable($this->db_prefix . 'users', [
            'id' => $this->primaryKey(),
            'login' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'fio' => $this->string(),
            'birthday' => $this->string(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'bitrix_user' => $this->smallInteger()->notNull()->defaultValue(0),
            'external' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_by' => Schema::TYPE_INTEGER,
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'active' => $this->boolean()->notNull()->defaultValue(true) 
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable($this->db_prefix . 'users');
    }
}
