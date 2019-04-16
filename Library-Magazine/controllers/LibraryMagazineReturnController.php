<?php

namespace app\controllers;

use Yii;
use app\models\LibraryMagazineReturn;
use app\models\LibraryMagazineReturnSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LibraryMagazineReturnController implements the CRUD actions for LibraryMagazineReturn model.
 */
class LibraryMagazineReturnController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all LibraryMagazineReturn models.
     * @return mixed
     */
     public function actionPrint()
    {
        $model = new LibraryMagazineReturnSearch();
        $this->layout = false;
        $sql = "SELECT CONCAT_WS(' ', mm.Member_First_Name, mm.Member_Middle_Name, mm.Member_Last_Name) as Name,tm.Magazine_Title,
                mr.Magazine_Return_Date,mr.Magazine_Issue_Date,mr.Magazine_Due_Date,mr.Remarks"                
                . " FROM library_magazine_return mr,library_magazine_title_master tm,library_member_master mm,library_magazine_subscription_master sm "
                . "WHERE mr.Magazine_Id=sm.Magazine_Subscription_Id AND sm.Magazine_Title_Id=tm.Magazine_Id AND mr.Magazine_Person_Id=mm.Member_Id";
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $this->render('print', ['data' => $data]);
        exit;
    
    }

    public function actionIndex()
    {
        $searchModel = new LibraryMagazineReturnSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LibraryMagazineReturn model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new LibraryMagazineReturn model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LibraryMagazineReturn();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Magazine_Return_Id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing LibraryMagazineReturn model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Magazine_Return_Id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing LibraryMagazineReturn model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LibraryMagazineReturn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LibraryMagazineReturn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LibraryMagazineReturn::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
