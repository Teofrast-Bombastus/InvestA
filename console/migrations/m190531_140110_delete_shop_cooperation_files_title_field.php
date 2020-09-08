<?php

use yii\db\Migration;

/**
 * Class m190531_140110_delete_shop_cooperation_files_title_field
 */
class m190531_140110_delete_shop_cooperation_files_title_field extends Migration
{
    public function up()
    {
        $this->dropColumn('{{%shop_cooperation_files}}', 'title');
    }

    public function down()
    {
        $this->addColumn('{{%shop_cooperation_files}}', 'title', $this->string(255)->notNull()->after('id'));
    }
}
