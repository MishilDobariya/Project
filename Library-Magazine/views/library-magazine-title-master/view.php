<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazineTitleMaster */

$this->title = $model->Magazine_Title;
$this->params['breadcrumbs'][] = ['label' => 'Library Magazine Title Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-magazine-title-master-view">
<?php
     require('../views/tabs/employeetabs.php');
     showMagazineTabs(2);
    ?>
  
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
       <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->Magazine_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Add More', ['create'], ['class' => 'btn btn-success']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->Magazine_Id], [
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
           // 'Magazine_Id',
            'type',
           // 'Magazine_Publisher_Id',
            'publisherName',
            'Magazine_Title',
            'magazineType',
            //'Department_Id',
            'departmentName',
            'Magazine_Periodicty',
            'Magazine_Remarks',
            'Magazine_ISBN_No',
           // 'Magazine_Accession_No',
        ],
    ]) ?>

</div>
    </div>
