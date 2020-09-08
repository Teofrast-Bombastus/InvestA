<?php

use yii\db\Migration;

/**
 * Class m190808_143118_change_type_user_withdrawals_debit_cred
 */
class m190808_143118_change_type_user_withdrawals_debit_cred extends Migration
{
    public function up()
    {
        $this->alterColumn('{{%user_withdrawals_debit_credit_card}}', 'card_number', $this->double());
        $this->alterColumn('{{%user_withdrawals_debit_credit_card}}', 'expire', $this->text());
    }

    public function down()
    {
        $this->alterColumn('{{%user_withdrawals_debit_credit_card}}', 'card_number', $this->integer());
        $this->alterColumn('{{%user_withdrawals_debit_credit_card}}', 'expire', $this->integer());
    }

}
