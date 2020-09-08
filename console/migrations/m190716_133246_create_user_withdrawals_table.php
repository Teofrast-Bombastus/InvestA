<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_withdrawals}}`.
 */
class m190716_133246_create_user_withdrawals_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%user_withdrawals}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'status' => $this->string()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'type' => $this->integer()->notNull(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'address' => $this->string(),
            'user_account' => $this->integer(),
            'bank_account' => $this->integer(),
            'bank_name' => $this->string(),
            'bank_address' => $this->string(),
            'swift' => $this->string(),
            'iban' => $this->string(),
            'amount' => $this->float(),
        ], $tableOptions);

        $this->createIndex('{{%idx-user_withdrawals-user_id}}', '{{%user_withdrawals}}', 'user_id');
        $this->addForeignKey('{{%fk-user_withdrawals-user_id}}', '{{%user_withdrawals}}', 'user_id', '{{%users}}', 'id', 'CASCADE');

    }

    public function down()
    {
        $this->dropTable('{{%user_withdrawals}}');
    }
}
