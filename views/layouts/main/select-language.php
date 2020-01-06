<?php

use yii\bootstrap\Html;

if(\Yii::$app->language == 'fr'):
    
    echo Html::a('Go to English', array_merge(
        \Yii::$app->request->get(),
        [\Yii::$app->controller->route, 'language' => 'en']
    ));
else:
    
    echo Html::a('Aller au francais', array_merge(
        \Yii::$app->request->get(),
        [\Yii::$app->controller->route, 'language' => 'fr']
    ));
endif;