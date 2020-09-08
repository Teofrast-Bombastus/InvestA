<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%regulations}}`.
 */
class m190508_134937_create_regulations_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_regulations}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'file' => $this->string(255),
            'show_in_index' => $this->boolean()->defaultValue(false),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%shop_regulations}}');
    }
}
