<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
$config=  require '../config/esta_config.php';

/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazineSettingMaster */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="library-magazine-setting-master-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="box box-primary form-group-sm">
        <fieldset>
            <legend>Setting Master</legend>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'Magazine_Setting_Due_Date')->widget(DatePicker::className(), ['inline' => false, 'options' => array('class' => "form-control"), 'value' => date('Y-m-d'), 'clientOptions' => ['changeYear' => true, 'changeMonth' => true, 'yearRange' => '1996:c+0', 'autoclose' => true, 'dateFormat' => 'yy-mm-dd']])->textInput(['placeholder' => 'Select Date', "datatype" => 'date']) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'Reminder')->textInput(['maxlength' => true,'type' => 'number']) ?>

                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'Reminder_Alert_Time_Period')->textInput(['maxlength' => true,'type' => 'number']) ?>
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