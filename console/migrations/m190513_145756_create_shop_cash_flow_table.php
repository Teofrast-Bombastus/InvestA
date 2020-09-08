<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_cash_flow}}`.
 */
class m190513_145756_create_shop_cash_flow_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_cash_flow}}', [
            'id' => $this->primaryKey(),
            'description' => $this->text(),
        ], $tableOptions);

        $this->insert('{{%shop_cash_flow}}', [
            'id' => 1,
            'description' => 'description',
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%shop_cash_flow}}');
    }
}
