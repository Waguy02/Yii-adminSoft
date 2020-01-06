<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

?>

<p>Vous avez entré les informations suivantes : </p>

<ul>
    <li><label>Nom</label> : <?= Html::encode($model ->nom) ?> </li>
    <li><label>Email</label> : <?= Html::encode($model ->email) ?></li>
</ul>