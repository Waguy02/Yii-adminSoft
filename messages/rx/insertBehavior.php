namespace app\components;

use yii\db\ActiveRecord;
use yii\base\Behavior;

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
        Html::encode("Utilisateur enregistré");
    }
}
