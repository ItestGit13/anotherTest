<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\posts;
use app\models\lists;
use yii\data\Pagination;


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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */

    public function actionIndex()
    {
    $list = lists::find()->all();
    //preparing the query
   $query = lists::find();
   // get the total number of users
   $count = $query->count();
   //creating the pagination object
   $pagination = new Pagination(['totalCount' => $count, 'defaultPageSize' => 3]);
   //limit the query using the pagination and retrieve the users
   $models = $query->offset($pagination->offset)
      ->limit($pagination->limit)
      ->all();
   return $this->render('crud', [
      'models' => $models,
      'pagination' => $pagination,
      'list'=>$models,
    //   'list'=> $list
   ]);
    }

    public function actionView($id){
        $lists = lists::findOne($id);
        return $this->render('view', ['lists'=>$lists]);
    }
    public function actionUpdate($id){
        $lists = lists::findOne($id);
        $formData = yii::$app->request->post();
        if($lists->load($formData))
        {
            if($lists->save())
            {
                yii::$app->getSession()->setFlash('message', 'Post Updated Successfully');
                return $this->redirect(['index']);
            }
            else{
                yii::$app->getSession()->setFlash('message', 'oops! Error ');
            }
        }
        return $this->render('update',['lists'=>$lists]);
    }
    public function actionDelete($id){
        $lists = lists::findOne($id)->delete();
        if($lists)
        {
            yii::$app->getSession()->setFlash('message','Record Deleted Successfully');
            return $this->redirect(['index']);
        }
        return $this->render('delete',['lists'=>$lists]);
    }

    public function actionCreate_list()
    {
        $lists = new lists();
        $formData = yii::$app->request->post();
        if($lists->load($formData))
        {
            if($lists->Save())
            {
                yii::$app->getSession()->setFlash('message','List Created Successfully');
                return $this->redirect(['index']);
            }
            else{
                yii::$app->getSession()->setFlash('message','Oops! Error Occured');
            }
        }
        return $this->render('create_list',['lists'=>$lists]);
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
}
