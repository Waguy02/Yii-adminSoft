<?php

namespace app\modules\BDManager;

use yii\base\Application;
use yii\base\BootstrapInterface;

/**
 * BdManager1 module definition class
 */
class BDManager extends \yii\base\Module //implements  BootstrapInterface
{
    /**
     * {@inheritdoc}
     */


    public $controllerNamespace = 'app\modules\bdManager\controllers';

    public static $dbConfig=[];
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }


    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        // TODO: Implement bootstrap() method.


        $this->load();
    }

    public static function load(){

    }


    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */


    public function save()
    {





    }
}
