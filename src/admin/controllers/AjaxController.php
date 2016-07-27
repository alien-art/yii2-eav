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
                    
                    if($entityId)
                    {
                        //$entityId = $entityId;
                        EavAttribute::deleteAll('entityId = '.$entityId);
                    }
                    else {
                        $entity = new EavEntity();
                        
                        $entity->entityModel = $entityModel;
                        $entity->entityName = $entityName;
                        //$entity->categoryId = $entityid;
                        
                        $entity->save(false);
                        $entityId = $entity->id;
                    }
                    
                   $xml = simplexml_load_string($post['form']);
                   foreach ($xml->fields->field as $field)
                   {
                        $attribute = new EavAttribute();
                        $attribute->entityId = $entityId;
                        $attribute->label = $this->xml_attribute($field, 'label'); 
                        $attribute->name = $this->xml_attribute($field, 'name'); 
                        $attribute->description = $this->xml_attribute($field, 'description');

                        $attribute->typeId = EavAttributeType::find()
                                    ->select('id')
                                    ->where(['name'=>$this->xml_attribute($field, 'type')])
                                    ->scalar();
                        var_dump($attribute->typeId);
                        if (!$attribute->save()) 
                                var_dump($attribute->errors);
                    }
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
