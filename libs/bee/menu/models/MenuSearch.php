<?php

namespace bee\menu\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use bee\menu\models\Menu;

/**
 * MenuSearch represents the model behind the search form about `bee\menu\models\Menu`.
 */
class MenuSearch extends Menu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_id', 'extension_id', 'menutype_id', 'menutype_is_published', 'menutype_is_removable', 'parent_id', 'ext_is_published', 'component_is_published', 'is_home', 'is_menu_displayed', 'is_published', 'ordering', 'lft', 'rgt'], 'integer'],
            [['zone_code', 'menutype_name', 'menutype_params', 'title', 'subtitle', 'alias', 'component_path', 'query_params', 'link', 'image', 'params', 'zone_name', 'component_name', 'controller_name', 'action_name', 'ext_params'], 'safe'],
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
        $query = Menu::find();

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
            'menu_id' => $this->menu_id,
            'extension_id' => $this->extension_id,
            'menutype_id' => $this->menutype_id,
            'menutype_is_published' => $this->menutype_is_published,
            'menutype_is_removable' => $this->menutype_is_removable,
            'parent_id' => $this->parent_id,
            'ext_is_published' => $this->ext_is_published,
            'component_is_published' => $this->component_is_published,
            'is_home' => $this->is_home,
            'is_menu_displayed' => $this->is_menu_displayed,
            'is_published' => $this->is_published,
            'ordering' => $this->ordering,
            'lft' => $this->lft,
            'rgt' => $this->rgt,
        ]);

        $query->andFilterWhere(['like', 'zone_code', $this->zone_code])
            ->andFilterWhere(['like', 'menutype_name', $this->menutype_name])
            ->andFilterWhere(['like', 'menutype_params', $this->menutype_params])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'subtitle', $this->subtitle])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'component_path', $this->component_path])
            ->andFilterWhere(['like', 'query_params', $this->query_params])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'params', $this->params])
            ->andFilterWhere(['like', 'zone_name', $this->zone_name])
            ->andFilterWhere(['like', 'component_name', $this->component_name])
            ->andFilterWhere(['like', 'controller_name', $this->controller_name])
            ->andFilterWhere(['like', 'action_name', $this->action_name])
            ->andFilterWhere(['like', 'ext_params', $this->ext_params]);

        return $dataProvider;
    }
}
