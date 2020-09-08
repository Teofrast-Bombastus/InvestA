<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_cash_flow__files}}`.
 */
class m190513_145821_create_shop_cash_flow__files_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_cash_flow_files}}', [
            'id' => $this->primaryKey(),
            'cash_flow_id' => $this->integer()->notNull(),
            'title' => $this->string(255),
            'file' => $this->string(),
        ], $tableOptions);

        $this->createIndex('{{%idx-shop_cash_flow_files-cash_flow_id}}', '{{%shop_cash_flow_files}}', 'cash_flow_id');

        $this->addForeignKey('{{%fk-shop_cash_flow_files-cash_flow_id}}', '{{%shop_cash_flow_files}}', 'cash_flow_id', '{{%shop_cash_flow}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropForeignKey('{{%fk-shop_cash_flow_files-cash_flow_id}}', '{{%shop_cash_flow_files}}');

        $this->dropTable('{{%shop_cash_flow_files}}');
    }
}
