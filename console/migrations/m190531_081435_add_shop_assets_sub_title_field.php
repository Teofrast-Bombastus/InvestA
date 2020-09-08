<?php

use yii\db\Migration;

/**
 * Class m190531_081435_add_shop_assets_sub_title_field
 */
class m190531_081435_add_shop_assets_sub_title_field extends Migration
{
    public function up()
    {
        $this->addColumn('{{%shop_assets}}', 'sub_title', $this->text()->null()->after('title'));
    }

    public function down()
    {
        $this->dropColumn('{{%shop_assets}}', 'sub_title');
    }
}
