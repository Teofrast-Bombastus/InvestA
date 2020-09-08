<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_about_us_photos}}`.
 */
class m190513_132839_create_shop_about_us_photos_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_about_us_photos}}', [
            'id' => $this->primaryKey(),
            'about_id' => $this->integer()->notNull(),
            'photo' => $this->string(),
        ], $tableOptions);

        $this->createIndex('{{%idx-shop_about_us_photos-about_id}}', '{{%shop_about_us_photos}}', 'about_id');

        $this->addForeignKey('{{%fk-shop_about_us_photos-about_id}}', '{{%shop_about_us_photos}}', 'about_id', '{{%shop_about_us}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropForeignKey('{{%fk-shop_about_us_photos-about_id}}', '{{%shop_about_us_photos}}');

        $this->dropTable('{{%shop_about_us_photos}}');
    }
}
