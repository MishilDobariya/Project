<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazineSubscriptionMasterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="library-magazine-subscription-master-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Magazine_Subscription_Id') ?>

    <?= $form->field($model, 'Magazine_Title_Id') ?>

    <?= $form->field($model, 'Magazine_Subscription_Date') ?>

    <?= $form->field($model, 'Magazine_Subscription_No') ?>

    <?= $form->field($model, 'Magazine_Subscription_Amount') ?>

    <?php // echo $form->field($model, 'Magazine_Subscription_From_Date') ?>

    <?php // echo $form->field($model, 'Magazine_Subscription_To_Date') ?>

    <?php // echo $form->field($model, 'Magazine_Subscription_Volume_No') ?>

    <?php // echo $form->field($model, 'Magazine_Subscription_Issue_No') ?>

    <?php // echo $form->field($model, 'Magazine_Subscription_Month') ?>

    <?php // echo $form->field($model, 'Magazine_Subscription_Year') ?>

    <?php // echo $form->field($model, 'Subscription_Period_Month') ?>

    <?php // echo $form->field($model, 'Magazine_Supplier_Id') ?>

    <?php // echo $form->field($model, 'Magazine_Mail_To_Send') ?>

    <?php // echo $form->field($model, 'SMS_No') ?>

    <?php // echo $form->field($model, 'Price_Of_Issue') ?>

    <?php // echo $form->field($model, 'Magazine_Status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
