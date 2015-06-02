<?php

namespace app\controllers;

use Yii;
use app\models\AccountSignupTransaction;
use app\models\AccountchSignupTransactionSear;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransactionController implements the CRUD actions for AccountSignupTransaction model.
 */
class TransactionController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all AccountSignupTransaction models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AccountchSignupTransactionSear();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AccountSignupTransaction model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AccountSignupTransaction model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AccountSignupTransaction();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            include \Yii::getAlias('@app').'/components/mpower.php';
            

            ## Create your Checkout Invoice

                $co = new \MPower_Checkout_Invoice();

            ## Create your Onsite Payment Request Invoice

//            Params for addItem function `addItem(name_of_item,quantity,unit_price,total_price,optional_description)`
                $package = \app\models\AccountPackage::findOne($model->package_id);
                $co->addItem($package->package_name,1,999.99,999.99);

            ## Set the total amount to be charged ! Important

                $co->setTotalAmount(1200.99);
                

                $co->setDescription("This is good for packaged pricing tables on your website.");
                
            ## Redirect URL
                $co->setReturnUrl(Yii::$app->urlManager->createAbsoluteUrl(['transaction/validatetransaction']));
                
                $co->addCustomData("firstName",$model->first_name.' '.$model->last_name);
                $co->addCustomData("Email",$model->email);
                $co->addCustomData("Domain",$model->domain);
                if($co->create()) 
                {
                  return $this->redirect($co->getInvoiceUrl());
                }
                else
                {
                  echo $co->response_text;
                }
                
        } else {
            print_r($model->getErrors());
            //die();
            return $this->render('create',['model' => $model]);
            
        }
    }

    /**
     * Updates an existing AccountSignupTransaction model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AccountSignupTransaction model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AccountSignupTransaction model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AccountSignupTransaction the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AccountSignupTransaction::findOne($id)) !== null) 
        {
            return $model;
        } 
        else 
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionValidatetransaction($token)
    {
        include Yii::getAlias('@app').'/components/mpower.php';
        
        $invoice = new \MPower_Checkout_Invoice();

        if ($invoice->confirm($token)) 
        {
            
            if($invoice->getStatus() == 'completed')
            {
                $record = AccountSignupTransaction::findOne(['domain' => $invoice->getCustomData('Domain')]);
                $record->scenario = 'auto';
                ## add transaction ID and other data
                $record->transaction_id = $token;
                $record->payment_date = (new \yii\db\Expression('now()'));
                $record->payment_status = 'paid';
                $record->amount_paid = $invoice->getTotalAmount();
                $record->update();
                
                ## Create Domain
                $domain = new \app\models\Domain();
                $domain->domain = $record->domain;
                $domain->created = new \yii\db\Expression('now()');
                $domain->save();
                
                ## Create Account
                $account = new \app\models\Account();
                $account->domain = $record->domain;
                $account->package_id = $record->package_id;
                $account->name = $record->account_name;
                $account->date_added = new \yii\db\Expression('now()');
                $account->status = '1';
                $account->save();
                
                ## Subscribe Account to package
                $subs = new \app\models\AccountSubscription();
                $subs->account_id = $account->id;
                $subs->package_id = $account->package_id;
                $subs->duration = Yii::$app->params['signupDuration'];
                $subs->subscription_date = new \yii\db\Expression('now()');
                $subs->expiry_date = new \yii\db\Expression('DATE_ADD(now(),INTERVAL :interval MONTH)',['interval'=>Yii::$app->params['signupDuration']]);
                $subs->save();
                
                ## Create Account User
                $password = Yii::$app->security->generateRandomString(10);
                $user = new \app\models\AccountUsers();
                $user->first_name = $record->first_name;
                $user->last_name = $record->last_name;
                $user->email = $record->email;
                $user->account_id = $account->id;
                $user->username = $record->email;
                $user->password = $password;
                $user->save();
                
                ## Send confirmation email with password
                Yii::$app->mailer->compose('signupConfirm',[
                            'first_name' => $user->first_name, 
                            'email' => $user->email, 
                            'password' => $password,
                            
                            ])
                        ->setTo($user->email)
                        ->setSubject('Welcome to Softcube mail')
                        ->setFrom(\Yii::$app->params['fromEmail'])
                        ->send();
            return $this->render('confirm');
                
            }
        }

    }
    
    public function actionTest($token)
    {
        echo Yii::$app->request->getSrverName();
    }
}
