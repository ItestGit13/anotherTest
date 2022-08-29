<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\lists;

/**
 * CurrencySearch represents the model behind the search form of `frontend\models\Currency`.
 */
class CurrencySearch extends Currency
{
    // global search field on index page
    public $globalSearch;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id'], 'integer'],
            [['title', 'description', 'category', 'globalSearch'], 'safe'],
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = lists::find()->where(['id'=>Yii::$app->user->id]);

        // add conditions that should always apply below

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['name' => SORT_ASC]] 
        ]);

        $this->load($params);

        if (!$this->validate()) {
            
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,         
            'id' => $this->id,
        ]);
    
        // this conditions are the fields you want the users search in the serach box
        $query->andFilterWhere([
            'or',
            ['like', 'title' , $this->globalSearch],
            ['like', 'description' , $this->globalSearch],
            ['like', 'category', $this->globalSearch],
        ]);         

        return $dataProvider;
    }

}