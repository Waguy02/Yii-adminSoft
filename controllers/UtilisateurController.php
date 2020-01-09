<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Utilisateur;

class UtilisateurController extends Controller
{
    public function actionIndex()
    {
        $query = Utilisateur::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $users = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'users' => $users,
            'pagination' => $pagination,
        ]);
    }
}