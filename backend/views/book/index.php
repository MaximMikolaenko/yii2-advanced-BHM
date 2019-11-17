<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Author;
use common\models\Book;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'author.name',
            'author.surname',
            'book.title',
            'book.pages',
            'book.genre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
