<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazineIssueSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="library-magazine-issue-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Magazine_Issue_Id') ?>

    <?= $form->field($model, 'Magazine_Issue_Date') ?>

    <?= $form->field($model, 'Magazine_Id') ?>

    <?= $form->field($model, 'Magazine_Person_Id') ?>

    <?= $form->field($model, 'Remarks') ?>

    <?php // echo $form->field($model, 'Magazine_Due_Date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
