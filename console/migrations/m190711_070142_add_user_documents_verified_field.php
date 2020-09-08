<?php

use yii\db\Migration;

/**
 * Class m190711_070142_add_user_documents_verified_field
 */
class m190711_070142_add_user_documents_verified_field extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user_documents}}', 'verified', $this->boolean()->defaultValue(false)->after('file'));
    }

    public function down()
    {
        $this->dropColumn('{{%user_documents}}', 'verified');
    }
}
