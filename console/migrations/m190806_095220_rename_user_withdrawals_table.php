<?php

use yii\db\Migration;

/**
 * Class m190806_095220_rename_user_withdrawals_table
 */

class m190806_095220_rename_user_withdrawals_table extends Migration
{
    public function up()
    {
        $this->dropColumn('{{%user_withdrawals}}', 'type');
        $this->renameTable('{{%user_withdrawals}}', '{{%user_withdrawals_bank_transfer}}');

    }

    public function down()
    {
        $this->renameTable('{{%user_withdrawals_bank_transfer}}', '{{%user_withdrawals}}');
        $this->addColumn('{{%user_withdrawals}}', 'type',  $this->integer()->notNull()->after('user_id'));
    }

}
