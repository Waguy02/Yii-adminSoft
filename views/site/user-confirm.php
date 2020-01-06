<?php
use yii\helpers\Html;
?>
<p>Vous avez entré les informations suivantes :</p>

<ul>
    <li><label>Numéro</label>: <?= Html::encode($model->number) ?></li>
    <li><label>Nom</label>: <?= Html::encode($model->name) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
</ul>