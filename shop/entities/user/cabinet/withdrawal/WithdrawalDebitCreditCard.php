<?php
namespace shop\entities\user\cabinet\withdrawal;


use shop\entities\user\User;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property integer $user_account
 * @property integer $card_number
 * @property string $card_holder
 * @property integer $expire
 * @property float $amount
 * @property integer $created_at
 * @property integer $status
 *
 * @property User $user
 */


class WithdrawalDebitCreditCard extends ActiveRecord
{
    public static function create($userId, $firstName, $lastName, $phone, $email, $address, $userAccount, $cardNumber, $cardHolder, $expire, $amount, $createdAt): self
    {
        $obj = new static();
        $obj->user_id = $userId;
        $obj->first_name = $firstName;
        $obj->last_name = $lastName;
        $obj->phone = $phone;
        $obj->email = $email;
        $obj->address = $address;
        $obj->user_account = $userAccount;
        $obj->card_number = $cardNumber;
        $obj->card_holder= $cardHolder;
        $obj->expire = $expire;
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
        return '{{%user_withdrawals_debit_credit_card}}';
    }


}
