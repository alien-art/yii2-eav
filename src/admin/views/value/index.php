<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel alien\eav\models\EavAttributeValueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('eav','Eav Attribute Values');
$this->params['breadcrumbs'][] = ['label' => Yii::t('eav','EAV'), 'url' => ['/eav']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eav-attribute-value-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <? //= Html::a(Yii::t('eav','Create Eav Attribute Value'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'entityId',
            'attributeId',
            'value',
            'optionId',

            [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['width' => '70px'],
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>

</div>
