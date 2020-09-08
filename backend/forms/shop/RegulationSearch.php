<?php

namespace backend\forms\shop;


use shop\entities\shop\Regulation;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class RegulationSearch extends Model
{
    public $title;


    public function rules(): array
    {
        return [
            [['title'], 'string'],
        ];
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search(array $params): ActiveDataProvider
    {
        $query = Regulation::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC]
            ],
            'pagination' => [
                'pageSize' => 50,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'title', $this->title]);
        return $dataProvider;
    }

}
