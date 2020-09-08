<?php

use yii\db\Migration;

/**
 * Class m190527_131921_change_shop_depository_photo_field
 */
class m190527_131921_change_shop_depository_photo_field extends Migration
{

    public function up()
    {
        $this->renameColumn('{{%shop_depository_photos}}', 'photo', 'image');
    }

    public function down()
    {
        $this->renameColumn('{{%shop_depository_photos}}', 'image', 'photo');
    }

}
