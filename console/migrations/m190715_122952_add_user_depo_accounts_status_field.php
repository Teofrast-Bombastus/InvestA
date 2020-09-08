<?php

use shop\entities\user\cabinet\DepoAccount;
use yii\db\Migration;

/**
 * Class m190715_122952_add_user_depo_accounts_status_field
 */
class m190715_122952_add_user_depo_accounts_status_field extends Migration
{
    public function up()
    {
        $this->truncateTable('{{%user_depo_accounts}}');
        $this->addColumn('{{%user_depo_accounts}}', 'status', $this->integer()->notNull()->defaultValue(DepoAccount::STATUS_WAIT)->after('user_id'));
    }

    public function down()
    {
        $this->dropColumn('{{%user_depo_accounts}}', 'status');
    }
}
