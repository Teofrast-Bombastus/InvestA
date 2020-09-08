<?php

namespace shop\readModels\shop;



use shop\entities\shop\LicencePhoto;

class LicencePhotoReadRepository
{


    public function getLicencePhotosForIndex()
    {
        return LicencePhoto::find()->where(['=', 'show_in_index', true])->orderBy(['id' => SORT_DESC])->all();
    }


    public function getLicencePhotos()
    {
        return LicencePhoto::find()->orderBy(['id' => SORT_DESC])->all();
    }

}