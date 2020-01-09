<?php

namespace app\models;

use yii\base\Model;


class EntryUserForm extends Model
{
    public $number;
    public $name;
    public $email;

    public function rules()
    {
        return [
            [['number','name', 'email'], 'required'],
            ['email', 'email'],
        ];
    }
}