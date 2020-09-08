<?php
namespace shop\entities\user\cabinet\withdrawal;

use shop\entities\user\User;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $address
 * @property integer $user_account
 * @property float $amount
 * @property integer $created_at
 * @property integer $status
 *
 * @property User $user
 */


class WithdrawalEPayment extends ActiveRecord
{
    public static function create($userId, $address, $userAccount, $amount, $createdAt): self
    {
        $obj = new static();
        $obj->user_id = $userId;
        $obj->address = $address;
        $obj->user_account = $userAccount;
        $obj->amount = $amount;
        $obj->created_at = $createdAt;
        $obj->status = Status::STATUS_WAIT;
        return $obj;
    }


    public function isIdEqualTo($id): bool
    {
        return $this->id == $id;
    }

    public function isSuccess(): bool
    {
        return $this->status == Status::STATUS_SUCCESS;
    }

    public function isRejected(): bool
    {
        return $this->status == Status::STATUS_REJECTED;
    }


    public function success(): void
    {
        if ($this->isSuccess()) {
            throw new \DomainException('Заявка на вывод средств имеет статус успешный');
        }
        if ($this->isRejected()) {
            throw new \DomainException('Невозможно изменить статус');
        }
        $this->addStatus(Status::STATUS_SUCCESS);
    }


    public function reject(): void
    {
        if ($this->isRejected()) {
            throw new \DomainException('Заявка на вывод средств статус отмененый');
        }
        if ($this->isSuccess()) {
            throw new \DomainException('Невозможно изменить статус');
        }
        $this->addStatus(Status::STATUS_REJECTED);
    }


    public function addStatus($status): void
    {
        $this->status = $status;
    }


    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }


    public static function tableName()
    {
        return '{{%user_withdrawals_e_payment}}';
    }


}
