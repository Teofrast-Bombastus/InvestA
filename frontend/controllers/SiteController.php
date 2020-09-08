<?php
namespace frontend\controllers;


use shop\readModels\shop\LicencePhotoReadRepository;
use shop\readModels\shop\RegulationReadRepository;
use shop\forms\shop\AskQuestionForm;
use shop\useCases\shop\EmailService;
use Yii;


class SiteController extends AppController {


    private $regulations;
    private $licencePhotos;
    private $emailService;

    public function __construct(
        $id,
        $module,
        RegulationReadRepository $regulations,
        LicencePhotoReadRepository $licencePhotos,
        EmailService $emailService,
        $config = []
    )
    {
        parent::__construct($id, $module, $config);
        $this->regulations = $regulations;
        $this->licencePhotos = $licencePhotos;
        $this->emailService = $emailService;
    }



    public function actions(){
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



    public function actionIndex()
    {
        $regulations = $this->regulations->getRegulationsForIndex();
        $licencePhotos = $this->licencePhotos->getLicencePhotosForIndex();
        $form = new AskQuestionForm();

        return $this->render('index', [
            'regulations' => $regulations,
            'licencePhotos' => $licencePhotos,
            'askQuestionForm' => $form,
        ]);
    }



    public function actionSendQuestion()
    {
        $form = new AskQuestionForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->emailService->sendQuestion($form);
                Yii::$app->session->setFlash('success', 'Заявка успешно отправлена');
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->redirect(['index']);
    }


}
