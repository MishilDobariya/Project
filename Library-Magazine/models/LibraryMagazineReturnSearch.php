<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LibraryMagazineReturn;

/**
 * LibraryMagazineReturnSearch represents the model behind the search form about `app\models\LibraryMagazineReturn`.
 */
class LibraryMagazineReturnSearch extends LibraryMagazineReturn
{
    /**
     * @inheritdoc
     */
    public $magazineTitle;
    public $memberName;
    
    public function rules()
    {
        return [
            [['Magazine_Return_Id', 'Magazine_Id', 'Magazine_Person_Id'], 'integer'],
            [['Magazine_Return_Date', 'Magazine_Issue_Date', 'Magazine_Due_Date', 'Remarks','magazineTitle','memberName'], 'safe'],
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
        $query = LibraryMagazineReturn::find();

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
            'Magazine_Return_Id' => $this->Magazine_Return_Id,
            'Magazine_Return_Date' => $this->Magazine_Return_Date,
            'Magazine_Id' => $this->magazineTitle,
            'Magazine_Person_Id' => $this->memberName,
            'Magazine_Issue_Date' => $this->Magazine_Issue_Date,
            'Magazine_Due_Date' => $this->Magazine_Due_Date,
        ]);

        $query->andFilterWhere(['like', 'Remarks', $this->Remarks]);

        return $dataProvider;
    }
}
