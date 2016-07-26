<?php

use yii\helpers\Html;

?>

<h2><?= Yii::t('eav', 'EAV Fields constructor') ?></h2>

<table class="table">
    <caption><?= Yii::t('eav', 'Descriptions') ?></caption>
    <tr>
        <th>№</th>
        <th><?= Yii::t('eav', 'Route') ?></th>
        <th><?= Yii::t('eav', 'Description') ?></th>
        <th><?= Yii::t('eav', 'Operations') ?></th>
    </tr>

    <tr>
        <td>1</td>
        <td>admin/attribute/index</td>
        <td><?= Yii::t('eav', 'Fields constructor') ?></td>
        <td>
            <?= Html::a(Yii::t('eav', 'Create'), ['admin/attribute/create']) ?>&nbsp;
            <?= Html::a(Yii::t('eav', 'List'), ['admin/attribute/index']) ?>
        </td>
    </tr>

    <tr>
        <td>2</td>
        <td>admin/option/index</td>
        <td><?= Yii::t('eav', 'Options constructor') ?></td>
        <td>
            <?= Html::a(Yii::t('eav', 'Create'), ['admin/option/create']) ?>&nbsp;
            <?= Html::a(Yii::t('eav', 'List'), ['admin/option/index']) ?>
        </td>
    </tr>

    <tr>
        <td>3</td>
        <td>admin/type/index</td>
        <td><?= Yii::t('eav', 'Types constructor') ?></td>
        <td>
            <?= Html::a(Yii::t('eav', 'Create'), ['admin/type/create']) ?>&nbsp;
            <?= Html::a(Yii::t('eav', 'List'), ['admin/type/index']) ?>
        </td>
    </tr>

    <tr>
        <td>3</td>
        <td>admin/entity/index</td>
        <td><?= Yii::t('eav', 'Entities constructor') ?></td>
        <td>
            <?= Html::a(Yii::t('eav', 'Create'), ['admin/entity/create']) ?>&nbsp;
            <?= Html::a(Yii::t('eav', 'List'), ['admin/entity/index']) ?>
        </td>
    </tr>

    <tr>
        <td>4</td>
        <td>admin/value/index</td>
        <td><?= Yii::t('eav', 'Values constructor') ?></td>
        <td>
            <?= Yii::t('eav', 'Create') ?>&nbsp;
            <?= Html::a(Yii::t('eav', 'List'), ['admin/value/index']) ?>
        </td>
    </tr>

</table>