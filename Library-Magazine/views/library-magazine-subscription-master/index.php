<?php


use yii\helpers\Html;
use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\UserManagementModule;
use kartik\grid\GridView;
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
/* @var $searchModel app\models\LibraryMagazineSubscriptionMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$config = require '../config/esta_config.php';

$this->title = 'Subscription Masters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-magazine-subscription-master-index">
<?php // echo $this->render('_search', ['model' => $searchModel])
                   require('../views/tabs/employeetabs.php');
                    showMagazineTabs(3);
    ?>
    <h1><?= Html::encode($this->title) ?></h1>
    

    <p>
        <?= Html::a('Create Library Magazine Subscription Master', ['create'], ['class' => 'btn btn-success']) ?>
          <?= Html::a('Print', ['print'], ['class' => 'btn btn-primary']) ?>
    </p>
    <div class="box box-primary">
    <?php
    $data = array("Title" => ArrayHelper::map(app\models\LibraryMagazineTitleMaster::find()->orderBy('Magazine_Title')->all(), 'Magazine_Id', 'Magazine_Title'));
    ?>
    
    <?php
    $data1 = array("supplier" => ArrayHelper::map(app\models\LibraryMagazineSupplierMaster::find()->orderBy('Magazine_Supplier_Name')->all(), 'Magazine_Supplier_Id', 'Magazine_Supplier_Name'));
    ?>
    
    <?php
    $data3= array("status" => ArrayHelper::map(app\models\LibraryBookStatus::find()->orderBy('Book_Status_Description')->all(), 'Book_Status_Id', 'Book_Status_Description'));
    ?>
    <?php 
    $columns = [
        
          ['class' => 'kartik\grid\SerialColumn', 'order' => DynaGrid::ORDER_FIX_RIGHT],


//            'Magazine_Subscription_Id',
          //  'Magazine_Title_Id',
            [
            'attribute' => 'magazineTitle',
            'filterType' => GridView::FILTER_SELECT2,
            'format' => 'raw',
            'width' => '170px',
            'filter' => array($data),
            'filterWidgetOptions' => [
                'options' => [
                    'placeholder' => 'All.'
                    ],
                ],
            ],
            'Magazine_Subscription_Date',
            'Magazine_Subscription_No',
            'Magazine_Subscription_Amount',
            'Magazine_Subscription_From_Date',
            'Magazine_Subscription_To_Date',
            'Magazine_Subscription_Volume_No',
            'Magazine_Subscription_Issue_No',
            'Magazine_Subscription_Month',
            'Magazine_Subscription_Year',
            'Subscription_Period_Month',
            //'Magazine_Supplier_Id',
            [
            'attribute' => 'supplierName',
            'filterType' => GridView::FILTER_SELECT2,
            'format' => 'raw',
            'width' => '170px',
            'filter' => array($data1),
            'filterWidgetOptions' => [
                'options' => [
                    'placeholder' => 'All.'
                    ],
                ],
            ],
            'Magazine_Mail_To_Send',
            'SMS_No',
            'Price_Of_Issue',
          //  'Magazine_Status',
            [
            'attribute' => 'status',
            'filterType' => GridView::FILTER_SELECT2,
            'format' => 'raw',
            'width' => '170px',
            'filter' => array($data3),
            'filterWidgetOptions' => [
                'options' => [
                    'placeholder' => 'All.'
                    ],
                ],
            ],
          
            'Magazine_Accession_No',

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
                            Html::a('<i class="glyphicon glyphicon-repeat"></i>', \yii\helpers\Url::to(['/library-magazine-subscription-master/index']), ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => 'Reset Grid'])
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