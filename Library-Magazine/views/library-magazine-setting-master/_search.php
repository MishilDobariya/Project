<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazineSettingMasterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="library-magazine-setting-master-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Magazine_Setting_Id') ?>

    <?= $form->field($model, 'Magazine_Setting_Due_Date') ?>

    <?= $form->field($model, 'Reminder') ?>

    <?= $form->field($model, 'Reminder_Alert_Time_Period') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
