<?php

use yii\db\Migration;

/**
 * Class m190531_134233_delete_shop_depository_files_title_field
 */
class m190531_134233_delete_shop_depository_files_title_field extends Migration
{
    public function up()
    {
        $this->dropColumn('{{%shop_depository_files}}', 'title');
    }

    public function down()
    {
        $this->addColumn('{{%shop_depository_files}}', 'title', $this->string(255)->notNull()->after('id'));
    }
}
