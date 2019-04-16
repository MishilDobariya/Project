<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazineReturn */

$this->title = $model->magazineTitle;
$this->params['breadcrumbs'][] = ['label' => 'Library Magazine Returns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-magazine-return-view">
 <?php
     require('../views/tabs/employeetabs.php');
     showMagazineTabs(1);
    ?>
    <h1><?= Html::encode($this->title) ?></h1>
 
   <p>
       <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->Magazine_Return_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Add More', ['create'], ['class' => 'btn btn-success']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->Magazine_Return_Id], [
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
            //'Magazine_Return_Id',
            'magazineTitle',            
            'Magazine_Person_Id',
            'Magazine_Return_Date',
            'Magazine_Issue_Date',
            'Magazine_Due_Date',
            'Remarks',
        ],
    ]) ?>
</div>
</div>
