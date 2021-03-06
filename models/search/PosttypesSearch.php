<?php

namespace porcelanosa\posts\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use porcelanosa\posts\models\Posttypes;

/**
 * PosttypesSearch represents the model behind the search form about `porcelanosa\posts\models\Posttypes`.
 */
class PosttypesSearch extends Posttypes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sort', 'active'], 'integer'],
            [['slug', 'name', 'title', 'meta_descr'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
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
        $query = Posttypes::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'sort' => $this->sort,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'meta_descr', $this->meta_descr]);

        return $dataProvider;
    }
}
