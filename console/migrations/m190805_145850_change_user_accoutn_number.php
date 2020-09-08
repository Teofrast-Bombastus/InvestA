<?php

use shop\entities\user\User;
use yii\db\Migration;

/**
 * Class m190805_145850_change_user_accoutn_number
 */
class m190805_145850_change_user_accoutn_number extends Migration
{
    public function up()
    {
        foreach (User::find()->all() as $user){
            $this->update('{{%users}}', ['account' => User::ACCOUNT_NUMBER . $user->id], ['=', 'id', $user->id]);
        }
    }

    public function down()
    {
    }


}
