<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazinePublisherMasterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="library-magazine-publisher-master-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Magazine_Publisher_Id') ?>

    <?= $form->field($model, 'Magazine_Publisher_Name') ?>

    <?= $form->field($model, 'Magazine_Publisher_Address') ?>

    <?= $form->field($model, 'Magazine_Publisher_Phone_No') ?>

    <?= $form->field($model, 'Magazine_Publisher_Fax_No') ?>

    <?php // echo $form->field($model, 'Magazine_Publisher_Mobile_No') ?>

    <?php // echo $form->field($model, 'Magazine_Publisher_Email_Address') ?>

    <?php // echo $form->field($model, 'Magazine_Publisher_Web_Address') ?>

    <?php // echo $form->field($model, 'Magazine_Publisher_Contact_Person_Name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
