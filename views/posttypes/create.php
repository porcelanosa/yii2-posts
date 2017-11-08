<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model porcelanosa\posts\models\Posttypes */

$this->title = 'Create Posttypes';
$this->params['breadcrumbs'][] = ['label' => 'Posttypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posttypes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
