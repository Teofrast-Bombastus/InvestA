<?php

namespace frontend\controllers\cabinet;

use frontend\controllers\AppController;
use shop\forms\user\ProfileEditForm;
use shop\forms\user\UserDocumentsForm;
use shop\forms\user\UserProfileForm;
use shop\useCases\cabinet\ProfileService;
use Yii;
use shop\entities\User\User;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

class ProfileController extends AppController
{


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ],
        ];
    }




    private $service;
    public $layout = 'cabinet';

    public function __construct($id, $module, ProfileService $service, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
    }


    public function actionEdit()
    {
        $user = $this->findModel(Yii::$app->user->id);
        $form = new ProfileEditForm($user);
        $userProfileForm = new UserProfileForm($user);


        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->edit($user->id, $form);
                Yii::$app->session->setFlash('success', 'Данные успешно изменены');
                return $this->redirect(['edit']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }


        if ($userProfileForm->load(Yii::$app->request->post()) && $userProfileForm->validate()) {

            if ($user->userProfile){
                Yii::$app->session->setFlash('info', 'Анкета уже создана ранее');
                return $this->redirect(['edit']);
            }

            try {
                $this->service->createUserProfile($user->id, $userProfileForm);
                Yii::$app->session->setFlash('success', 'Анкета успешно создана');
                return $this->redirect(['edit']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('edit', [
            'model' => $form,
            'userProfileForm' => $userProfileForm,
            'user' => $user,
        ]);
    }


    public function actionDocuments()
    {
        $user = $this->findModel(Yii::$app->user->id);
        $form = new UserDocumentsForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->addUserDocuments($user->id, $form);
                Yii::$app->session->setFlash('success', 'Файлы успешно загружены');
                return $this->redirect(['documents']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('documents', [
            'model' => $form,
            'user' => $user,
        ]);
    }



    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
