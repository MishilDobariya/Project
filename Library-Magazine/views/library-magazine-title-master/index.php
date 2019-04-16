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
/* @var $searchModel app\models\LibraryMagazineTitleMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$config = require '../config/esta_config.php';

$this->title = 'Title Masters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-magazine-title-master-index">
 <?php // echo $this->render('_search', ['model' => $searchModel]); 
                require('../views/tabs/employeetabs.php');
                 showMagazineTabs(2);
    ?>
    <h1><?= Html::encode($this->title) ?></h1>
   

    <p>
        <?= Html::a('Create Library Magazine Title Master', ['create'], ['class' => 'btn btn-success']) ?>
          <?= Html::a('Print', ['print'], ['class' => 'btn btn-primary']) ?>
    </p>
    <div class="box box-primary">
    <?php
    $data = array("Department" => ArrayHelper::map(app\models\Department::find()->orderBy('Department_Name')->all(), 'Department_Id', 'Department_Name'));
    ?>
    
    <?php
    $data1 = array("Publisher" => ArrayHelper::map(app\models\LibraryMagazinePublisherMaster::find()->orderBy('Magazine_Publisher_Name')->all(), 'Magazine_Publisher_Id', 'Magazine_Publisher_Name'));
    ?>
    
     
    <?php
    $columns = [
        ['class' => 'kartik\grid\SerialColumn', 'order' => DynaGrid::ORDER_FIX_RIGHT],

            //'Magazine_Id',
            //'Type',
            [
            'attribute' => 'type',
            'filterType' => GridView::FILTER_SELECT2,
            'format' => 'raw',
            'width' => '170px',
            'filter' => array($config['TYPE']),
            'filterWidgetOptions' => [
                'options' => [
                    'placeholder' => 'All.'
                    ],
                ],
            ],
          //  'Magazine_Publisher_Id',
            [
            'attribute' => 'publisherName',
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
       
            'Magazine_Title',
          //  'Magazine_Type',
            [
            'attribute' => 'magazineType',
            'filterType' => GridView::FILTER_SELECT2,
            'format' => 'raw',
            'width' => '170px',
            'filter' => array($config['MAGAZINE_TYPE']),
            'filterWidgetOptions' => [
                'options' => [
                    'placeholder' => 'All.'
                    ],
                ],
             ],
          //   'Department_Id',
        [
            'attribute' => 'departmentName',
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
       
             'Magazine_Periodicty',
             'Magazine_Remarks',
             'Magazine_ISBN_No',
            // 'Magazine_Accession_No',

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
                            Html::a('<i class="glyphicon glyphicon-repeat"></i>', \yii\helpers\Url::to(['/library-magazine-title-master/index']), ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => 'Reset Grid'])
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