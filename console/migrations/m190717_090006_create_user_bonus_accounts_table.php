<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_bonus_accounts}}`.
 */
class m190717_090006_create_user_bonus_accounts_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%user_bonus_accounts}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'status' => $this->string()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'type' => $this->integer()->notNull(),
            'type_text' => $this->string(),
            'amount' => $this->float(),
        ], $tableOptions);

        $this->createIndex('{{%idx-user_bonus_accounts-user_id}}', '{{%user_bonus_accounts}}', 'user_id');
        $this->addForeignKey('{{%fk-user_bonus_accounts-user_id}}', '{{%user_bonus_accounts}}', 'user_id', '{{%users}}', 'id', 'CASCADE');

    }

    public function down()
    {
        $this->dropTable('{{%user_bonus_accounts}}');
    }
}
