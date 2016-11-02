<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model alien\eav\models\EavAttributeOption */

$this->title = Yii::t('eav','Update Eav Attribute Option').': ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('eav','EAV'), 'url' => ['/eav']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('eav','Eav Attribute Options'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('eav','Update');
?>
<div class="eav-attribute-option-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
