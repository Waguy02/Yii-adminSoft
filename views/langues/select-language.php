<?php

use app\models\ChooseLanForm;
use app\models\Languages;
use yii\widgets\ActiveForm;


?>


<ul class="nav navbar-nav navbar-right">
    <li>
        <?php $form = ActiveForm::begin(); ?>

        <?php
        /* @var $form yii\widgets\ActiveForm */
        $mod = new ChooseLanForm();
        $items = Languages::find()
            ->select(['name'])
            ->indexBy('code')
            ->column();
        echo $form->field($mod, 'lan')->dropdownList(
            $items,
            ['prompt' => 'Choisir une langue']
        );
        ?>
        <?php ActiveForm::end(); ?>
    </li>
</ul>