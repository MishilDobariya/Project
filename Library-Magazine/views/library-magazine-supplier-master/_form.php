<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazineSupplierMaster */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="library-magazine-supplier-master-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="box box-primary form-group-sm">
        <fieldset>
            <legend>Publisher Master</legend>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'Magazine_Supplier_Name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'Magazine_Supplier_Address')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'Magazine_Supplier_Phone_No')->textInput() ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'Magazine_Supplier_Fax_No')->textInput() ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'Magazine_Supplier_Mobile_No')->textInput() ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'Magazine_Supplier_Email')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'Magazine_Supplier_Web_Address')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'Magazine_Supplier_Contact_Person_Name')->textInput(['maxlength' => true]) ?>
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