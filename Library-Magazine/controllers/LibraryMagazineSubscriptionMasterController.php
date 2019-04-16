<?php

namespace app\controllers;

use Yii;
use app\models\LibraryMagazineSubscriptionMaster;
use app\models\LibraryMagazineSubscriptionMasterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LibraryMagazineSubscriptionMasterController implements the CRUD actions for LibraryMagazineSubscriptionMaster model.
 */
class LibraryMagazineSubscriptionMasterController extends Controller
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
     * Lists all LibraryMagazineSubscriptionMaster models.
     * @return mixed
     */
     public function actionPrint()
    {
        $model = new LibraryMagazineSubscriptionMasterSearch();
        $this->layout = false;
        $sql = "SELECT sm.Magazine_Subscription_Date,sm.Magazine_Subscription_No,sm.Magazine_Subscription_Amount,sm.Magazine_Subscription_From_Date,
            sm.Magazine_Subscription_To_Date,sm.Magazine_Subscription_Volume_No,sm.Magazine_Subscription_Issue_No,sm.Magazine_Subscription_Month,
            sm.Magazine_Subscription_Year,sm.Subscription_Period_Month,sm.Magazine_Mail_To_Send,sm.SMS_No,sm.Price_Of_Issue,sm.Magazine_Accession_No,
            tm.Magazine_Title,sum.Magazine_Supplier_Name,bs.Book_Status_Description"
             . " FROM library_magazine_subscription_master sm,library_magazine_title_master tm,library_magazine_supplier_master sum,library_book_status bs "
                . "WHERE sm.Magazine_Title_Id=tm.Magazine_Id AND sm.Magazine_Supplier_Id=sum.Magazine_Supplier_Id AND sm.Magazine_Status=bs.Book_Status_Id" ;

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $this->render('print', ['data' => $data]);
        exit;
    
    }

    public function actionIndex()
    {
        $searchModel = new LibraryMagazineSubscriptionMasterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LibraryMagazineSubscriptionMaster model.
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
     * Creates a new LibraryMagazineSubscriptionMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LibraryMagazineSubscriptionMaster();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Magazine_Subscription_Id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing LibraryMagazineSubscriptionMaster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Magazine_Subscription_Id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing LibraryMagazineSubscriptionMaster model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $tf = false;
        $tf = \app\models\AllGlobalFunction::deleteallow("library_magazine_issue,Magazine_Id,library_magazine_return,Magazine_Id",$id);
        if($tf == false)
        {
            $this->findModel($id)->delete();
        }
        return $this->redirect(['index']);
        
    }

    /**
     * Finds the LibraryMagazineSubscriptionMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LibraryMagazineSubscriptionMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LibraryMagazineSubscriptionMaster::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
