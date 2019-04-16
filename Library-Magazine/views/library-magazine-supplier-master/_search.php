<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazineSupplierMasterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="library-magazine-supplier-master-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Magazine_Supplier_Id') ?>

    <?= $form->field($model, 'Magazine_Supplier_Name') ?>

    <?= $form->field($model, 'Magazine_Supplier_Address') ?>

    <?= $form->field($model, 'Magazine_Supplier_Phone_No') ?>

    <?= $form->field($model, 'Magazine_Supplier_Fax_No') ?>

    <?php // echo $form->field($model, 'Magazine_Supplier_Mobile_No') ?>

    <?php // echo $form->field($model, 'Magazine_Supplier_Email') ?>

    <?php // echo $form->field($model, 'Magazine_Supplier_Web_Address') ?>

    <?php // echo $form->field($model, 'Magazine_Supplier_Contact_Person_Name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
