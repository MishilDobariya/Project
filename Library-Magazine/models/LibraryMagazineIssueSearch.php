<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LibraryMagazineIssue;

/**
 * LibraryMagazineIssueSearch represents the model behind the search form about `app\models\LibraryMagazineIssue`.
 */
class LibraryMagazineIssueSearch extends LibraryMagazineIssue
{
    /**
     * @inheritdoc
     */
    public  $title;
    public $memberName;
    public function rules()
    {
        return [
            [['Magazine_Issue_Id', 'Magazine_Id', 'Magazine_Person_Id'], 'integer'],
            [['Magazine_Issue_Date', 'Remarks', 'Magazine_Due_Date','title','memberName'], 'safe'],
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
        $query = LibraryMagazineIssue::find();

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
            'Magazine_Issue_Id' => $this->Magazine_Issue_Id,
            'Magazine_Issue_Date' => $this->Magazine_Issue_Date,
            'Magazine_Id' => $this->title,
            'Magazine_Person_Id' => $this->memberName,
            'Magazine_Due_Date' => $this->Magazine_Due_Date,
        ]);

        $query->andFilterWhere(['like', 'Remarks', $this->Remarks]);

        return $dataProvider;
    }
}
