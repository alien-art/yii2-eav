<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model mirocow\eav\models\EavAttributeOption */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="eav-attribute-option-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'attributeId')->dropDownList($model->listAttributes, [])->hint('')->label(Yii::t('eav','Attribute name')) ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order')->textInput(['value' => 0, 'maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('eav','Create') : Yii::t('eav','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
