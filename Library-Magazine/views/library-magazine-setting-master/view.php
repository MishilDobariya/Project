<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazineSettingMaster */

$this->title = $model->Magazine_Setting_Id;
$this->params['breadcrumbs'][] = ['label' => 'Library Magazine Setting Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-magazine-setting-master-view">
 <?php
     require('../views/tabs/employeetabs.php');
     showMagazineTabs(6);
    ?>
    <h1><?= Html::encode($this->title) ?></h1>
 
<p>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->Magazine_Setting_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Add More', ['create'], ['class' => 'btn btn-success']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->Magazine_Setting_Id], [
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
           // 'Magazine_Setting_Id',
            'Magazine_Setting_Due_Date',
            'Reminder',
            'Reminder_Alert_Time_Period:datetime',
        ],
    ]) ?>
</div>
</div>
