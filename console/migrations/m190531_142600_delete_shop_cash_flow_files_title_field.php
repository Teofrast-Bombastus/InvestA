<?php

use yii\db\Migration;

/**
 * Class m190531_142600_delete_shop_cash_flow_files_title_field
 */
class m190531_142600_delete_shop_cash_flow_files_title_field extends Migration
{
    public function up()
    {
        $this->dropColumn('{{%shop_cash_flow_files}}', 'title');
    }

    public function down()
    {
        $this->addColumn('{{%shop_cash_flow_files}}', 'title', $this->string(255)->notNull()->after('id'));
    }
}
