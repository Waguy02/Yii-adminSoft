<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AddLanguageForm */
/* @var $form ActiveForm */
?>



<h1 style="text-align:center; margin:15px; text-decoration:underline; color:#547fcf"> <?php echo Yii::t('common', "Add a new Language")?>  </h1>
<div class="langues-add-language" style="border-style:solid; border-radius:15px; padding:20px; border-color:#c1cde3">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
   
    <?= $form->field($model, 'code')->label(Yii::t('common', 'Code')) ?>
    <?= $form->field($model, 'nom')->label(Yii::t('common', 'Name')) ?>
    <?= $form->field($model, 'source')->label(Yii::t('common', 'Source'))->fileInput(['class'=>'form-control']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common', 'Save'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- langues-add-language -->