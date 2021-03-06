<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model porcelanosa\posts\models\Posttypes */

$this->title = 'Update Posttypes: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Posttypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="posttypes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
