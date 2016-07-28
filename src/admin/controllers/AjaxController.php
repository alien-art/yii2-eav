<?php

namespace mirocow\eav\admin\controllers;

use mirocow\eav\models\EavAttribute;
use mirocow\eav\models\EavAttributeOption;
use mirocow\eav\models\EavAttributeRule;
use mirocow\eav\models\EavAttributeType;
use mirocow\eav\models\EavAttributeValue;
use mirocow\eav\models\EavEntity;
use Yii;
use yii\helpers\Json;
use yii\web\Controller;

/**
 * AttributeController implements the CRUD actions for EavAttribute model.
 */
class AjaxController extends Controller
{

    /*public function actionIndex()
    {
        Yii::$app->response->format = 'json';

        $status = 'false';

        $attribuites = [];

        $types = EavAttributeType::find()->all();

        if ($types) {
            foreach ($types as $type) {
                $attribuites[$type->name] = $type->attributes;
                $attribuites[$type->name]['formBuilder'] = $type->formBuilder;
            }

            $status = 'success';
        }

        return ['status' => $status, 'types' => $attribuites];
    }*/

    public function actionSave()
    {
        if (Yii::$app->request->isPost) {

            $post = Yii::$app->request->post();

            if ($post['form'] && $post['entityname'] && $post['entitymodel']) {
                $transaction = \Yii::$app->db->beginTransaction();

                $entityModel = str_replace('/','\\', $post['entitymodel']);
                $entityName = $post['entityname'];
                //$entity_id = $post['entityid'];
                
                try {
                    $entityId = EavEntity::find()
                            ->select(['id'])
                            ->where([
                            //    'categoryId' => $entityid,
                                'entityModel'=>$entityModel,])
                            ->scalar();
                    
                    if(!$entityId)
                    {
                        $entity = new EavEntity();
                        
                        $entity->entityModel = $entityModel;
                        $entity->entityName = $entityName;
                        //$entity->categoryId = $entityid;
                        
                        $entity->save(false);
                        $entityId = $entity->id;
                    }
                    
                   $xml = simplexml_load_string($post['form']);
                   $attributes = [];
                   $order_a = 0;
                   foreach ($xml->fields->field as $field)
                   {
                         $attribute = EavAttribute::findOne(['name' => $this->xml_attribute($field, 'name'), 'entityId' => $entityId]);
                        if (!$attribute) {
                            $attribute = new EavAttribute;
                        }

                        $attribute->entityId = $entityId;
                        $attribute->label = $this->xml_attribute($field, 'label'); 
                        $attribute->name = $this->xml_attribute($field, 'name'); 
                        $attribute->description = $this->xml_attribute($field, 'description');
                        $attribute->order = $order_a;

                        $attribute->typeId = EavAttributeType::find()
                                    ->select('id')
                                    ->where(['name'=>$this->xml_attribute($field, 'type')])
                                    ->scalar();
                        
                        if (!$attribute->save()) 
                                var_dump($attribute->errors);
                        
                        $order_a++;
                        
                        $attributes[] = $attribute->id;
                        if (isset($field->option)) 
                        {
                            $options = [];
                            $order = 0;
                            foreach ($field->option as $k=>$o) {
                                $option = EavAttributeOption::find()->where(['attributeId' => $attribute->id, 'value' => $this->xml_attribute($o, 'value')])->one();
                                if (!$option) {
                                    $option = new EavAttributeOption;
                                }
                                $option->attributeId = $attribute->id;
                                $option->value = $this->xml_attribute($o, 'value');
                                $option->order = $order;
                                if (!$option->save())
                                    var_dump($option->errors);
                                
                                $order ++;
                                $options[] = $option->value;
                            }
                            
                           EavAttributeOption::deleteAll([
                                'and',
                                ['attributeId' => $attribute->id],
                                ['NOT', ['IN', 'value', $options]]
                            ]);
                        }
                    }
                    
                    EavAttribute::deleteAll(['NOT', ['IN', 'id', $attributes]]);
                    $transaction->commit();
                    echo "Атрибуты сохранены";

                } catch (\Exception $e) {
                    $transaction->rollBack();
                    throw $e;
                }

            }


        }
    }

   protected function xml_attribute($object, $attribute)
    {
    if(isset($object[$attribute]))
        return (string) $object[$attribute];
    }

}
