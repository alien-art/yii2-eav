<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model mirocow\eav\models\EavAttribute */

$this->title = Yii::t('eav','Update Eav Attribute').': ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('eav','EAV'), 'url' => ['/eav']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('eav','Fields'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('eav','Update');
?>
<div class="eav-attribute-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
