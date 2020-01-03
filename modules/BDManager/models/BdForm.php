<?php
/**
 * Created by PhpStorm.
 * User: test
 * Date: 02/01/2020
 * Time: 11:24
 */


namespace  app\modules\bdManager\models;
use yii\helpers\Console;
use app\modules\BDManager\BDManager;

class BdForm extends \yii\base\Model
{
/*
'dsn' => 'mysql:host=localhost;dbname=yii2basic',
'username' => 'root',
'password' => '',
'charset' => 'utf8',
*/
    public $dsn;
    public $username;
    public $password;
    public $charset;




    public function __construct(array $config = [])
    {
        parent::__construct($config);


    }

    public function rules()
    {
        return [
            [['dsn','username','password','charset'],'required']
        ];
    }



    public function loadConfig(){



        $this->dsn=\Yii::$app->db->dsn;
        $this->username=\Yii::$app->db->username;
        $this->password=\Yii::$app->db->password;
        $this->charset=\Yii::$app->db->charset;



    }

    public function saveConfig(){
        try{

            $config=[];
            $configFile =  \Yii ::$app->basePath . "\config\DB.INI";

            $config['dsn']=$this->dsn;
            $config['username']=$this->username;
            $config['password']=$this->password;
            $config['charset']=$this->charset;



                file_put_contents($configFile,"");
            foreach ($config as $name => $value) {

                file_put_contents($configFile, "\n" . $name . " = " .'"'.$value.'"',FILE_APPEND);



            }



            return true;

        }
            catch (exception $e){

            return false;
        }


    }


}