<?php
namespace shop\entities\user\cabinet;

use shop\entities\user\User;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $recipient
 * @property string $payment_method
 * @property string $description
 * @property float $amount
 * @property float $subtotal
 * @property float $tax
 * @property float $total
 * @property integer $created_at
 * @property integer $status
 *
 * @property User $user
 */

class Order extends ActiveRecord
{

    const STATUS_NEW =          1;
    const STATUS_PAID =         2;
    const STATUS_FAILED =       3;
    const STATUS_COMPLETED =    4;

    const RECIPIENT = 'Invest aktiv Investment Group';
    const PAYMENT_METHOD = 'онлайн';
    const DESCRIPTION = 'Payment by invoice #';

    public static function create($userId, $firstName, $lastName, $phone, $recipient, $payment_method, $description, $amount, $subtotal, $tax, $total, $created_at): self
    {
        $obj = new static();
        $obj->user_id = $userId;
        $obj->first_name = $firstName;
        $obj->last_name = $lastName;
        $obj->phone = $phone;
        $obj->recipient = $recipient;
        $obj->payment_method = $payment_method;
        $obj->description = $description;
        $obj->amount = $amount;
        $obj->subtotal = $subtotal;
        $obj->tax = $tax;
        $obj->total = $total;
        $obj->created_at = $created_at;
        $obj->status = self::STATUS_NEW;
        return $obj;
    }

    public function getDescription(): string
    {
        return $this->description . $this->id;
    }

    public function getFullName(): string
    {
        return $this->first_name .' '. $this->last_name;
    }


    public function isIdEqualTo($id): bool
    {
        return $this->id == $id;
    }

    public function isNew(): bool
    {
        return $this->status == self::STATUS_NEW;
    }

    public function isPaid(): bool
    {
        return $this->status == self::STATUS_PAID;
    }

    public function isFailed(): bool
    {
        return $this->status == self::STATUS_FAILED;
    }

    public function isCompleted(): bool
    {
        return $this->status == self::STATUS_COMPLETED;
    }


    public function paid(): void
    {
        if ($this->isPaid()) {
            throw new \DomainException('Заказ уже оплачен');
        }
        $this->addStatus(self::STATUS_PAID);
    }


    public function fail(): void
    {
        if ($this->isFailed()) {
            throw new \DomainException('Заказ уже отменен');
        }
        $this->addStatus(self::STATUS_FAILED);
    }


    public function completed(): void
    {
        if ($this->isCompleted()) {
            throw new \DomainException('Заказ уже завершен');
        }
        $this->addStatus(self::STATUS_COMPLETED);
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
        return '{{%user_orders}}';
    }


}
