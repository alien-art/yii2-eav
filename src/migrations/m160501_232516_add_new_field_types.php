<?php

use mirocow\eav\handlers\ValueHandler;
use yii\db\Migration;

class m160501_232516_add_new_field_types extends Migration
{
    public function up()
    {

        $this->insert('{{%eav_attribute_type}}', [
            'name' => 'numiric',
            'storeType' => ValueHandler::STORE_TYPE_RAW,
            'handlerClass' => '\mirocow\eav\widgets\NumericInput',
        ]);

    }

    public function down()
    {
        echo "m160501_232516_add_new_field_types cannot be reverted.\n";

        return false;
    }
}
