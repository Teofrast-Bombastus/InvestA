<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_profiles}}`.
 */
class m190627_090613_create_user_profiles_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%user_profiles}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'father_name' => $this->string(),
            'nationality' => $this->string(),
            'date' => $this->date(),
            'passport_serie_and_number' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'job' => $this->string(),
            'company_name' => $this->string(),
            'position' => $this->string(),
            'family' => $this->string(),
            'hobby' => $this->string(),
            'relation_to_government' => $this->boolean()->defaultValue(false),
            'experience_in_finance' => $this->boolean()->defaultValue(false),
            'profit' => $this->string(),
            'sources_of_profit_json' => 'JSON NULL',
            'month_profit' => $this->string(),
            'trust_to_bank' => $this->boolean()->defaultValue(false),
            'agree_for_send_email' => $this->boolean()->defaultValue(false),
            'confirm_information' => $this->boolean()->defaultValue(false),
        ], $tableOptions);

        $this->createIndex('{{%idx-user_profiles-user_id}}', '{{%user_profiles}}', 'user_id');
        $this->addForeignKey('{{%fk-user_profiles-user_id}}', '{{%user_profiles}}', 'user_id', '{{%users}}', 'id', 'CASCADE');

    }

    public function down()
    {
        $this->dropTable('{{%user_profiles}}');
    }
}
