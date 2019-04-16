<div class="row">
    <div class="col-md-12">
        <?php
        use yii\helpers\Html;
        //use yii\widgets\ActiveForm;
        use kartik\widgets\ActiveForm;
        use kartik\builder\TabularForm;
        use kartik\grid\GridView;

        /* @var $this yii\web\View */
        /* @var $model app\models\InterviewBranch */
        /* @var $form yii\widgets\ActiveForm */
        $form = ActiveForm::begin(); 
        echo TabularForm::widget([
            'dataProvider'=>$dataProvider,
            'form'=>$form,
            'attributes'=>$model->formAttribs,
            'actionColumn'=> false,
            'checkboxColumn'=> FALSE,
            'gridSettings' => [
                'panel' => [
                    'heading' => '<h1 class="panel-title"><i class="glyphicon glyphicon-book"></i> Issued Magazine Detail</h1>',
                    'type' => GridView::TYPE_PRIMARY,
                ],
            ],

  
        ]);

        ?>       
    </div>
</div>


<?php ActiveForm::end(); 
?>

