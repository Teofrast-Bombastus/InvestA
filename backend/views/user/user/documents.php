<?php

use shop\entities\user\cabinet\UserDocument;
use shop\helpers\UserHelper;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $user shop\entities\user\User */

$this->title = 'Документы пользователя: ' . $user->first_name . ' ' . $user->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Верификация пользователей', 'url' => ['verify-index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-view">
    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => new ArrayDataProvider([
                    'allModels' => $user->documents
                ]),
                'columns' => [
                    [
                        'label' => 'Файл',
                        'attribute' => 'file',
                        'value' => function (UserDocument $document){
                            return Html::a($document->file, $document->getUploadedFileUrl('file'), ['target' => '_blank']);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Статус',
                        'attribute' => 'verified',
                        'value' => function (UserDocument $document) {
                            return UserHelper::verificationDocumentLabel($document->verified);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Действие',
                        'value' => function (UserDocument $document) {

                            if (!$document->verified){
                                return  Html::a('Верифицировать', Url::to(['verify-document', 'user_id' => $document->user_id, 'id' => $document->id]), [
                                    'class' => 'btn btn-success',
                                    'data' => [
                                        'method' => 'post',
                                    ],
                                ]);
                            }

                            return  Html::a('Снять верификацию', Url::to(['un-verify-document', 'user_id' => $document->user_id, 'id' => $document->id]), [
                                'class' => 'btn btn-primary',
                                'data' => [
                                    'method' => 'post',
                                ],
                            ]);

                        },
                        'format' => 'raw', //отключить фильтрацию через html encode
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
