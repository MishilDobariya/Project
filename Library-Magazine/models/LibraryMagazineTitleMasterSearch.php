<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LibraryMagazineTitleMaster;

/**
 * LibraryMagazineTitleMasterSearch represents the model behind the search form about `app\models\LibraryMagazineTitleMaster`.
 */
class LibraryMagazineTitleMasterSearch extends LibraryMagazineTitleMaster
{
    /**
     * @inheritdoc
     */
    public $departmentName;
    public $publisherName;
    public $type;
    public $magazineType;
    public function rules()
    {
        return [
            [['Magazine_Id', 'Type', 'Magazine_Publisher_Id', 'Magazine_Type', 'Department_Id', 'Magazine_Periodicty'], 'integer'],
            [['Magazine_Title', 'Magazine_Remarks', 'Magazine_ISBN_No','departmentName','publisherName','type','magazineType'], 'safe'],
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
        $query = LibraryMagazineTitleMaster::find();

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
            'Magazine_Id' => $this->Magazine_Id,
            'Type' => $this->type,
            'Magazine_Publisher_Id' => $this->publisherName,
            'Magazine_Type' => $this->magazineType,
            'Department_Id' => $this->departmentName,
            'Magazine_Periodicty' => $this->Magazine_Periodicty,
           // 'Magazine_Accession_No' => $this->Magazine_Accession_No,
        ]);

        $query->andFilterWhere(['like', 'Magazine_Title', $this->Magazine_Title])
            ->andFilterWhere(['like', 'Magazine_Remarks', $this->Magazine_Remarks])
            ->andFilterWhere(['like', 'Magazine_ISBN_No', $this->Magazine_ISBN_No]);

        return $dataProvider;
    }
}
