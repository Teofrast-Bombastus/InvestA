<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_investments}}`.
 */
class m190510_113115_create_shop_investments_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_investments}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'file' => $this->string(255),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%shop_investments}}');
    }
}
