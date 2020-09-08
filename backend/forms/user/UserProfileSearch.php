<?php

namespace backend\forms\user;

use shop\entities\user\cabinet\UserProfile;
use shop\helpers\UserHelper;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * UserSearch represents the model behind the search form of `shop\entities\user\User`.
 */
class UserProfileSearch extends Model
{
    public $status;
    public $date_from;
    public $date_to;
    public $first_name;
    public $last_name;
    public $father_name;
    public $username;



    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['first_name', 'last_name', 'father_name', 'username'], 'string'],
            [['date_from', 'date_to'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }



    public function search($params)
    {
        $query = UserProfile::find()->joinWith(['user']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere([
            'user_profiles.status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'user_profiles.first_name', $this->first_name])
            ->andFilterWhere(['like', 'user_profiles.last_name', $this->last_name])
            ->andFilterWhere(['like', 'user_profiles.father_name', $this->father_name])
            ->andFilterWhere(['like', 'users.username', $this->username])
            ->andFilterWhere(['>=', 'user_profiles.created_at', $this->date_from ? strtotime($this->date_from . ' 00:00:00') : null])
            ->andFilterWhere(['<=', 'user_profiles.created_at', $this->date_to ? strtotime($this->date_to . ' 23:59:59') : null]);

        return $dataProvider;
    }


    public function statusList()
    {
        return UserHelper::userProfileStatusList();
    }

}
