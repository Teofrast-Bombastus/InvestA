<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_dopo_accounts}}`.
 */
class m190712_120610_create_user_dopo_accounts_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%user_depo_accounts}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'type' => $this->integer()->notNull(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'father_name' => $this->string(),
            'address' => $this->string(),
            'passport' => $this->string(),
            'inn' => $this->string(),
            'account_depo' => $this->integer(),
            'type_of_securities' => $this->string(),
            'terms' => $this->integer(),
            'type_of_accounting' => $this->integer(),
            'quantity_of_securities' => $this->integer(),
            'nominal_cost' => $this->integer(),
            'bank' => $this->string(),
        ], $tableOptions);

        $this->createIndex('{{%idx-user_depo_accounts-user_id}}', '{{%user_depo_accounts}}', 'user_id');
        $this->addForeignKey('{{%fk-user_depo_accounts-user_id}}', '{{%user_depo_accounts}}', 'user_id', '{{%users}}', 'id', 'CASCADE');

    }

    public function down()
    {
        $this->dropTable('{{%user_depo_accounts}}');
    }
}
