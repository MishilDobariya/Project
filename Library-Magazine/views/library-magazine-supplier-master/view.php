<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazineSupplierMaster */

$this->title = $model->Magazine_Supplier_Name;
$this->params['breadcrumbs'][] = ['label' => 'Library Magazine Supplier Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-magazine-supplier-master-view">
 <?php
     require('../views/tabs/employeetabs.php');
     showMagazineTabs(4);
    ?>
 
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->Magazine_Supplier_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Add More', ['create'], ['class' => 'btn btn-success']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->Magazine_Supplier_Id], [
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
           // 'Magazine_Supplier_Id',
            'Magazine_Supplier_Name',
            'Magazine_Supplier_Address',
            'Magazine_Supplier_Phone_No',
            'Magazine_Supplier_Fax_No',
            'Magazine_Supplier_Mobile_No',
            'Magazine_Supplier_Email:email',
            'Magazine_Supplier_Web_Address',
            'Magazine_Supplier_Contact_Person_Name',
        ],
    ]) ?>
</div>
</div>
