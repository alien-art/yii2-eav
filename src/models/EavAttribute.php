<?php

namespace mirocow\eav\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%eav_attribute}}".
 *
 * @property integer $id
 * @property integer $entityId
 * @property integer $typeId
 * @property string $type
 * @property string $name
 * @property string $label
 * @property string $defaultValue
 * @property integer $defaultOptionId
 * @property integer $required
 * @property integer $order
 * @property string $description
 *
 * @property EavAttributeOption $defaultOption
 * @property EavAttributeType $eavType
 * @property EavAttributeOption[] $eavAttributeOptions
 * @property EavAttributeValue[] $eavAttributeValues
 * @property EavAttributeRule $eavAttributeRule
 */
class EavAttribute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%eav_attribute}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'defaultValue', 'label', 'description'], 'string', 'max' => 255],
             ['name', 'match', 'pattern' => '/(^|.*\])([\w\.]+)(\[.*|$)/', 'message' => Yii::t('eav','Attribute name must contain latin word characters only.')],
            [['type'], 'string', 'max' => 50],
            [['entityId', 'typeId', 'order'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'typeId' => Yii::t('eav', 'Type ID'),
            'entityId' => Yii::t('eav', 'Entity ID'),
            'type' => Yii::t('eav', 'Type'),
            'name' => Yii::t('eav', 'Name'),
            'label' => Yii::t('eav', 'Label'),
            'defaultValue' => Yii::t('eav', 'Default Value'), 
            'defaultOptionId' => Yii::t('eav', 'Default Option ID'),
            'order' => Yii::t('eav', 'Order'),
            'description' => Yii::t('eav', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDefaultOption()
    {
        return $this->hasOne(EavAttributeOption::className(), ['id' => 'defaultOptionId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEavType()
    {
        return $this->hasOne(EavAttributeType::className(), ['id' => 'typeId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntity()
    {
        return $this->hasOne(EavEntity::className(), ['id' => 'entityId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEavOptions()
    {
        return $this->hasMany(EavAttributeOption::className(), ['attributeId' => 'id'])
            ->orderBy(['order' => SORT_ASC]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEavAttributeValues()
    {
        return $this->hasMany(EavAttributeValue::className(), ['attributeId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEavAttributeRule()
    {
        return $this->hasOne(EavAttributeRule::className(), ['attributeId' => 'id']);
    }

    public function getRequired()
    {
        return $this->eavAttributeRule->required;
    }

    public function getbootstrapData()
    {
        return [
            'cid' => '',
            'label' => '',
            'field_type' => '',
            'required' => '',
            'field_options' => [],
        ];
    }

    public function getListTypes()
    {

        $models = EavAttributeType::find()->select(['id', 'name'])->asArray()->all();

        return ArrayHelper::map($models, 'id', 'name');

    }

    public function getListEntities()
    {

        $models = EavEntity::find()->select(['id', 'entityName'])->asArray()->all();

        return ArrayHelper::map($models, 'id', 'entityName');

    }

}