<?php

namespace shop\readModels\shop;

use shop\entities\shop\aboutUs\AboutUs;

class AboutUsReadRepository
{
    public function getAboutUs(): AboutUs
    {
        return AboutUs::findOne(1);
    }

}