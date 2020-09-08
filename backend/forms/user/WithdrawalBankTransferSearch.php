<?php

namespace backend\forms\user;

use shop\entities\user\cabinet\withdrawal\WithdrawalBankTransfer;
use shop\helpers\WithdrawalHelper;
use yii\base\Model;
use yii\data\ActiveDataProvider;


class WithdrawalBankTransferSearch extends Model
{
    public $status;
    public $date_from;
    public $date_to;
    public $first_name;
    public $last_name;
    public $username;


    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['first_name', 'last_name', 'username'], 'string'],
            [['date_from', 'date_to'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }



    public function search($params)
    {
        $query = WithdrawalBankTransfer::find()->alias('w')->innerJoinWith(['user']);

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

        $query->andFilterWhere(['like', 'w.first_name', $this->first_name])
            ->andFilterWhere(['like', 'w.last_name', $this->last_name])
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
