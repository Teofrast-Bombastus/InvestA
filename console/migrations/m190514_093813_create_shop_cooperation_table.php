<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_cooperation}}`.
 */
class m190514_093813_create_shop_cooperation_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_cooperation}}', [
            'id' => $this->primaryKey(),
            'description' => $this->text(),
        ], $tableOptions);

        $this->insert('{{%shop_cooperation}}', [
            'id' => 1,
            'description' => 'description',
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%shop_cooperation}}');
    }
}
