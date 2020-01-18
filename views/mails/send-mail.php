<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MailForm */
/* @var $form ActiveForm */
?>
<div class="mails-send-mail">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'sender') ?>
        <?= $form->field($model, 'receiver') ?>
        <?= $form->field($model, 'subject') ?>
        <?= $form->field($model, 'message')-> textArea() ?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('common', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- mails-send-mail -->
