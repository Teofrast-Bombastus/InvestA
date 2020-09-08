<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contact_addresses}}`.
 */
class m190514_115644_create_contact_addresses_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%contact_addresses}}', [
            'id' => $this->primaryKey(),
            'text' => $this->string(255)->notNull(),
        ], $tableOptions);

        $this->insert('{{%contact_addresses}}', [
            'id' => 1,
            'text' => 'м. Винница',
        ]);

    }


    public function down()
    {
        $this->dropTable('{{%contact_addresses}}');
    }
}
