<?php

namespace backend\forms\user;


use shop\entities\user\cabinet\DepoAccount;
use shop\helpers\DepoAccountHelper;
use yii\base\Model;
use yii\data\ActiveDataProvider;


class DepoAccountSearch extends Model
{
    public $status;
    public $type;
    public $date_from;
    public $date_to;
    public $first_name;
    public $last_name;
    public $username;


    public function rules()
    {
        return [
            [['status', 'type'], 'integer'],
            [['first_name', 'last_name', 'username'], 'string'],
            [['date_from', 'date_to'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }



    public function search($params)
    {
        $query = DepoAccount::find()->alias('d')->innerJoinWith(['user']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere([
            'd.status' => $this->status,
            'd.type' => $this->type,
        ]);

        $query->andFilterWhere(['like', 'd.first_name', $this->first_name])
            ->andFilterWhere(['like', 'd.last_name', $this->last_name])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['>=', 'd.created_at', $this->date_from ? strtotime($this->date_from . ' 00:00:00') : null])
            ->andFilterWhere(['<=', 'd.created_at', $this->date_to ? strtotime($this->date_to . ' 23:59:59') : null]);

        return $dataProvider;
    }



    public function statusList()
    {
        return DepoAccountHelper::statusList();
    }


    public function typeList()
    {
        return DepoAccountHelper::typeList();
    }

}
