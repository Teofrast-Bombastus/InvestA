<?php

namespace backend\forms\user;

use shop\entities\user\cabinet\UserCredit;
use shop\entities\user\cabinet\withdrawal\Status;
use shop\entities\user\UserResidentPay;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class ResidentSearch extends Model
{
    public $status;
    public $date_from;
    public $date_to;
    public $first_name;
    public $last_name;
    public $username;
    public $price;

    public function rules()
    {
        return [
            [['status', 'price'], 'integer'],
            [['first_name', 'last_name', 'username'], 'string'],
            [['date_from', 'date_to'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }

    public function search($params)
    {
        $query = UserResidentPay::find()->alias('w')
            ->innerJoinWith(['user'])
            ->orderBy('created_at DESC');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere([
            'w.status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'users.first_name', $this->first_name])
            ->andFilterWhere(['price' => $this->price])
            ->andFilterWhere(['like', 'users.last_name', $this->last_name])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['>=', 'w.created_at', $this->date_from ? strtotime($this->date_from . ' 00:00:00') : null])
            ->andFilterWhere(['<=', 'w.created_at', $this->date_to ? strtotime($this->date_to . ' 23:59:59') : null]);

        return $dataProvider;
    }

    public static function statusList()
    {
        return [
            0 => 'Ожидание',
            1 => 'Успешно',
            2 => 'Отклонено',
        ];
    }

    protected function getStatus()
    {
        if ($this->status == Status::STATUS_WAIT) {
            return 'Ожидание';
        }
        if ($this->status == Status::STATUS_SUCCESS) {
            return 'Успешно';
        }
        if ($this->status == Status::STATUS_REJECTED) {
            return 'Отклонено';
        }
    }

}
