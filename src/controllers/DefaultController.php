<?php

namespace mirocow\eav\controllers;

use Yii;
use yii\web\Controller;

/**
 * AttributeController implements the CRUD actions for EavAttribute model.
 */
class DefaultController extends Controller
{

    /**
     * Lists all EavAttribute models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}