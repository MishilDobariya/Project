<?php

namespace app\controllers;

use Yii;
use app\models\LibraryMagazineIssue;
use app\models\LibraryMagazineIssueSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LibraryMagazineIssueController implements the CRUD actions for LibraryMagazineIssue model.
 */
class LibraryMagazineIssueController extends Controller
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
     * Lists all LibraryMagazineIssue models.
     * @return mixed
     */
     public function actionPrint()
    {
        $model = new LibraryMagazineIssueSearch();
        $this->layout = false;
        $sql = "SELECT CONCAT_WS(' ', mm.Member_First_Name, mm.Member_Middle_Name, mm.Member_Last_Name) as Name,tm.Magazine_Title,
                mi.Magazine_Issue_Date,mi.Magazine_Due_Date,mi.Remarks"                
                . " FROM library_magazine_issue mi,library_magazine_title_master tm,library_member_master mm,library_magazine_subscription_master sm "
                . "WHERE mi.Magazine_Id=sm.Magazine_Subscription_Id AND sm.Magazine_Title_Id=tm.Magazine_Id AND mi.Magazine_Person_Id=mm.Member_Id";
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $this->render('print', ['data' => $data]);
        exit;
    
    }

    public function actionIndex()
    {
        $searchModel = new LibraryMagazineIssueSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LibraryMagazineIssue model.
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
     * Creates a new LibraryMagazineIssue model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function actionIssue() {
        $model = new LibraryMagazineIssue();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->db->createCommand("UPDATE library_magazine_subscription_master SET Magazine_Status = 3  WHERE Magazine_Subscription_Id = " . $model->Magazine_Id)->execute();
            $model->save();
            return $this->redirect(['create']);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    public function actionReturn() {
        //       $model = new LibraryTransectionIssue();
        $emodel = (Yii::$app->request->post('LibraryMagazineIssue'));
        //$emodel = new LibraryTransectionIssue();
        $rmodel = new \app\models\LibraryMagazineReturn();
        $smodel = new \app\models\LibraryMagazineSubscriptionMaster();
        $rmodel->Magazine_Id = $emodel['Magazine_Id'];
        $rmodel->Magazine_Person_Id = $emodel['Magazine_Person_Id'];
        $rmodel->Magazine_Issue_Date = $emodel['Magazine_Issue_Date'];
        $rmodel->Magazine_Due_Date = $emodel['Magazine_Due_Date'];
        $rmodel->Remarks = $emodel['Remarks'];
        Yii::$app->db->createCommand("update library_magazine_subscription_master set Magazine_Status=2  WHERE Magazine_Subscription_Id =" . $emodel["Magazine_Id"])->execute();
        yii::$app->db->createCommand("INSERT INTO library_magazine_return (Magazine_Person_Id,Magazine_Id,Magazine_Issue_Date,Magazine_Return_Date,Magazine_Due_Date,Remarks) values ('$rmodel->Magazine_Person_Id','$rmodel->Magazine_Id','$rmodel->Magazine_Issue_Date',CURDATE(),'$rmodel->Magazine_Due_Date','$rmodel->Remarks')")->execute();
        //Yii::$app->db->createCommand("DELETE FROM library_transection_issue WHERE Book_Id = '$emodel->Book_Id'")->execute();
        Yii::$app->db->createCommand("DELETE FROM library_magazine_issue WHERE Magazine_Id =" . $emodel["Magazine_Id"])->execute();
        $rmodel->save();
        return $this->redirect(['create']);
    }

    public function actionCreate()
    {
        $model = new LibraryMagazineIssue();
         $return = new \app\models\LibraryTransectionReceive();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Magazine_Issue_Id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing LibraryMagazineIssue model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Magazine_Issue_Id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing LibraryMagazineIssue model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
     //   $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LibraryMagazineIssue model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LibraryMagazineIssue the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LibraryMagazineIssue::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
