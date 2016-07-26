<?php

use yii\db\Migration;

class m160501_234949_remove_column_required_from_attribute extends Migration
{
    public function up()
    {

        $this->dropColumn('{{%eav_attribute}}', 'required');

    }

    public function down()
    {
        echo "m160501_234949_remove_column_required_from_attribute cannot be reverted.\n";

        return false;
    }
}
