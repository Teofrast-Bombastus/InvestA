<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_strategies}}`.
 */
class m190510_123708_create_shop_strategies_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_strategies}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'image' => $this->string(255),
            'description' => $this->text(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%shop_strategies}}');
    }
}
