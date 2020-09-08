<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_about_us_files}}`.
 */
class m190513_132850_create_shop_about_us_files_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_about_us_files}}', [
            'id' => $this->primaryKey(),
            'about_id' => $this->integer()->notNull(),
            'title' => $this->string(255),
            'file' => $this->string(),
        ], $tableOptions);

        $this->createIndex('{{%idx-shop_about_us_files-about_id}}', '{{%shop_about_us_files}}', 'about_id');

        $this->addForeignKey('{{%fk-shop_about_us_files-about_id}}', '{{%shop_about_us_files}}', 'about_id', '{{%shop_about_us}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropForeignKey('{{%fk-shop_about_us_files-about_id}}', '{{%shop_about_us_files}}');

        $this->dropTable('{{%shop_about_us_files}}');
    }
}
