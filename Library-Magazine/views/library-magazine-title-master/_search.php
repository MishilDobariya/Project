<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazineTitleMasterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="library-magazine-title-master-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Magazine_Id') ?>

    <?= $form->field($model, 'Type') ?>

    <?= $form->field($model, 'Magazine_Publisher_Id') ?>

    <?= $form->field($model, 'Magazine_Title') ?>

    <?= $form->field($model, 'Magazine_Type') ?>

    <?php // echo $form->field($model, 'Department_Id') ?>

    <?php // echo $form->field($model, 'Magazine_Periodicty') ?>

    <?php // echo $form->field($model, 'Magazine_Remarks') ?>

    <?php // echo $form->field($model, 'Magazine_ISBN_No') ?>

    <?php // echo $form->field($model, 'Magazine_Accession_No') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
