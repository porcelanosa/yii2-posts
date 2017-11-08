<?php
    
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    
    use \kartik\switchinput\SwitchInput;
    use mihaildev\ckeditor\CKEditor;
    use mihaildev\elfinder\ElFinder;
    
    use porcelanosa\posts\models\Posttypes;
    use porcelanosa\posts\models\Postcats;
    
    use \yii\helpers\ArrayHelper;
    
    /* @var $this yii\web\View */
    /* @var $model porcelanosa\posts\models\Posts */
    /* @var $form yii\widgets\ActiveForm */
?>

<div class="posts-form">
    
    <?php $form = ActiveForm::begin(
        [
            'enableClientValidation' => false,
            //'action' => 'update',
            'options'                => [
                'enctype'   => 'multipart/form-data',
                'data-pjax' => true
            ]
        ]
    ); ?>
    
    <? /*= $form->field($model, 'parent_id')->textInput() */ ?>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?=Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?=$form->field($model, 'post_cat_id')->dropDownList(ArrayHelper::map(Postcats::find()->all(), 'id', 'name'), ['prompt'=>'Категория публикации'])?>
        </div>

        <div class="col-md-3 ">
            <?=$form->field($model, 'post_type_id')->dropDownList(ArrayHelper::map(Posttypes::find()->all(), 'id', 'name'), ['prompt'=>'Тип публикации'])?>
        </div>
        <div class="col-md-3"><?=$form->field($model, 'name')->textInput(['maxlength' => true])?></div>
        <div class="col-md-3"><?=$form->field($model, 'slug')->textInput(['maxlength' => true])?></div>
    </div>
    <div class="row">
        <div class="col-md-4"><?=$form->field($model, 'title')->textInput(['maxlength' => true])?></div>
        <div class="col-md-6"><?=$form->field($model, 'meta_descr')->textInput(['maxlength' => true])?></div>
    </div>
    <div class="row">
        <div class="col-md-6"><?=$form->field($model, 'text')->widget(CKEditor::className(), [
                'editorOptions' => ElFinder::ckeditorOptions(
                    [
                        'elfinder',
                        'path' => Yii::getAlias('@userfiles')
                    ],
                    [
                        'preset' => 'standart', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                        'inline' => false, //по умолчанию false
                    ]),
            ])
            ;?>
        </div>
        <div class="col-md-6">
            <?=$form->field($model, 'short_text')->textarea(['rows' => 6])?>
            <div class="row">
                <div class="col-md-6"><?=$form->field($model, 'sort')->textInput()?></div>
                <div class="col-md-6"><?=$form->field($model, 'active')->widget(
                        SwitchInput::className(),
                        [
                            'type'          => SwitchInput::CHECKBOX,
                            'inlineLabel'   => true,
                            'pluginOptions' => [
                                'size'      => 'normal',
                                'labelText' => '<i class="glyphicon glyphicon-eye-open"></i>',
                                'onText'    => Yii::t('app', 'Показывать'),
                                'offText'   => Yii::t('app', 'Скрыть'),
                                /*'onColor' => 'aqua',
                                'offColor' => 'grey',*/
                            ],
                        ]
                    )
                    ;?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?
                        echo $model->showThumb(200, 200);
                    ?>
                    <?=$form->field( $model, 'image' )->fileInput( [ 'maxlength' => true ] )?>
                </div>
            </div>
        </div>
    </div>
    <?
        $model->metas['price'] = $model->getMetaValue('price');
        $model->metas['height'] = $model->getMetaValue('height');
    ?>
    <?=$form->field($model, 'metas[price]')->textInput()->label('Цена')?>
    <?=$form->field($model, 'metas[height]')->textInput()->label('Высота')?>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?=Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
            </div>
        </div>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
