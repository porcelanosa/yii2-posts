<?php
    
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use porcelanosa\posts\models\Postcats;
    
    use \kartik\switchinput\SwitchInput;
    use mihaildev\ckeditor\CKEditor;
    use mihaildev\elfinder\ElFinder;
    
    
    use \yii\helpers\ArrayHelper;
    
    /* @var $this yii\web\View */
    /* @var $model common\modules\posts\models\Postcats */
    /* @var $form yii\widgets\ActiveForm */
?>

<div class="postcats-form">
    
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?=Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-3 ">
            <?=$form->field($model, 'parent_id')->dropDownList(ArrayHelper::map(Postcats::find()->all(), 'id', 'name'), ['prompt'=>'Родительская категория'])?>
        </div>
        <div class="col-md-3"><?=$form->field($model, 'name')->textInput(['maxlength' => true])?></div>
        <div class="col-md-3"><?=$form->field($model, 'slug')->textInput(['maxlength' => true])?></div>
    </div>

    <div class="row">
        <div class="col-md-4"><?=$form->field($model, 'title')->textInput(['maxlength' => true])?></div>
        <div class="col-md-6"><?=$form->field($model, 'meta_descr')->textInput(['maxlength' => true])?></div>
    </div>


    <div class="row">
        <div class="col-md-8"><?=$form->field($model, 'text')->widget(CKEditor::className(), [
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
        <div class="col-md-4">
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
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?=Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
            </div>
        </div>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
