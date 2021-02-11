<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Customer;
use yii\helpers\ArrayHelper;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Receipt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receipt-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'payment_id')->textInput() ?>

    <?= $form->field($model, 'cust_id')->DropDownlist(ArrayHelper::map(Customer::find()->all(),'id','name'),['prompt'=>'Select Customer']) ?>

    <?= $form->field($model, 'user_id')->DropDownlist(ArrayHelper::map(User::find()->all(),'id','username'),['prompt'=>'Select User']) ?>

    <?= $form->field($model, 'bill_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
