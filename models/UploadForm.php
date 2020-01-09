<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $filename;
    public $path;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {


             // $this->path ='web/files';
             $this->path =\Yii::$app->basePath.'/messages/test/';
             FileHelper::createDirectory($this->path);
 
             $this->filename = $this->imageFile->baseName . '.' . $this->imageFile->extension;
             $this->imageFile->saveAs($this->path . $this->filename);
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