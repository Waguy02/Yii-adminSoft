<?php

namespace app\models;

use yii\base\Model;

class ChooseLanForm extends Model
{
    
    public $lan;

    public function rules()
    {
        /*return [
            [['code', 'nom', 'source'], 'required'],
            [['source'], 'file', 'skipOnEmpty' => false, 'extensions' => 'php'],
        ];*/
        return [];
    }

    
}
