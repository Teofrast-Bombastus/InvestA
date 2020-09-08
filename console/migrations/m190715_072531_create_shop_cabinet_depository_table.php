<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_cabinet_depository}}`.
 */
class m190715_072531_create_shop_cabinet_depository_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%user_cabinet_depository}}', [
            'id' => $this->primaryKey(),
            'description' => $this->text()->null(),
        ], $tableOptions);

        $this->insert('{{%user_cabinet_depository}}', [
            'id' => 1,
            'description' => '',
        ]);


    }

    public function down()
    {
        $this->dropTable('{{%user_cabinet_depository}}');
    }
}
