<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AccountPackage;

/**
 * AccountPackageSearch represents the model behind the search form about `app\models\AccountPackage`.
 */
class AccountPackageSearch extends AccountPackage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'emails_allowed', 'quota_allowed', 'status'], 'integer'],
            [['package_name', 'next_due_date'], 'safe'],
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
        $query = AccountPackage::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'emails_allowed' => $this->emails_allowed,
            'quota_allowed' => $this->quota_allowed,
            'next_due_date' => $this->next_due_date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'package_name', $this->package_name]);

        return $dataProvider;
    }
}
