<?php

namespace app\controllers;

use Yii;
use app\models\Mailbox;
use app\models\MailboxSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

/**
 * MailboxController implements the CRUD actions for Mailbox model.
 */
class MailboxController extends Controller
{
    public function behaviors()
    {
                return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Mailbox models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MailboxSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mailbox model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Mailbox model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $allowed = \app\models\Account::findOne(\Yii::$app->user->identity->account_id)->package->emails_allowed;
        $created = Mailbox::find()->where(['domain' => \app\models\Account::findOne(\Yii::$app->user->identity->account_id)->domain])->count();
        
        // Validate mailbox limits
        if($created + 1 > $allowed)
        {
            \Yii::$app->session->addFlash('warning', 'You have reached the limit for allowed mailboxes. Please upgrade your account to be able to create new mailboxes');
            return $this->redirect(['index']);
        }
        
        $model = new Mailbox();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->username]);
        } else {
            print_r($model->getErrors());
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Mailbox model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->username]);
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Mailbox model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Mailbox model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Mailbox the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mailbox::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionResetpassword($mailbox)
    {
        $pass = Yii::$app->security->generateRandomString(8);
        
        $user = Mailbox::findOne(['username' => $mailbox]);
        //$user->password = shell_exec('openssl passwd -1 '.$pass);
        $user->password = shell_exec('doveadm pw -s \'ssha512\' -p '.$pass);
        if($user->update())
        {
            Yii::$app->session->setFlash('success', 'New password for '.$user->username.' is <strong>'.$pass.'</strong>');
        }
        else 
        {
            Yii::$app->session->setFlash('warning', 'Couldn\'t reset password for '.$user->username);
        }
        
        return $this->redirect('index');
    }
}
