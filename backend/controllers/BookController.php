<?php

namespace backend\controllers;

use Yii;
use common\models\AuthorBook;
use common\models\Author;
use common\models\Book;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * BookController implements the CRUD actions for AuthorBook model.
 */
class BookController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'view', 'delete', 'update', 'create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AuthorBook models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AuthorBook::find()->with('author')->with('book'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthorBook model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AuthorBook model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthorBook();
        $model_book = new Book();
        $model_author = new Author();


        if ($model->load(Yii::$app->request->post())) {

            $model_book->title = Yii::$app->request->post()["Book"]["title"];
            $model_book->pages = Yii::$app->request->post()["Book"]["pages"];
            $model_book->genre = Yii::$app->request->post()["Book"]["genre"];
            $model_book->insert();

            $model->author_id = Yii::$app->request->post()["AuthorBook"]["author_id"];
            $model->book_id = $model_book->id;
            $model->insert();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'model_book' => $model_book,
            'model_author' => $model_author,
        ]);
    }

    /**
     * Updates an existing AuthorBook model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $book = Book::findOne(Yii::$app->request->post()["AuthorBook"]["book_id"]);
//            print_r($book);
//            die();
            $book->title = Yii::$app->request->post()["Book"]["title"];
            $book->pages = Yii::$app->request->post()["Book"]["pages"];
            $book->genre = Yii::$app->request->post()["Book"]["genre"];
//            print_r($book);
            $book->save();

            $author_book = AuthorBook::findOne($id);
            $author_book->author_id = Yii::$app->request->post()["AuthorBook"]["author_id"];
            $author_book->save();
//            print_r($author_book);
//            die();
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AuthorBook model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if(Book::findOne($model->book_id)->delete()) {
            $model->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthorBook model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AuthorBook the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthorBook::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
