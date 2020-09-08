<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_withdrawals_crypto_currency}}`.
 */
class m190806_145215_create_user_withdrawals_crypto_currency_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        $this->createTable('{{%user_withdrawals_crypto_currency}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'status' => $this->string()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'address' => $this->string(),
            'user_account' => $this->integer(),
            'amount' => $this->float(),
        ], $tableOptions);

        $this->createIndex('{{%idx-user_withdrawals_crypto_currency-user_id}}', '{{%user_withdrawals_crypto_currency}}', 'user_id');
        $this->addForeignKey('{{%fk-user_withdrawals_crypto_currency-user_id}}', '{{%user_withdrawals_crypto_currency}}', 'user_id', '{{%users}}', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%user_withdrawals_crypto_currency}}');
    }
}
