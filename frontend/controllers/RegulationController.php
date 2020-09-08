<?php
namespace frontend\controllers;

use shop\readModels\shop\LicencePhotoReadRepository;
use shop\readModels\shop\RegulationReadRepository;

class RegulationController extends AppController {


    private $regulations;
    private $licencePhotos;

    public function __construct(
        $id,
        $module,
        RegulationReadRepository $regulations,
        LicencePhotoReadRepository $licencePhotos,
        $config = []
    )
    {
        parent::__construct($id, $module, $config);
        $this->regulations = $regulations;
        $this->licencePhotos = $licencePhotos;
    }




    public function actionIndex()
    {
        $regulations = $this->regulations->getRegulations();
        $licencePhotos = $this->licencePhotos->getLicencePhotos();

        return $this->render('index', [
            'regulations' => $regulations,
            'licencePhotos' => $licencePhotos,
        ]);
    }


}
