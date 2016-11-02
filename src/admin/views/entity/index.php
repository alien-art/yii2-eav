<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel alien\eav\models\EavEntitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('eav','Eav Entities');
$this->params['breadcrumbs'][] = ['label' => Yii::t('eav','EAV'), 'url' => ['/eav']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eav-entity-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('eav','Create Eav Entity'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'entityName',
            'entityModel',
            'categoryId',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
