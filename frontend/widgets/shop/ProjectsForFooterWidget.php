<?php

namespace frontend\widgets\shop;


use shop\readModels\shop\ProjectReadRepository;
use yii\base\Widget;

class ProjectsForFooterWidget extends Widget
{
    public $limit;

    private $repository;

    public function __construct(ProjectReadRepository $repository, $config = [])
    {
        parent::__construct($config);
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->render('projects-footer', [
            'projects' => $this->repository->getLatestProjectsByLimit($this->limit)
        ]);
    }
}