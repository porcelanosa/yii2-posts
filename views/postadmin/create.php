<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model porcelanosa\models\Posts */

$this->title = 'Создание страницы';
$this->params['breadcrumbs'][] = ['label' => 'Страницы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
