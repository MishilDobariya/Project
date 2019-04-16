<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazinePublisherMaster */

$this->title = $model->Magazine_Publisher_Name;
$this->params['breadcrumbs'][] = ['label' => 'Library Magazine Publisher Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-magazine-publisher-master-view">
  <?php
     require('../views/tabs/employeetabs.php');
     showMagazineTabs(5);
    ?>
    <p>

    <h1><?= Html::encode($this->title) ?></h1>
 <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->Magazine_Publisher_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Add More', ['create'], ['class' => 'btn btn-success']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->Magazine_Publisher_Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>   </p>
 <div class="box box-success direct-chat direct-chat-success">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'Magazine_Publisher_Id',
            'Magazine_Publisher_Name',
            'Magazine_Publisher_Address',
            'Magazine_Publisher_Phone_No',
            'Magazine_Publisher_Fax_No',
            'Magazine_Publisher_Mobile_No',
            'Magazine_Publisher_Email_Address:email',
            'Magazine_Publisher_Web_Address',
            'Magazine_Publisher_Contact_Person_Name',
        ],
    ]) ?>
</div>
</div>
