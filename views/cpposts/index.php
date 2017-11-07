<?php
    
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\Pjax;
    
    /* @var $this yii\web\View */
    /* @var $searchModel common\modules\posts\models\search\PostsSearch */
    /* @var $dataProvider yii\data\ActiveDataProvider */
    
    $this->title                   = 'Посты';
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-index">

    <h1><?=Html::encode($this->title)?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?=Html::a('Создать пост', ['create'], ['class' => 'btn btn-success'])?>
    </p>
    <?php Pjax::begin(); ?>
    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            //['class' => 'yii\grid\SerialColumn'],
            
            //'id',
            //'parent_id',
            'name',
            'title',
            'slug',
            // 'short_text:ntext',
            // 'text:ntext',
            // 'updated_at',
            // 'created_at',
            // 'sort',
            // 'active',
    
            [
                'class'          => 'porcelanosa\yii2togglecolumn\ToggleColumn',
                'attribute'      => 'active',
                // Uncomment if  you don't want AJAX
                'enableAjax'     => true,
                'contentOptions' => [ 'style' => 'width:150px;' ]
            ],
            
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}&nbsp;{delete}'],
        ],
    ]);?>
    <?php Pjax::end(); ?></div>
