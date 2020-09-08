<?php

use yii\db\Migration;

/**
 * Class m190806_124010_create_user_withdrawals_debit_credit_card
 */
class m190806_124010_create_user_withdrawals_debit_credit_card extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        $this->createTable('{{%user_withdrawals_debit_credit_card}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'status' => $this->string()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'address' => $this->string(),
            'user_account' => $this->integer(),
            'card_number' => $this->integer(),
            'card_holder' => $this->string(),
            'expire' => $this->integer(),
            'amount' => $this->float(),
        ], $tableOptions);

        $this->createIndex('{{%idx-user_withdrawals_debit_credit_card-user_id}}', '{{%user_withdrawals_debit_credit_card}}', 'user_id');
        $this->addForeignKey('{{%fk-user_withdrawals_debit_credit_card-user_id}}', '{{%user_withdrawals_debit_credit_card}}', 'user_id', '{{%users}}', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%user_withdrawals_debit_credit_card}}');
    }
}
