<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazineTitleMaster */

$this->title = 'Update Title Master';
$this->params['breadcrumbs'][] = ['label' => 'Library Magazine Title Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Magazine_Id, 'url' => ['view', 'id' => $model->Magazine_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="library-magazine-title-master-update">
 <?php // echo $this->render('_search', ['model' => $searchModel]); 
                require('../views/tabs/employeetabs.php');
                 showMagazineTabs(2);
    ?>
    <h1><?= Html::encode($this->title) ?>
          <div class="pull-right back"><?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?></div>    
        <div style="clear:both"></div>

    </h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
