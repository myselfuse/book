<?php
    namespace app\controllers;

    use yii\web\Controller;
    use yii\data\Pagination;
    use app\models\Book;
    use app\models\AddBookForm;

class BookController extends Controller
{


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $query = Book::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $Books = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'books' => $Books,
            'pagination' => $pagination,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionAdd()
    {

        $model = new AddBookForm();
       
        return $this->render('add', [
            'model' => $model,
        ]);
    }

   public function delete($id){

        $model = Customer::findOne($id);
        $model->delete();    
        $model->deleteAll(['id'=>$id]);
   }
    /**
     * delete action.
     *
     * @return Response
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->get('id');
        $this->delete($id);
        return $this->render('delete', [
            'msg' => '删除成功',
        ]);
    }

}
