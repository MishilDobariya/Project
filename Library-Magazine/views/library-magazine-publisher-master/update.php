<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazinePublisherMaster */

$this->title = 'Update Publisher Master';
$this->params['breadcrumbs'][] = ['label' => 'Library Magazine Publisher Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Magazine_Publisher_Id, 'url' => ['view', 'id' => $model->Magazine_Publisher_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="library-magazine-publisher-master-update">
<?php
     require('../views/tabs/employeetabs.php');
     showMagazineTabs(5);
    ?>
 
    <h1><?= Html::encode($this->title) ?>
         <div class="pull-right back"><?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?></div>    
        <div style="clear:both"></div>

    </h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
