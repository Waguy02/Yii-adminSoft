<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

class MailForm extends Model
{
    public $subject;
    public $sender;
    public $receiver;
    public $message;
    

    public function rules()
    {
        
        return [
            [['sender', 'receiver',], 'required'],
            ['sender', 'email'],
            ['receiver', 'email'],
            
           
        ];
    }

    
   
}
