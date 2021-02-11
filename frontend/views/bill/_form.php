<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Customer;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model common\models\Bill */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bill-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cust_id')->DropDownlist(ArrayHelper::map(Customer::find()->all(),'id','name'),['prompt'=>'Select Customer']) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
