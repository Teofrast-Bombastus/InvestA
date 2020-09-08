<?php

use yii\db\Migration;

/**
 * Class m190716_085629_change_user_depo_accounts_nominal_cost_field
 */
class m190716_085629_change_user_depo_accounts_nominal_cost_field extends Migration
{
    public function up(){
        $this->alterColumn('{{%user_depo_accounts}}', 'nominal_cost', $this->float()->null());
    }

    public function down() {
        $this->alterColumn('{{%user_depo_accounts}}','nominal_cost', $this->integer()->null());
    }
}
