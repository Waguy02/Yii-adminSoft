<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\ChooseLanForm;
use app\models\Languages;
use yii\widgets\ActiveForm;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>



    <div class="wrap">

       

        <?php

        /* 
         <?= Html::beginForm(['site/language'], 'post', [
            'enctype' => 'multipart/form-data',
            'id' => 'lang-form',
        ]) ?>
        <?= Html::dropDownList('language', Yii::$app->language, ['en' => 'English', 'fr' => 'Francais', 'rx' => 'Russe']) ?>
        <?= Html::submitButton('Change') ?>
        <?= Html::endForm() ?>
        
        ['site/language'], 'post', [
            'enctype' => 'multipart/form-data',
            'id' => 'lang-form',
        ] */
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);


        echo $this->render('../langues/select-language');
        NavBar::end(); 

        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?> | <?= $this->render('main/select-language') ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>



    <?php $this->endBody() ?>
    <?php
    $script = <<< JS
    
    $("form#lang-form").submit(function() {
            var form = $(this);
            // submit form
            
            console.log("Hyyeyeyeyeyeye");
            $.ajax({
                url: form.attr("action"),
                type: "post",
                data: form.serialize(),
                success: function(response) {
                    // reload the page after selecting a language
                    console.log("Je suis entré");
                    location.reload();
                },
                error: function() {
                    console.log("Ajax: internal server error");
                }
            });
            return false;
        });
JS;
    $this->registerJs($script);
    ?>




</body>

</html>
<?php $this->endPage() ?>