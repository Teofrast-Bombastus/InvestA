<?php

use yii\db\Migration;

/**
 * Class m190627_072053_add_users_contacts_informations
 */
class m190627_072053_add_users_contacts_informations extends Migration
{
    public function up()
    {
        $this->addColumn('{{%users}}', 'address', $this->string()->null()->after('promo_code'));
        $this->addColumn('{{%users}}', 'province', $this->string()->null()->after('address'));
        $this->addColumn('{{%users}}', 'post_index', $this->string()->null()->after('province'));
        $this->addColumn('{{%users}}', 'city', $this->string()->null()->after('post_index'));
    }

    public function down()
    {
        $this->dropColumn('{{%users}}', 'address');
        $this->dropColumn('{{%users}}', 'province');
        $this->dropColumn('{{%users}}', 'post_index');
        $this->dropColumn('{{%users}}', 'city');
    }
}
