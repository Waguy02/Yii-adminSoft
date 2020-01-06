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
        print("Hye");
        
        $model = new AddLanguageForm();
        //$model->source = UploadedFile::getInstance($model, 'source');
        
        echo"IL revient déjà";
        if ($model->load(Yii::$app->request->post())) {
            //$model->upload();
            $model->source = UploadedFile::getInstance($model, 'source');
            if ($model->upload()) {
                // le fichier a été chargé avec succès sur le serveur
                echo "Le fichier a été uploadé hein";
            }
            if ($model->validate()) {
                // form inputs are valid, do something here
                print("Hiie");
                echo "Je suis entré dans le formulaire";
                return $this->render('index');
            }
        }

        return $this->render('add-language', [
            'model' => $model,
        ]);
    }

    public function actionUpload()
    {
        $model = new AddLanguageForm();

        if (Yii::$app->request->isPost) {
            $model->source = UploadedFile::getInstance($model, 'source');
            if ($model->upload()) {
                // le fichier a été chargé avec succès sur le serveur
                echo "Le fichier a été uploadé hein";
                return;
            }
        }

        return $this->render('add-language', ['model' => $model]);
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
