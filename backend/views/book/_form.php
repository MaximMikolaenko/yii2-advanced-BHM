<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Author;
use common\models\Book;

/* @var $this yii\web\View */
/* @var $model common\models\AuthorBook */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="author-book-form">
    <? if ($operation == 'update') : ?>
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'author_id')->dropDownList(
                ArrayHelper::map( Author::find()->all(), 'id',
                    function($model) {
                        return $model['name'].' '.$model['surname'];
                    }
                )
        ) ?>

        <?= $form->field($model, 'book_id')->hiddenInput(['book_id' => $model->book_id])->label(false)?>

        <?= $form->field($model->book, 'title')->textInput() ?>

        <?= $form->field($model->book, 'pages')->textInput() ?>

        <?= $form->field($model->book, 'genre')->textInput() ?>


        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    <?php else: ?>
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'author_id')->dropDownList(
            ArrayHelper::map( Author::find()->all(), 'id',
                function($model) {
                    return $model['name'].' '.$model['surname'];
                }
            ),
                [
                        'prompt' => 'Select Author',
                ]
        ) ?>

        <?= $form->field($model_book, 'title')->textInput() ?>

        <?= $form->field($model_book, 'pages')->textInput() ?>

        <?= $form->field($model_book, 'genre')->textInput() ?>


        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    <?php endif; ?>

</div>
