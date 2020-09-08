<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_about_us}}`.
 */
class m190513_132818_create_shop_about_us_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_about_us}}', [
            'id' => $this->primaryKey(),
            'description' => $this->text(),
        ], $tableOptions);

        $this->insert('{{%shop_about_us}}', [
            'id' => 1,
            'description' => 'description',
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%shop_about_us}}');
    }
}
