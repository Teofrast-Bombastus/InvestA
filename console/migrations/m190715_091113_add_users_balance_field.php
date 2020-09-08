<?php

use yii\db\Migration;

/**
 * Class m190715_091113_add_users_balance_field
 */


class m190715_091113_add_users_balance_field extends Migration
{
    public function up()
    {
        $this->addColumn('{{%users}}', 'balance', $this->float()->defaultValue(0.00)->after('username'));
    }

    public function down()
    {
        $this->dropColumn('{{%users}}', 'balance');
    }
}
