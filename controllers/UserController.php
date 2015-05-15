<?php

namespace app\controllers;
use Yii;
class UserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        
        return $this->render('index');
    }
    public function actionChangepassword()
    {
        $model = new \app\models\PasswordChangeForm();
        
        if ($model->load(Yii::$app->request->post()) && $model->changePassword()) 
        {
            \Yii::$app->session->setFlash('success', 'Password successfully changed');
            return $this->refresh();
        }
        
        return $this->render('passwordchange',['model' => $model]);
    }
}
