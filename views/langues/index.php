<?php

/* @var $this yii\web\View */

$this->title = 'Available Languages';
?>
<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>Langues</h1>
<ul>
<?php foreach ($languages as $lan): ?>
    <li>
        <?= Html::encode("{$lan->code} ") ?>:
        <?= $lan->name ?>
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>


<div>
    <h2>Ajout d'une langue</h2>
    <button class="btn btn-primary">Ajouter</button>
</div>
