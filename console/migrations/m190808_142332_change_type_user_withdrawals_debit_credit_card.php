<?php

use yii\db\Migration;

/**
 * Class m190808_142332_change_type_user_withdrawals_debit_credit_card
 */
class m190808_142332_change_type_user_withdrawals_debit_credit_card extends Migration
{
    public function up()
    {
        $this->alterColumn('{{%user_withdrawals_bank_transfer}}', 'bank_account', $this->double());
    }

    public function down()
    {
        $this->alterColumn('{{%user_withdrawals_bank_transfer}}', 'bank_account', $this->integer());
    }

}
