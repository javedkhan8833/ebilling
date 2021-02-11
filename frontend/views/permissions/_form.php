<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Role;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Permissions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="permissions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'role_id')->dropDownlist(ArrayHelper::map(Role::find()->all(),'id','name'),['prompt'=>'Select Role']) ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
