<?php


namespace app\models;


use Yii;

use yii\base\Model;

use yii\data\ActiveDataProvider;

use app\models\lists;


/**

 * MenuCategoriesSearch represents the model behind the search form about `app\modules\menus\models\MenuCategories`.

 */

class searchList extends lists

{
    public $searchModel;

    public function rules()

    {

        return [

            [['id'], 'integer'],

            [['title', 'description','category'], 'safe'],

        ];

    }


    public function scenarios()

    {

        // bypass scenarios() implementation in the parent class

        return Model::scenarios();

    }


    public function search($params)

    {
        // print_r($params);
        // die();

        $query = lists::find();


        $dataProvider = new ActiveDataProvider([

            'query' => $query,

        ]);


        $this->load($params);

        if(!$this->validate())
        {
            return $dataProvider;
        }


        $query->andFilterWhere([

            'id' => $this->id,

        ]);


        $query->andFilterWhere(['like', 'title', $this->title])

            ->andFilterWhere(['like', 'description', $this->description]);


        return $dataProvider;

    }

}