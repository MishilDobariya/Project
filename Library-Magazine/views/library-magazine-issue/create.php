<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazineIssue */

$this->title = 'Create Library Magazine Issue';
$this->params['breadcrumbs'][] = ['label' => 'Library Magazine Issues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-magazine-issue-create">
  <?php
     require('../views/tabs/employeetabs.php');
     showMagazineTabs(0);
    ?>
  
    <h1><?= Html::encode($this->title) ?>
       <div class="pull-right back"><?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?></div>    
        <div style="clear:both"></div>

    </h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
