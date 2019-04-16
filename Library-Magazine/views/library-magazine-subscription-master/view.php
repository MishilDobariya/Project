<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazineSubscriptionMaster */

$this->title = $model->magazineTitle;
$this->params['breadcrumbs'][] = ['label' => 'Library Magazine Subscription Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-magazine-subscription-master-view">
<?php
     require('../views/tabs/employeetabs.php');
     showMagazineTabs(3);
    ?>
    <h1><?= Html::encode($this->title) ?></h1>
  
    <p>
       <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->Magazine_Subscription_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Add More', ['create'], ['class' => 'btn btn-success']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->Magazine_Subscription_Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>
 <div class="box box-success direct-chat direct-chat-success">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'Magazine_Subscription_Id',
            'magazineTitle',
            'Magazine_Subscription_Date',
            'Magazine_Subscription_No',
            'Magazine_Subscription_Amount',
            'Magazine_Subscription_From_Date',
            'Magazine_Subscription_To_Date',
            'Magazine_Subscription_Volume_No',
            'Magazine_Subscription_Issue_No',
            'Magazine_Subscription_Month',
            'Magazine_Subscription_Year',
            'Subscription_Period_Month',
            'Magazine_Supplier_Id',
            'Magazine_Mail_To_Send',
            'SMS_No',
            'Price_Of_Issue',
          //  'Magazine_Status',
            'status',
            'Magazine_Accession_No',
        ],
    ]) ?>
</div>
</div>
