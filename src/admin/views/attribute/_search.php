<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model mirocow\eav\models\EavAttributeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="eav-attribute-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'entityId') ?>

    <?= $form->field($model, 'typeId') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'label') ?>

    <?php // echo $form->field($model, 'defaultValue') ?>

    <?php // echo $form->field($model, 'defaultOptionId') ?>

    <?php // echo $form->field($model, 'required') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('eav','Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('eav','Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
