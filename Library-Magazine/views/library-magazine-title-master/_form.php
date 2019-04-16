<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
$config = require '../config/esta_config.php';

/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazineTitleMaster */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="library-magazine-title-master-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="box box-primary form-group-sm">
        <fieldset>
            <legend>Title Master</legend>
            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($model, 'Type')->dropDownList($config['TYPE']) ?>
                </div>
                <div class="col-md-3">
                    <table  width="100%">
                        <tr>
                            <td width="40%">
                    
                                <?=
                                $form->field($model, 'Magazine_Publisher_Id')->widget(Select2::classname(), ['data' => ArrayHelper::map(app
                                    \models\LibraryMagazinePublisherMaster::find()->all(), 'Magazine_Publisher_Id', 'Magazine_Publisher_Name'),
                                    'class' => "form-control", 'language' => 'en', 'options' => ['placeholder' => 'Publisher Name'],
                                     'pluginOptions' => [ 'allowClear' => true],
                                      ]);
                                 ?>
                                <td width="2%">    
                                <a href="../library-magazine-publisher-master/create" target="_blank" class="btn btn-info btn-sm" style="margin-top: 8px;">+</a>
                                </td>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-3">
                     <?= $form->field($model, 'Magazine_Title')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'Magazine_Type')->dropDownList($config['MAGAZINE_TYPE']) ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'Magazine_Periodicty')->textInput() ?>
                </div>

                <div class="col-md-4">
                     <?=
                    $form->field($model, 'Department_Id')->widget(Select2::classname(), ['data' => ArrayHelper::map(app
                                \models\Department::find()->all(), 'Department_Id', 'Department_Name'),
                        'class' => "form-control", 'language' => 'en', 'options' => ['placeholder' => 'Department Name'],
                        'pluginOptions' => [ 'allowClear' => true],
                    ]);
                    ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'Magazine_ISBN_No')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'Magazine_Remarks')->textInput(['maxlength' => true]) ?>
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