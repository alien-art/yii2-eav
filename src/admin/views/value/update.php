<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model mirocow\eav\models\EavAttributeValue */

$this->title = Yii::t('eav','Update Eav Attribute Value').': ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('eav','EAV'), 'url' => ['/eav']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('eav','Eav Attribute Values'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('eav','Update');
?>
<div class="eav-attribute-value-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
