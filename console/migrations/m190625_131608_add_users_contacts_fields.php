<?php

use yii\db\Migration;

/**
 * Class m190625_131608_add_users_contacts_fields
 */
class m190625_131608_add_users_contacts_fields extends Migration
{
    public function up()
    {
        $this->addColumn('{{%users}}', 'first_name', $this->string()->null()->after('username'));
        $this->addColumn('{{%users}}', 'last_name', $this->string()->null()->after('first_name'));
        $this->addColumn('{{%users}}', 'phone', $this->string()->null()->after('last_name'));
        $this->addColumn('{{%users}}', 'promo_code', $this->string()->null()->after('phone'));
    }

    public function down()
    {
        $this->dropColumn('{{%users}}', 'first_name');
        $this->dropColumn('{{%users}}', 'last_name');
        $this->dropColumn('{{%users}}', 'phone');
        $this->dropColumn('{{%users}}', 'promo_code');
    }
}
