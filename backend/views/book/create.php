<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AuthorBook */

$this->title = 'Create Book';
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model_book' => $model_book,
        'model_author' => $model_author,
        'operation' => 'create',
    ]) ?>

</div>
