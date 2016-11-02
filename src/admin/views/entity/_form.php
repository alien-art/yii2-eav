<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model alien\eav\models\EavEntity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="eav-entity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'entityName')->textInput(['maxlength' => true])->hint(Yii::t('eav','The name of entity')) ?>

    <?= $form->field($model, 'entityModel')->textInput(['maxlength' => true])->hint(Yii::t('eav','This is the ActiveRecord class associated with the table that EavEntity will be built upon.
                You should provide a fully qualified class name, e.g., <code>app\models\Post</code>.')) ?>

    <?= $form->field($model, 'categoryId')->textInput()->hint(Yii::t('eav','This category id to bind to the directory. The default is not used and may be 0.')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('eav','Create') : Yii::t('eav','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
