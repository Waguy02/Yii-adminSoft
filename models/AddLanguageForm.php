<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

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
            [['source'], 'file', 'skipOnEmpty' => false, 'extensions' => 'php'],
        ];
    }

    public function upload()
    {
        echo "Je regarde l'upload déjà";
        if ($this->validate()) {
            echo "Je me valide";
            $this->path ='messages';
            $this->filename = \Yii::$app->session['kodeimport'] . '-' . \Yii::$app->user->identity->username . '.' . $this->source->extension;
            $this->source->saveAs($this->path . DIRECTORY_SEPARATOR . $this->filename);
         //   $this->source->saveAs('messages/'.$this->code.'/'. $this->source->baseName . '.' . $this->source->extension);
            return true;
        } else {
            return false;
        }
    }
    
    /*public function upload()
    {
        if ($this->validate()) {
            // backend/web/files
            $this->path ='web/files';
            $this->filename = Yii::$app->session['kodeimport'] . '-' . Yii::$app->user->identity->username . '.' . $this->excelFile->extension;
            $this->excelFile->saveAs($this->path . DIRECTORY_SEPARATOR . $this->filename);
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
