<?php

namespace app\controllers;

use Yii;
use app\models\LibraryMagazineSupplierMaster;
use app\models\LibraryMagazineSupplierMasterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LibraryMagazineSupplierMasterController implements the CRUD actions for LibraryMagazineSupplierMaster model.
 */
class LibraryMagazineSupplierMasterController extends Controller
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
     * Lists all LibraryMagazineSupplierMaster models.
     * @return mixed
     */
     public function actionPrint()
    {
        $model = new LibraryMagazineSupplierMasterSearch();
        $this->layout = false;
        $sql = "SELECT Magazine_Supplier_Name,Magazine_Supplier_Address,Magazine_Supplier_Phone_No,Magazine_Supplier_Fax_No,Magazine_Supplier_Mobile_No,Magazine_Supplier_Email,Magazine_Supplier_Web_Address,Magazine_Supplier_Contact_Person_Name "
                . "FROM library_magazine_supplier_master ";
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $this->render('print', ['data' => $data]);
        exit;
    
    }

    public function actionIndex()
    {
        $searchModel = new LibraryMagazineSupplierMasterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LibraryMagazineSupplierMaster model.
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
     * Creates a new LibraryMagazineSupplierMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LibraryMagazineSupplierMaster();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Magazine_Supplier_Id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing LibraryMagazineSupplierMaster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Magazine_Supplier_Id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing LibraryMagazineSupplierMaster model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $tf = false;
        $tf = \app\models\AllGlobalFunction::deleteallow("library_magazine_subscription_master,Magazine_Supplier_Id",$id);
        if($tf == false)
        {
            $this->findModel($id)->delete();
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the LibraryMagazineSupplierMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LibraryMagazineSupplierMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LibraryMagazineSupplierMaster::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
