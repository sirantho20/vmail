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
            
            ## Customer will be redirected back to this URL when he cancels the checkout on MPower website

            ## MPower_Checkout_Store::setCancelUrl(CHECKOUT_CANCEL_URL);

//            MPower will automatically redirect customer to this URL after successfull payment.
//            This setup is optional and highly recommended you dont set it, unless you want to customize the payment experience of your customers.
//            When a returnURL is not set, MPower will redirect the customer to the receipt page.

//                MPower_Checkout_Store::setReturnUrl(CHECKOUT_RETURN_URL);

            ## Create your Checkout Invoice

                $co = new MPower_Checkout_Invoice();

            ## Create your Onsite Payment Request Invoice

//            Params for addItem function `addItem(name_of_item,quantity,unit_price,total_price,optional_description)`

                $co->addItem("13' Apple Retina 500 HDD",1,999.99,999.99);
                $co->addItem("Case Logic laptop Bag",2,100.50,201,"Black Color with white stripes");
                $co->addItem("Mordecai's Bag",2,100.50,400);

            ## Set the total amount to be charged ! Important

                $co->setTotalAmount(1200.99);

            ## Optionally set an invoice description

                $co->setDescription("This is good for packaged pricing tables on your website.");

            ## Setup Tax Information (Optional)

                #$co->addTax("VAT (15)",50);
                #$co->addTax("NHIL (10)",50);

            ## You can add custom data to your invoice which can be called back later

//                $co->addCustomData("Firstname","Alfred");
//                $co->addCustomData("Lastname","Rowe");
//                $co->addCustomData("CartId",929292872);

            ## Redirecting to your checkout invoice page

                if($co->create()) {
                   header("Location: ".$co->getInvoiceUrl());
                }else{
                  echo $co->response_text;
                }
            
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->goHome();
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
        if (($model = AccountSignupTransaction::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
