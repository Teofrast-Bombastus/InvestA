<?php

use shop\entities\user\User;
use yii\db\Migration;

/**
 * Class m190715_095627_add_users_account_field
 */
class m190715_095627_add_users_account_field extends Migration
{
    public function up()
    {
        $this->addColumn('{{%users}}', 'account', $this->integer()->null()->unique()->after('balance'));
        foreach (User::find()->all() as $user){
            $this->update('{{%users}}', ['account' => User::ACCOUNT_NUMBER . $user->id], ['=', 'id', $user->id]);
        }
    }

    public function down()
    {
        $this->dropColumn('{{%users}}', 'account');
    }
}
