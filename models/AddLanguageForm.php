<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

class AddLanguageForm extends Model
{
    public $filename;
    public $path;
    public $code;
    public $nom;
    /**
     * @var UploadedFile
     */
    public $source;

    public function rules()
    {
        
        return [
            [['code', 'nom', 'source'], 'required'],
           // [['source'], 'file', 'skipOnEmpty' => false, 'extensions' => 'php, jpg'],
        ];
    }

    public function upload()
    {

        if ($this->validate()) {

            $this->path =\Yii::$app->basePath.'/messages/'.$this->code.'/';
            FileHelper::createDirectory($this->path);

            $this->filename = $this->source->baseName . '.' . $this->source->extension;
            $this->source->saveAs($this->path . $this->filename);
            //$this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);

           return true;
       } else {
           return false;
       }

    }
    
   
   /**
     * 
     * @return string
     */
    public function getFullPath()
    {
        return $this->path. DIRECTORY_SEPARATOR. $this->filename;
    }
}
