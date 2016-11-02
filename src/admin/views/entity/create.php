<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model alien\eav\models\EavEntity */

$this->title = Yii::t('eav','Create Eav Entity');
$this->params['breadcrumbs'][] = ['label' => Yii::t('eav','EAV'), 'url' => ['/eav']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('eav','Eav Entities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eav-entity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
