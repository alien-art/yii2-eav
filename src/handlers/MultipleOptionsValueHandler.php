<?php
/**
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */

namespace mirocow\eav\handlers;

use yii\db\ActiveRecord;

/**
 * Class MultipleOptionsValueHandler
 * @package mirocow\eav
 */
class MultipleOptionsValueHandler extends ValueHandler
{
    /** @var AttributeHandler */
    public $attributeHandler;

    public function load()
    {
        $EavModel = $this->attributeHandler->owner;

        /** @var ActiveRecord $valueClass */
        $valueClass = $EavModel->valueClass;

        $models = $valueClass::findAll([
            'entityId' => $EavModel->entityModel->getPrimaryKey(),
            'attributeId' => $this->attributeHandler->attributeModel->getPrimaryKey(),
        ]);

        $values = [];
        foreach ($models as $model) {
            $values[] = $model->optionId;
        }

        return $values;
    }

    public function save()
    {
        $EavModel = $this->attributeHandler->owner;
        $attribute = $this->attributeHandler->getAttributeName();
        /** @var ActiveRecord $valueClass */
        $valueClass = $EavModel->valueClass;

        $baseQuery = $valueClass::find()->where([
            'entityId' => $EavModel->entityModel->getPrimaryKey(),
            'attributeId' => $this->attributeHandler->attributeModel->getPrimaryKey(),
        ]);

        $allOptions = [];
        foreach ($this->attributeHandler->attributeModel->eavOptions as $option) {
            $allOptions[] = $option->getPrimaryKey();
        }

        $query = clone $baseQuery;
        $query->andWhere("optionId NOT IN (:options)");
        $valueClass::deleteAll($query->where, [
            'options' => implode(',', $allOptions),
        ]);

        // then we delete unselected options
        $selectedOptions = $EavModel->attributes[$attribute];
        if (!is_array($selectedOptions)) {
            $selectedOptions = [];
        }
        $deleteOptions = array_diff($allOptions, $selectedOptions);

        $query = clone $baseQuery;
        $query->andWhere("optionId IN (:options)");

        $valueClass::deleteAll($query->where, [
            'options' => implode(',', $deleteOptions),
        ]);

        // third we insert missing options
        foreach ($selectedOptions as $id) {
            $query = clone $baseQuery;
            $query->andWhere(['optionId' => $id]);

            $valueModel = $query->one();

            if (!$valueModel instanceof ActiveRecord) {
                /** @var ActiveRecord $valueModel */
                $valueModel = new $valueClass;
                $valueModel->entityId = $EavModel->entityModel->getPrimaryKey();
                $valueModel->attributeId = $this->attributeHandler->attributeModel->getPrimaryKey();
                $valueModel->optionId = $id;
                if (!$valueModel->save()) {
                    throw new \Exception("Can't save value model");
                }
            }
        }
    }

    public function getTextValue()
    {
        $EavModel = $this->attributeHandler->owner;

        /** @var ActiveRecord $valueClass */
        $valueClass = $EavModel->valueClass;

        $models = $valueClass::findAll([
            'entityId' => $EavModel->entityModel->getPrimaryKey(),
            'attributeId' => $this->attributeHandler->attributeModel->getPrimaryKey(),
        ]);

        $values = [];
        foreach ($models as $model) {
            $values[] = $model->option->value;
        }

        return implode(', ', $values);
    }
}