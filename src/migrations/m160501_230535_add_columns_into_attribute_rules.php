<?php

use yii\db\Migration;

class m160501_230535_add_columns_into_attribute_rules extends Migration
{
    public function up()
    {

        $this->addColumn('{{%eav_attribute_rules}}', 'required', $this->smallInteger(1)->defaultValue(0));
        
        $this->addColumn('{{%eav_attribute_rules}}', 'visible', $this->smallInteger(1)->defaultValue(0));
        
        $this->addColumn('{{%eav_attribute_rules}}', 'locked', $this->smallInteger(1)->defaultValue(0));

    }

    public function down()
    {
        echo "m160501_230535_add_columns_into_attribute_rules cannot be reverted.\n";

        return false;
    }
}
