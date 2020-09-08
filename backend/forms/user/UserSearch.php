<?php

namespace backend\forms\user;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use shop\entities\user\User;
use yii\helpers\ArrayHelper;

/**
 * UserSearch represents the model behind the search form of `shop\entities\user\User`.
 */
class UserSearch extends Model
{
    public $status;
    public $verified;
    public $date_from;
    public $date_to;
    public $email;
    public $phone;
    public $username;
    public $first_name;
    public $last_name;
    public $account;
    public $balance;
    public $role;



    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['verified'], 'boolean'],
            [['username', 'first_name', 'last_name', 'phone', 'email', 'role', 'account', 'balance'], 'string'],
            [['date_from', 'date_to'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }



    public function search($params)
    {
        $query = User::find()->alias('u');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 25,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere([
            'u.status' => $this->status,
            'u.verified' => $this->verified,
        ]);

        if (!empty($this->role)) {
            $query->innerJoin('{{%auth_assignments}} a', 'a.user_id = u.id');
            $query->andWhere(['a.item_name' => $this->role]);
        }


        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'account', $this->account])
            ->andFilterWhere(['like', 'balance', $this->balance])
            ->andFilterWhere(['>=', 'u.created_at', $this->date_from ? strtotime($this->date_from . ' 00:00:00') : null])
            ->andFilterWhere(['<=', 'u.created_at', $this->date_to ? strtotime($this->date_to . ' 23:59:59') : null]);

        return $dataProvider;
    }

    public function rolesList(): array
    {
        $array = ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'description');
        return $array;
    }


}
