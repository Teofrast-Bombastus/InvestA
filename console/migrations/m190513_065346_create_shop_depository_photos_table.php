<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_depository_photos}}`.
 */
class m190513_065346_create_shop_depository_photos_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_depository_photos}}', [
            'id' => $this->primaryKey(),
            'depository_id' => $this->integer()->notNull(),
            'photo' => $this->string(),
        ], $tableOptions);

        $this->createIndex('{{%idx-shop_depository_photos-depository_id}}', '{{%shop_depository_photos}}', 'depository_id');

        $this->addForeignKey('{{%fk-shop_depository_photos-depository_id}}', '{{%shop_depository_photos}}', 'depository_id', '{{%shop_depositories}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropForeignKey('{{%fk-shop_depository_photos-depository_id}}', '{{%shop_depository_photos}}');

        $this->dropTable('{{%shop_depository_photos}}');
    }
}
