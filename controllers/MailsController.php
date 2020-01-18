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
use yii\web\Cookie;

class MailsController extends Controller
{

    public function actionSendMail()
    {
        $model = new \app\models\MailForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }

        return $this->render('send-mail', [
            'model' => $model,
        ]);
    }


   /* public function action()
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



    public function actionSelectLanguage()
    {
        $model = new ChooseLanForm();
        echo $model->lan;
        if (Yii::$app->request->isPost) {
            echo "Voici la langue alors";
            echo $model->lan;
        }
    }
    public function actionLanguage()
    {
        echo "Alllezzz";
        $language = Yii::$app->request->post('language');
        Yii::$app->language = $language;

        $languageCookie = new Cookie([
            'name' => 'language',
            'value' => $language,
            'expire' => time() + 60, // 30 days
        ]);
        Yii::$app->response->cookies->add($languageCookie);
    } */
}
