<?php

use yii\db\Migration;

/**
 * Class m190531_124909_delete_shop_investments_title_field
 */
class m190531_124909_delete_shop_investments_title_field extends Migration
{
    public function up()
    {
        $this->dropColumn('{{%shop_investments}}', 'title');
    }

    public function down()
    {
        $this->addColumn('{{%shop_investments}}', 'title', $this->string(255)->notNull()->after('id'));
    }
}
