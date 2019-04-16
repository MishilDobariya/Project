<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazineSettingMaster */

$this->title = 'Update Setting Master';
$this->params['breadcrumbs'][] = ['label' => 'Library Magazine Setting Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Magazine_Setting_Id, 'url' => ['view', 'id' => $model->Magazine_Setting_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="library-magazine-setting-master-update">
 <?php // echo $this->render('_search', ['model' => $searchModel]);
    require('../views/tabs/employeetabs.php');
     showMagazineTabs(6);
    ?>

    <h1><?= Html::encode($this->title) ?>
     <div class="pull-right back"><?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?></div>    
        <div style="clear:both"></div>

    </h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
