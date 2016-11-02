<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model alien\eav\models\EavAttributeValueSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="eav-attribute-value-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'entityId') ?>

    <?= $form->field($model, 'attributeId') ?>

    <?= $form->field($model, 'value') ?>

    <?= $form->field($model, 'optionId') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('eav','Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('eav','Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
