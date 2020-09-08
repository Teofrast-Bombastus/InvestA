<?php

namespace shop\entities\user\cabinet;

use shop\entities\user\User;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yiidreamteam\upload\FileUploadBehavior;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $file
 * @property boolean $verified
 *
 * @mixin FileUploadBehavior
 */

class UserDocument extends ActiveRecord
{
    public static function create(int $userId, UploadedFile $file): self
    {
        $object = new static();
        $object->user_id = $userId;
        $object->file = $file;
        $object->verified = false;
        return $object;
    }


    public function isIdEqualTo($id): bool
    {
        return $this->id == $id;
    }


    public function verify()
    {
        if ($this->verified){
            throw new \DomainException('Документ уже верифицирован');
        }
        return $this->verified = true;
    }


    public function unVerify()
    {

        if (!$this->verified){
            throw new \DomainException('У документа уже снята верификация');
        }
        return $this->verified = false;
    }


    ##########################


    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }


    public static function tableName(): string
    {
        return '{{%user_documents}}';
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => FileUploadBehavior::class,
                'attribute' => 'file',
                'filePath' => '@staticRoot/origin/user/[[attribute_user_id]]/documents/[[id]].[[extension]]',
                'fileUrl' => '@static/origin/user/[[attribute_user_id]]/documents/[[id]].[[extension]]',
            ],
        ];
    }

}