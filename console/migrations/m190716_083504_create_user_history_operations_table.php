<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_history_operations}}`.
 */
class m190716_083504_create_user_history_operations_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%user_history_operations}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'type_operation' => $this->text()->null(),
            'status' => $this->string()->null(),
            'amount' => $this->float()->null(),
            'created_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('{{%idx-user_history_operations-user_id}}', '{{%user_history_operations}}', 'user_id');
        $this->addForeignKey('{{%fk-user_history_operations-user_id}}', '{{%user_history_operations}}', 'user_id', '{{%users}}', 'id', 'CASCADE');

    }



    public function down()
    {
        $this->dropTable('{{%user_history_operations}}');
    }
}
