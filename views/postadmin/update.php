<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model porcelanosa\posts\models\Posts */

$this->title = 'Обновление публикации: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Публикации', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование '.$model->name;
?>
<div class="pages-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
