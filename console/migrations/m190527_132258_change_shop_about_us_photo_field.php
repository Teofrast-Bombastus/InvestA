<?php

use yii\db\Migration;

/**
 * Class m190527_132258_change_shop_about_us_photo_field
 */
class m190527_132258_change_shop_about_us_photo_field extends Migration
{
    public function up()
    {
        $this->renameColumn('{{%shop_about_us_photos}}', 'photo', 'image');
    }

    public function down()
    {
        $this->renameColumn('{{%shop_about_us_photos}}', 'image', 'photo');
    }
}
