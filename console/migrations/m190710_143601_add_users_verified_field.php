<?php

use yii\db\Migration;

/**
 * Class m190710_143601_add_users_verified_field
 */
class m190710_143601_add_users_verified_field extends Migration
{
    public function up()
    {
        $this->addColumn('{{%users}}', 'verified', $this->boolean()->defaultValue(false)->after('status'));
    }

    public function down()
    {
        $this->dropColumn('{{%users}}', 'verified');
    }
}
