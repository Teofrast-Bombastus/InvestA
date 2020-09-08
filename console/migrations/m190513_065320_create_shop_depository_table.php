<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_depository}}`.
 */
class m190513_065320_create_shop_depository_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_depositories}}', [
            'id' => $this->primaryKey(),
            'description' => $this->text(),
        ], $tableOptions);

        $this->insert('{{%shop_depositories}}', [
            'id' => 1,
            'description' => 'description',
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%shop_depositories}}');
    }
}
