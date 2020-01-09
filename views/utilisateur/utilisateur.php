<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>Utilisateurs</h1>
<ul>
<?php foreach ($users as $utilisateur): ?>
    <li>
        <?= Html::encode("{$utilisateur->number} ({$utilisateur->name}) ({$utilisateur->email})") ?>:
        
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>