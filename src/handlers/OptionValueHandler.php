<?php
/**
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */

namespace mirocow\eav\handlers;

/**
 * Class OptionValueHandler
 * @package mirocow\eav
 */
class OptionValueHandler extends ValueHandler
{
    /**
     * @inheritdoc
     */
    public function load()
    {
        $valueModel = $this->getValueModel();
        return $valueModel->optionId;
    }

    /**
     * @inheritdoc
     */
    public function save()
    {
        $EavModel = $this->attributeHandler->owner;
        $valueModel = $this->getValueModel();
        $attribute = $this->attributeHandler->getAttributeName();

        if (isset($EavModel->attributes[$attribute])) {

            $valueModel->optionId = $EavModel->attributes[$attribute];

            if (!$valueModel->save()) {
                throw new \Exception("Can't save value model");
            }

        }

    }

    public function getTextValue()
    {
        return $this->getValueModel()->option->value;
    }
}