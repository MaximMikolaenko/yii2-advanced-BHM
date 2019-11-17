<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\AuthorBook;


class BookController extends Controller
{
    public function actionIndex()
    {
        $books = AuthorBook::find()->asArray()->with('author')->with('book')->all();
        return $this->render('index', compact('books'));
    }

}
