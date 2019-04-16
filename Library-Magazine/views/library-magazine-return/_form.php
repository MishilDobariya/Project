<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
$config = require '../config/esta_config.php';

/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazineReturn */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="library-magazine-return-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="box box-primary form-group-sm">
        <fieldset>
            <legend>Title Master</legend>
            <div class="row">
                <div class="col-md-2">
                       <?=
                    $form->field($model, 'Magazine_Id')->widget(Select2::classname(), ['data' => ArrayHelper::map(app
                                \models\LibraryMagazineSubscriptionMaster::find()->all(), 'Magazine_Subscription_Id', 'magazineTitle'),
                        'class' => "form-control", 'language' => 'en', 'options' => ['placeholder' => 'Magazine Title'],
                        'pluginOptions' => [ 'allowClear' => true],
                    ]);
                    ?>
                </div>
                <div class="col-md-2">
                    <?=
                    $form->field($model, 'Magazine_Person_Id')->widget(Select2::classname(), ['data' => ArrayHelper::map(app\models\LibraryMemberMaster::find()->all(), 'Member_Id', 'memberName'),
                        'class' => "form-control", 'language' => 'en', 'options' => ['placeholder' => 'Select Member'], 'pluginOptions' => [ 'allowClear' => true],
                    ]);
                    ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'Magazine_Return_Date')->widget(DatePicker::className(), ['inline' => false, 'options' => array('class' => "form-control"), 'value' => date('Y-m-d'), 'clientOptions' => ['changeYear' => true, 'changeMonth' => true, 'yearRange' => '1996:c+0', 'autoclose' => true, 'dateFormat' => 'yy-mm-dd']])->textInput(['placeholder' => 'Select Date', "datatype" => 'date']) ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'Magazine_Issue_Date')->widget(DatePicker::className(), ['inline' => false, 'options' => array('class' => "form-control"), 'value' => date('Y-m-d'), 'clientOptions' => ['changeYear' => true, 'changeMonth' => true, 'yearRange' => '1996:c+0', 'autoclose' => true, 'dateFormat' => 'yy-mm-dd']])->textInput(['placeholder' => 'Select Date', "datatype" => 'date']) ?>
                </div>
                
                <div class="col-md-2">
                    <?= $form->field($model, 'Magazine_Due_Date')->widget(DatePicker::className(), ['inline' => false, 'options' => array('class' => "form-control"), 'value' => date('Y-m-d'), 'clientOptions' => ['changeYear' => true, 'changeMonth' => true, 'yearRange' => '1996:c+0', 'autoclose' => true, 'dateFormat' => 'yy-mm-dd']])->textInput(['placeholder' => 'Select Date', "datatype" => 'date']) ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'Remarks')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </fieldset>
    </div>
    <div class="form-group">
          <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
    function stopRKey(evt) {
        var evt = (evt) ? evt : ((event) ? event : null);
        var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
        if ((evt.keyCode == 13) && (node.type == "text")) {
            $(this).closest('tr').next().find('form').focus();
            evt.preventDefault();
            return false;
        }
    }
    document.onkeypress = stopRKey;
</script> 