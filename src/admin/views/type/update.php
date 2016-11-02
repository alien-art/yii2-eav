<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model alien\eav\models\EavAttributeType */

$this->title = Yii::t('eav','Update Eav Attribute Type').': ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('eav','EAV'), 'url' => ['/eav']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('eav','Eav Attribute Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('eav','Update');
?>
<div class="eav-attribute-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
