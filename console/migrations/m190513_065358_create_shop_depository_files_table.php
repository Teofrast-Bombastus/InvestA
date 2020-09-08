<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_depository_files}}`.
 */
class m190513_065358_create_shop_depository_files_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_depository_files}}', [
            'id' => $this->primaryKey(),
            'depository_id' => $this->integer()->notNull(),
            'title' => $this->string(255),
            'file' => $this->string(),
        ], $tableOptions);

        $this->createIndex('{{%idx-shop_depository_files-depository_id}}', '{{%shop_depository_files}}', 'depository_id');

        $this->addForeignKey('{{%fk-shop_depository_files-depository_id}}', '{{%shop_depository_files}}', 'depository_id', '{{%shop_depositories}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropForeignKey('{{%fk-shop_depository_files-depository_id}}', '{{%shop_depository_files}}');

        $this->dropTable('{{%shop_depository_files}}');
    }
}
