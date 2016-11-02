<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model alien\eav\models\EavAttributeValue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="eav-attribute-value-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'entityId')->textInput() ?>

    <?= $form->field($model, 'attributeId')->textInput() ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'optionId')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('eav','Create') : Yii::t('eav','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
