<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_orders}}`.
 */
class m190717_144900_create_user_orders_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%user_orders}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'status' => $this->string()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'phone' => $this->string(),
            'recipient' => $this->string(),
            'payment_method' => $this->string(),
            'description' => $this->text(),
            'amount' => $this->float(),
            'subtotal' => $this->float(),
            'tax' => $this->float(),
            'total' => $this->float(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user_orders}}');
    }
}
