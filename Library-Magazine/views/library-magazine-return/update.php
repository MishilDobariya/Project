<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazineReturn */

$this->title = 'Update Magazine Return';
$this->params['breadcrumbs'][] = ['label' => 'Library Magazine Returns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Magazine_Return_Id, 'url' => ['view', 'id' => $model->Magazine_Return_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="library-magazine-return-update">
<?php // echo $this->render('_search', ['model' => $searchModel]);
                    require('../views/tabs/employeetabs.php');
                     showMagazineTabs(1);
    ?>
    <h1><?= Html::encode($this->title) ?>
    <div class="pull-right back"><?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?></div>    
        <div style="clear:both"></div>
    </h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
