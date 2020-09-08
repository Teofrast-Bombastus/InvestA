<?php

use yii\db\Migration;

/**
 * Class m190510_064129_create_shop_licence_tables
 */
class m190510_064129_create_shop_licence_tables extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_licence_photos}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string(255),
            'show_in_index' => $this->boolean()->defaultValue(false),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%shop_licence_photos}}');
    }
}
