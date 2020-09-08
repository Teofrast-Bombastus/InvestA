<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_cooperation_files}}`.
 */
class m190514_093822_create_shop_cooperation_files_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_cooperation_files}}', [
            'id' => $this->primaryKey(),
            'cooperation_id' => $this->integer()->notNull(),
            'title' => $this->string(255),
            'file' => $this->string(),
        ], $tableOptions);

        $this->createIndex('{{%idx-shop_cooperation_files-cooperation_id}}', '{{%shop_cooperation_files}}', 'cooperation_id');

        $this->addForeignKey('{{%fk-shop_cooperation_files-cooperation_id}}', '{{%shop_cooperation_files}}', 'cooperation_id', '{{%shop_cooperation}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropForeignKey('{{%fk-shop_cooperation_files-cooperation_id}}', '{{%shop_cooperation_files}}');

        $this->dropTable('{{%shop_cooperation_files}}');
    }
}
