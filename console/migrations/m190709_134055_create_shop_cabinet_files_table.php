<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_cabinet_files}}`.
 */
class m190709_134055_create_shop_cabinet_files_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_cabinet_files}}', [
            'id' => $this->primaryKey(),
            'file' => $this->string(255),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%shop_cabinet_files}}');
    }
}
