<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\posts\models\Postcats */

$this->title = 'Редактирование категории публикаций: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Категории публикаций', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование '.$model->name;
?>
<div class="postcats-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
