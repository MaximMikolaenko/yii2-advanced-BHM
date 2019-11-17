<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Author */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="author-form">

    <? if ($operation == 'update') : ?>
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

        <?=
            DatePicker::widget([
                'name' => 'birth_date',
                'value' => $model->birth_date,
                'options' => ['placeholder' => 'Select date ...'],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]);
        ?>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    <?php else: ?>

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

        <?=
        DatePicker::widget([
            'name' => 'birth_date',
            'value' => date('Y-m-d'),
            'options' => ['placeholder' => 'Select date ...'],
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true
            ]
        ]);
        ?>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    <?php endif; ?>
</div>
