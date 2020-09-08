<?php

use yii\db\Migration;

/**
 * Class m190531_112628_delete_shop_about_us_files_field
 */
class m190531_112628_delete_shop_about_us_files_field extends Migration
{
    public function up()
    {
        $this->dropColumn('{{%shop_about_us_files}}', 'title');
    }

    public function down()
    {
        $this->addColumn('{{%shop_about_us_files}}', 'title', $this->string(255)->notNull()->after('id'));
    }
}
