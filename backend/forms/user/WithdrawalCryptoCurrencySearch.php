<?php

namespace backend\forms\user;


use shop\entities\user\cabinet\withdrawal\WithdrawalCryptoCurrency;
use shop\helpers\WithdrawalHelper;
use yii\base\Model;
use yii\data\ActiveDataProvider;


class WithdrawalCryptoCurrencySearch extends Model
{
    public $status;
    public $date_from;
    public $date_to;
    public $address;
    public $username;


    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['address', 'username'], 'string'],
            [['date_from', 'date_to'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }



    public function search($params)
    {
        $query = WithdrawalCryptoCurrency::find()->alias('w')->innerJoinWith(['user']);

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

        $query->andFilterWhere(['like', 'w.address', $this->address])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['>=', 'w.created_at', $this->date_from ? strtotime($this->date_from . ' 00:00:00') : null])
            ->andFilterWhere(['<=', 'w.created_at', $this->date_to ? strtotime($this->date_to . ' 23:59:59') : null]);

        return $dataProvider;
    }



    public function statusList()
    {
        return WithdrawalHelper::statusList();
    }


}
