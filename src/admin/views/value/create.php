<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model alien\eav\models\EavAttributeValue */

$this->title = Yii::t('eav','Create Eav Attribute Value');
$this->params['breadcrumbs'][] = ['label' => Yii::t('eav','EAV'), 'url' => ['/eav']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('eav','Eav Attribute Values'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eav-attribute-value-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
