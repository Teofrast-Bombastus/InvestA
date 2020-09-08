<?php

use yii\db\Migration;

/**
 * Class m190531_093034_delete_shop_regulations_title_field
 */
class m190531_093034_delete_shop_regulations_title_field extends Migration
{

    public function up()
    {
        $this->dropColumn('{{%shop_regulations}}', 'title');
    }

    public function down()
    {
        $this->addColumn('{{%shop_regulations}}', 'title', $this->string(255)->notNull()->after('id'));
    }

}
