<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model alien\eav\models\EavEntitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="eav-entity-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'entityName') ?>

    <?= $form->field($model, 'entityModel') ?>

    <?= $form->field($model, 'categoryId') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('eav','Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('eav','Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
