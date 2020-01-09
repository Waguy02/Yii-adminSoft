
<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>Countries</h1>
<ul>
<?php foreach ($countries as $lan): ?>
    <li>
        <?= Html::encode("{$lan->code} ({$lan->name})") ?>:
        <?= $lan->population ?>
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>

