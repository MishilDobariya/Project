<?php

use yii\helpers\Html;
//  use yii\grid\GridView;
use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\UserManagementModule;
//use yii\grid\GridView;
use kartik\grid\GridView;
//use kartik\export\ExportMenu;
use kartik\dynagrid\DynaGrid;
use kartik\editable\Editable;
use kartik\touchspin\TouchSpin;
use yii\helpers\ArrayHelper;
use kartik\sortable\Sortable;
use kartik\export\ExportMenu;
use kartik\dynagrid\DynaGridStore;
use yii\helpers\Url;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LibraryMagazinePublisherMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$config = require '../config/esta_config.php';

$this->title = 'Publisher Masters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-magazine-publisher-master-index">
  
<?php // echo $this->render('_search', ['model' => $searchModel]);
        require('../views/tabs/employeetabs.php');
         showMagazineTabs(5);
    ?>
    <h1><?= Html::encode($this->title) ?></h1>
    

    <p>
        <?= Html::a('Create Library Magazine Publisher Master', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Print', ['print'], ['class' => 'btn btn-primary']) ?>
    </p>
      <div class="box box-primary">
    <?php
    $columns = [
            ['class' => 'kartik\grid\SerialColumn', 'order' => DynaGrid::ORDER_FIX_RIGHT],

        //    'Magazine_Publisher_Id',
            'Magazine_Publisher_Name',
            'Magazine_Publisher_Address',
            'Magazine_Publisher_Phone_No',
            'Magazine_Publisher_Fax_No',
             'Magazine_Publisher_Mobile_No',
             'Magazine_Publisher_Email_Address:email',
             'Magazine_Publisher_Web_Address',
             'Magazine_Publisher_Contact_Person_Name',

            [
            'class' => 'kartik\grid\ActionColumn',
            'dropdown' => false,
            'order' => DynaGrid::ORDER_FIX_LEFT
            ],
           
         ['class' => 'kartik\grid\CheckboxColumn', 'order' => DynaGrid::ORDER_MIDDLE],
 ];
    
           $dynagrid = DynaGrid::begin([
                'columns' => $columns,
                'storage' => DynaGrid::TYPE_DB,
                'theme' => 'panel-info',
                'showPersonalize' => true,
                'gridOptions' => [
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'showPageSummary' => true,
                    'floatHeader' => true,
                    'floatOverflowContainer' => true,
                    'perfectScrollbarOptions' => false,
                    'pjax' => true,
                    'toolbar' => [
                        ['content' =>
                            Html::a('<i class="glyphicon glyphicon-repeat"></i>', \yii\helpers\Url::to(['/library-magazine-publisher-master/index']), ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => 'Reset Grid'])
                        ],
                        ['content' => '{dynagrid}{dynagridFilter}{dynagridSort}{export}{toggleData}'],
                    ]
                ],
                'options' => ['id' => 'dynagrid-library-book-master'] // a unique identifier is important
    ]);
    if (substr($dynagrid->theme, 0, 6) == 'simple') {
        $dynagrid->gridOptions['panel'] = false;
    }
    DynaGrid::end();
 

    ?>
</div>
</div>