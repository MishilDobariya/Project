<?php

namespace app\controllers;

use Yii;
use app\models\LibraryMagazineTitleMaster;
use app\models\LibraryMagazineTitleMasterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LibraryMagazineTitleMasterController implements the CRUD actions for LibraryMagazineTitleMaster model.
 */
class LibraryMagazineTitleMasterController extends Controller
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
     * Lists all LibraryMagazineTitleMaster models.
     * @return mixed
     */
     public function actionPrint()
    {
        $model = new LibraryMagazineTitleMasterSearch();
        $this->layout = false;
        $sql = "SELECT pm.Magazine_Publisher_Name,dm.Department_Name,tm.Type,tm.Magazine_Title,tm.Magazine_Periodicty,tm.Magazine_Remarks,tm.Magazine_ISBN_No,tm.Magazine_Type"
                . " FROM library_magazine_title_master tm,library_magazine_publisher_master pm,department_master dm "
                 . "WHERE tm.Department_Id=dm.Department_Id AND tm.Magazine_Publisher_Id=pm.Magazine_Publisher_Id";
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $this->render('print', ['data' => $data]);
        exit;
    
    }

    public function actionIndex()
    {
        $searchModel = new LibraryMagazineTitleMasterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LibraryMagazineTitleMaster model.
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
     * Creates a new LibraryMagazineTitleMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LibraryMagazineTitleMaster();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Magazine_Id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing LibraryMagazineTitleMaster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Magazine_Id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing LibraryMagazineTitleMaster model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $tf = false;
        $tf = \app\models\AllGlobalFunction::deleteallow("library_magazine_subscription_master,Magazine_Title_Id",$id);
        if($tf == false)
        {
            $this->findModel($id)->delete();
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the LibraryMagazineTitleMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LibraryMagazineTitleMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LibraryMagazineTitleMaster::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
