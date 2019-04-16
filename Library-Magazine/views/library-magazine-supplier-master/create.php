<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazineSupplierMaster */

$this->title = 'Create Library Magazine Supplier Master';
$this->params['breadcrumbs'][] = ['label' => 'Library Magazine Supplier Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-magazine-supplier-master-create">
<?php
     require('../views/tabs/employeetabs.php');
     showMagazineTabs(4);
    ?>
  
    <h1><?= Html::encode($this->title) ?>
     <div class="pull-right back"><?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?></div>    
        <div style="clear:both"></div>
   
    </h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
