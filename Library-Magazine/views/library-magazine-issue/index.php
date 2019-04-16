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
/* @var $searchModel app\models\LibraryMagazineIssueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$config = require '../config/esta_config.php';

$this->title = 'Library Magazine Issues';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-magazine-issue-index">
 <?php // echo $this->render('_search', ['model' => $searchModel]);
                       require('../views/tabs/employeetabs.php');
                       showMagazineTabs(0);
    ?>

    <h1><?= Html::encode($this->title) ?></h1>
   
    <p>
        <?= Html::a('Create Library Magazine Issue', ['create'], ['class' => 'btn btn-success']) ?>
          <?= Html::a('Print', ['print'], ['class' => 'btn btn-primary']) ?>
    </p>
    <div class="box box-primary">
    <?php
    $data = array("Title" => ArrayHelper::map(app\models\LibraryMagazineIssue::find()->orderBy('Magazine_Id')->all(), 'Magazine_Id', 'title'));
    ?>
    <?php
    $data1 = array("Member" => ArrayHelper::map(app\models\LibraryMemberMaster::find()->orderBy('Member_First_Name')->all(), 'Member_Id', 'Member_First_Name'));
    ?>
    <?php
    $columns = [
            ['class' => 'kartik\grid\SerialColumn', 'order' => DynaGrid::ORDER_FIX_RIGHT],

           // 'Magazine_Issue_Id',
           
           // 'Magazine_Id',
              [
            'attribute' => 'title',
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
      
            //'Magazine_Person_Id',
            [
            'attribute' => 'memberName',
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
      
            'Magazine_Issue_Date',            
            'Magazine_Due_Date',
            'Remarks',
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
                            Html::a('<i class="glyphicon glyphicon-repeat"></i>', \yii\helpers\Url::to(['/library-magazine-issue/index']), ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => 'Reset Grid'])
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
