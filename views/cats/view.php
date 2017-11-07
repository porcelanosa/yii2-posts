<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\posts\models\Postcats */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Postcats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="postcats-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'parent_id',
            'slug',
            'name',
            'title',
            'meta_descr',
            'short_text:ntext',
            'text:ntext',
            'sort',
            'active',
        ],
    ]) ?>

</div>
