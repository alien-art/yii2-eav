<?php

use yii\db\Migration;

class m160501_014209_add_column_order_into_option extends Migration
{
    public function up()
    {

        $this->addColumn('{{%eav_attribute_option}}', 'order', $this->integer(11)->defaultValue(0));

    }

    public function down()
    {
        echo "m160501_014209_add_column_order_into_option cannot be reverted.\n";

        return false;
    }

}
