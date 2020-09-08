<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_withdrawals_e_payment}}`.
 */
class m190806_141814_create_user_withdrawals_e_payment_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        $this->createTable('{{%user_withdrawals_e_payment}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'status' => $this->string()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'address' => $this->string(),
            'user_account' => $this->integer(),
            'amount' => $this->float(),
        ], $tableOptions);

        $this->createIndex('{{%idx-user_withdrawals_e_payment-user_id}}', '{{%user_withdrawals_e_payment}}', 'user_id');
        $this->addForeignKey('{{%fk-user_withdrawals_e_payment-user_id}}', '{{%user_withdrawals_e_payment}}', 'user_id', '{{%users}}', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%user_withdrawals_e_payment}}');
    }
}
