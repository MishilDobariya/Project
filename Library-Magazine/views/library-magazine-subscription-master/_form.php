<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
$config = require '../config/esta_config.php';

/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazineSubscriptionMaster */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="library-magazine-subscription-master-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="box box-primary form-group-sm">
        <fieldset>
            <legend>Subscription Master</legend>
            <div class="row">
                <div class="col-md-3">
                    <table  width="100%">
                      <tr>
                       <td width="40%">
                    
                      <?=
                    $form->field($model, 'Magazine_Title_Id')->widget(Select2::classname(), ['data' => ArrayHelper::map(app
                                \models\LibraryMagazineTitleMaster::find()->all(), 'Magazine_Id', 'Magazine_Title'),
                        'class' => "form-control", 'language' => 'en', 'options' => ['placeholder' => 'Magazine Title'],
                        'pluginOptions' => [ 'allowClear' => true],
                    ]);
                    ?>
                       <td width="2%">    
                        <a href="../library-magazine-title-master/create" target="_blank" class="btn btn-info btn-sm" style="margin-top: 8px;">+</a>
                       </td>

                         </td>
                       </tr>
                     </table>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'Magazine_Subscription_Date')->widget(DatePicker::className(), ['inline' => false, 'options' => array('class' => "form-control"), 'value' => date('Y-m-d'), 'clientOptions' => ['changeYear' => true, 'changeMonth' => true, 'yearRange' => '1996:c+0', 'autoclose' => true, 'dateFormat' => 'yy-mm-dd']])->textInput(['placeholder' => 'Select Date', "datatype" => 'date']) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'Magazine_Subscription_No')->textInput() ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'Magazine_Subscription_Amount')->textInput() ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'Magazine_Subscription_From_Date')->widget(DatePicker::className(), ['inline' => false, 'options' => array('class' => "form-control"), 'value' => date('Y-m-d'), 'clientOptions' => ['changeYear' => true, 'changeMonth' => true, 'yearRange' => '1996:c+0', 'autoclose' => true, 'dateFormat' => 'yy-mm-dd']])->textInput(['placeholder' => 'Select Date', "datatype" => 'date']) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'Magazine_Subscription_To_Date')->widget(DatePicker::className(), ['inline' => false, 'options' => array('class' => "form-control"), 'value' => date('Y-m-d'), 'clientOptions' => ['changeYear' => true, 'changeMonth' => true, 'yearRange' => '1996:c+0', 'autoclose' => true, 'dateFormat' => 'yy-mm-dd']])->textInput(['placeholder' => 'Select Date', "datatype" => 'date']) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'Magazine_Subscription_Volume_No')->textInput() ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'Magazine_Subscription_Issue_No')->textInput() ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'Magazine_Subscription_Month')->textInput() ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'Magazine_Subscription_Year')->textInput() ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'Subscription_Period_Month')->textInput() ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'Magazine_Accession_No')->textInput() ?>
                </div>
                <div class="col-md-3">
                    <table  width="100%">
                      <tr>
                       <td width="40%">
    
                          <?=
                    $form->field($model, 'Magazine_Supplier_Id')->widget(Select2::classname(), ['data' => ArrayHelper::map(app
                                \models\LibraryMagazineSupplierMaster::find()->all(), 'Magazine_Supplier_Id', 'Magazine_Supplier_Name'),
                        'class' => "form-control", 'language' => 'en', 'options' => ['placeholder' => 'Supplier Name'],
                        'pluginOptions' => [ 'allowClear' => true],
                    ]);
                    ?>
                          <td width="2%">    
                           <a href="../library-magazine-supplier-master/create" target="_blank" class="btn btn-info btn-sm" style="margin-top: 8px;">+</a>
                          </td>

                         </td>
                       <tr>
                      </table>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'Magazine_Mail_To_Send')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-2">
                     <?= $form->field($model, 'SMS_No')->textInput() ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'Price_Of_Issue')->textInput() ?>
                </div>
                <div class="col-md-4">
                    <?=
                    $form->field($model, 'Magazine_Status')->widget(Select2::classname(), ['data' => ArrayHelper::map(app
                                \models\LibraryBookStatus::find()->all(), 'Book_Status_Id', 'Book_Status_Description'),
                        'class' => "form-control", 'language' => 'en', 'options' => ['placeholder' => 'Magazine status'],
                        'pluginOptions' => [ 'allowClear' => true],
                    ]);
                    ?>
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