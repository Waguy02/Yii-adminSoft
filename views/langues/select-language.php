<?php

use app\models\ChooseLanForm;
use app\models\Languages;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>


<ul class="nav navbar-nav navbar-right">
    <li>
        <?php
      
        $items = Languages::find()
            ->select(['name'])
            ->indexBy('code')
            ->column();
        
        ?>
        <?= Html::beginForm(['langues/language'], 'post', [
            'enctype' => 'multipart/form-data',
            'id' => 'lang-form',
        ]) ?>
        
        <?= Html::dropDownList('language', Yii::$app->language, $items) ?>
        <?= Html::submitButton('Change') ?>
        <?= Html::endForm() ?>

    </li>
</ul>