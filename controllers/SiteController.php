<?php

namespace app\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use app\models\Utilisateur;
use app\models\EntryUserForm;
use app\components\User;
use app\components\InsertBehavior;
use app\models\Test;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\web\Cookie;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'page' => [
                'class' => \yii\web\ViewAction::className(),
                'viewPrefix' => 'pages/' . \Yii::$app->language
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new Test();

        echo "Le debut";

        if ($model->load(Yii::$app->request->post())) {
            //$model->upload();
            Yii::debug("Hey hoooo");
            echo "Hey";
        }
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionDire($message = 'Hello')
    {
        return $this->render('dire', ['message' => $message]);
    }

    public function actionEntry()
    {
        $model = new EntryForm;

        Yii::$app->mailer->compose()
            ->setFrom('eboukybrown@gmail.com')
            ->setTo('eboukybrown@gmail.com')
            ->setSubject('Message subject')
            ->setTextBody('Plain text content')
            ->setHtmlBody('<b>HTML content</b>')
            ->send();
        // event handling logic

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            return $this->render('entry', ['model' => $model]);
        }
    }

    public function actionUser()
    {
        $model = new EntryUserForm;

        $utilisateur = new Utilisateur;
        $utilisateur->attachBehavior('InsertBehavior', new InsertBehavior);

        /*$user = new User;
        $user->on(User::VALID_DATA, function ($event) {
            /*Yii::$app->db->createCommand('INSERT INTO `Utilisateur` VALUES (:number, :name, :email)', [
                ':number' => $event->number, ':name' => $event->name,':email'=>$event->email,
            ])->execute();
            echo 'Allo';

        });*/


        // event handling logic

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // print_r($model->name);

            $utilisateur->number = $model->number;
            $utilisateur->name = $model->name;
            $utilisateur->email = $model->email;
            $utilisateur->save();
            //$utilisateur->trigger('beforeValidate');
            //$user.valid($model->number, $model->name, $model->email);

            //$this->render('Utilisateur', ['model' => $model]);
            return $this->render('user-confirm', ['model' => $model]);
        } else {
            return $this->render('user', ['model' => $model]);
        }
    }

    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                Yii::$app->session->setFlash('success', 'You have successfully uploaded file');
                // le fichier a été chargé avec succès sur le serveur
                return;
            }
            Yii::$app->session->setFlash('success', 'You have successfully uploaded file');
        }
        return $this->render('upload', ['model' => $model]);
    }

    public function actionChange()
    {

        echo "Je suis là";
        Yii::$app->language = 'en';
        echo "Je suis là encore ";
        echo Yii::$app->language;
        $this->render('index');
    }

    /*public function actionLanguage() {
        $language = Yii::$app->request->post('language');
        Yii::$app->language = $language;
        echo "Helloooooo";
        $languageCookie = new Cookie([
            'name' => 'language',
            'value' => $language,
            'expire' => time() + 60 * 60 * 24 * 30, // 30 days
        ]);
        Yii::$app->response->cookies->add($languageCookie);
    
        $localeCookie = new yii\web\Cookie([
            'name' => 'locale',
            'value' => Yii::$app->params['formattedLanguages'][$language]['locale'],
            'expire' => time() + 60 * 60 * 24 * 30, // 30 days
        ]);
        Yii::$app->response->cookies->add($localeCookie);
    
       /* $calendarCookie = new yii\web\Cookie([
            'name' => 'calendar',
            'value' => Yii::$app->params['formattedLanguages'][$language]['calendar'],
            'expire' => time() + 60 * 60 * 24 * 30, // 30 days
        ]); 
        Yii::$app->response->cookies->add($calendarCookie); *
    } */

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
    }

    public function actionTestMailer() {
        \app\models\User::findByUsername('admin')->sendMail('example', 'Email example', ['paramExample' => '123']);
    }
}
