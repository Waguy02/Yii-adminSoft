<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Languages;
use app\models\AddLanguageForm;
use app\models\ChooseLanForm;
use app\widgets\Alert;
use yii\web\UploadedFile;

class LanguesController extends Controller
{
    public function actionIndex()
    {
        $query = Languages::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $languages = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();


        return $this->render('index', [
            'languages' => $languages,
            'pagination' => $pagination,
        ]);
    }



    public function actionAddLanguage()
    {
      
        $lan = new Languages();
        $model = new AddLanguageForm();

        if ($model->load(Yii::$app->request->post())) {
            //$model->upload();
            $model->source = UploadedFile::getInstance($model, 'source');
            if ($model->upload()) {
                // le fichier a été chargé avec succès sur le serveur
                $lan->code = $model->code;
                $lan->name = $model->nom;
                $lan->save();
                
                echo "Le fichier a été uploadé hein";
                return;
            }
        }

        return $this->render('add-language', [
            'model' => $model,
        ]);
    }

    

    public function actionSelectLanguage() {
        $model = new ChooseLanForm();
        echo $model->lan;
        if (Yii::$app->request->isPost) {
            echo "Voici la langue alors";
            echo $model->lan;
           
        }
    }
}
