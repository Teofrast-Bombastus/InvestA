<?php

use yii\db\Migration;

/**
 * Class m190712_092309_add_users_type_account_field
 */
class m190712_092309_add_users_type_account_field extends Migration
{
    public function up()
    {
        $this->addColumn('{{%users}}', 'type_account', $this->integer()->defaultValue(1)->after('phone'));
    }

    public function down()
    {
        $this->dropColumn('{{%users}}', 'type_account');
    }
}
