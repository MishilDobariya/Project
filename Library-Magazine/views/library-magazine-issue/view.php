<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazineIssue */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Library Magazine Issues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-magazine-issue-view">
 <?php
     require('../views/tabs/employeetabs.php');
     showMagazineTabs(0);
    ?>
    <h1><?= Html::encode($this->title) ?></h1>
 
<p>
       <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->Magazine_Issue_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Add More', ['create'], ['class' => 'btn btn-success']) ?>
     
    </p>
     <div class="box box-success direct-chat direct-chat-success">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //  'Magazine_Issue_Id',
            
            'title',
            'memberName',
            'Magazine_Issue_Date',
            'Magazine_Due_Date',
            'Remarks',
        ],
    ]) ?>
</div>
</div>
