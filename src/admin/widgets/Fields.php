<?php

namespace mirocow\eav\admin\widgets;

use mirocow\eav\models\EavAttribute;
use Yii;
use yii\base\Widget;
use yii\helpers\Json;
use yii\helpers\Url;

class Fields extends Widget
{
    public $url = ['/eav/admin/ajax/index'];

    public $urlSave = ['/eav/admin/ajax/save'];

    public $model;

    public $categoryId = 0;

    public $entityModel;

    public $entityName = 'Untitled';

    public $options = [];

    private $bootstrapData = [];

    private $rules = [];

    public function init()
    {
        parent::init();

        $this->url = Url::toRoute($this->url);

        $this->urlSave = Url::toRoute($this->urlSave);

        $this->entityModel = str_replace('\\', '\\\\', $this->entityModel);

        /** @var EavAttribute $attribute */
        foreach ($this->model->getEavAttributes()->all() as $attribute) {

            $options = [
                'description' => $attribute->description,
                'required' => $attribute->required,
            ];

            foreach ($attribute->eavOptions as $option) {
                $options['options'][] = [
                    'label' => $option->value,
                    'id' => $option->id,
                    'checked' => (bool)$option->defaultOptionId,
                ];
            }

            $this->bootstrapData[] = [
                'group_name' => $attribute->type,
                'label' => $attribute->label,
                'field_type' => $attribute->eavType->name,
                'field_options' => $options,
                'cid' => $attribute->name,
            ];

        }

        $this->bootstrapData = Json::encode($this->bootstrapData);
    }

    public function run()
    {
        return $this->render('fields', [
            'url' => $this->url,
            'urlSave' => $this->urlSave,
            //'id' => $this->model->primaryKey,
            'categoryId' => isset($this->categoryId) ? $this->categoryId : 0,
            'entityModel' => $this->entityModel,
            'entityName' => $this->entityName,
            'bootstrapData' => $this->bootstrapData,
        ]);
    }
}