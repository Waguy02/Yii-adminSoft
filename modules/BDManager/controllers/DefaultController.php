<?php

namespace app\modules\bdManager\controllers;

use app\modules\bdManager\models\BdForm;
use yii\base\Model;
use yii\base\Object;
use yii\db\Exception;
use yii\web\Controller;

/**
 * Default controller for the `BdManager1` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */


    public function actionIndex()
    {
        $model=new BdForm();



        if($model->load(\Yii::$app->request->post())) if($model->saveConfig()){

            return $this->refresh();
        }

        $model->loadConfig();
        return $this->render('index',['bdForm'=>$model]);
    }


    public function actionTest(){

        try {
            \Yii::$app->db->open();


          return $this->renderPartial('partials\testResult',['result'=>1]);

        }catch (Exception $e){

            return $this->renderPartial('partials\testResult',['result'=>-1,'error'=>$e->getMessage()]);


        }





    }



}
