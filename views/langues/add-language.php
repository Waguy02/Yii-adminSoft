<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AddLanguageForm */
/* @var $form ActiveForm */
?>



<h1 style="text-align:center; margin:15px; text-decoration:underline; color:#547fcf">Ajouter une nouvelle Langue</h1>
<div class="langues-add-language" style="border-style:solid; border-radius:15px; padding:20px; border-color:#c1cde3">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'code') ?>
        <?= $form->field($model, 'nom') ?>
        <?= $form->field($model, 'source')->fileInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('common', 'Enregistrer'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- langues-add-language -->
