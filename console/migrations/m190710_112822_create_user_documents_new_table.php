<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_documents_new}}`.
 */
class m190710_112822_create_user_documents_new_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%user_documents}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'file' => $this->string(255),
        ], $tableOptions);

        $this->createIndex('{{%idx-user_documents-user_id}}', '{{%user_documents}}', 'user_id');
        $this->addForeignKey('{{%fk-user_documents-user_id}}', '{{%user_documents}}', 'user_id', '{{%users}}', 'id', 'CASCADE');


    }

    public function down()
    {
        $this->dropTable('{{%user_documents}}');
    }
}
