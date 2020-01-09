<?php
namespace app\components;

use yii\db\ActiveRecord;
use yii\base\Behavior;
use yii\helpers\Html;

class InsertBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
        ];
    }

    public function beforeValidate($event)
    {
        echo "Utilisateur enregistré";
        Html::encode("Utilisateur enregistré");
    }
}
