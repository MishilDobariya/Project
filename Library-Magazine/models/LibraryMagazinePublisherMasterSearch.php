<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LibraryMagazinePublisherMaster;

/**
 * LibraryMagazinePublisherMasterSearch represents the model behind the search form about `app\models\LibraryMagazinePublisherMaster`.
 */
class LibraryMagazinePublisherMasterSearch extends LibraryMagazinePublisherMaster
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Magazine_Publisher_Id', 'Magazine_Publisher_Phone_No', 'Magazine_Publisher_Fax_No', 'Magazine_Publisher_Mobile_No'], 'integer'],
            [['Magazine_Publisher_Name', 'Magazine_Publisher_Address', 'Magazine_Publisher_Email_Address', 'Magazine_Publisher_Web_Address', 'Magazine_Publisher_Contact_Person_Name'], 'safe'],
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
        $query = LibraryMagazinePublisherMaster::find();

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
            'Magazine_Publisher_Id' => $this->Magazine_Publisher_Id,
            'Magazine_Publisher_Phone_No' => $this->Magazine_Publisher_Phone_No,
            'Magazine_Publisher_Fax_No' => $this->Magazine_Publisher_Fax_No,
            'Magazine_Publisher_Mobile_No' => $this->Magazine_Publisher_Mobile_No,
        ]);

        $query->andFilterWhere(['like', 'Magazine_Publisher_Name', $this->Magazine_Publisher_Name])
            ->andFilterWhere(['like', 'Magazine_Publisher_Address', $this->Magazine_Publisher_Address])
            ->andFilterWhere(['like', 'Magazine_Publisher_Email_Address', $this->Magazine_Publisher_Email_Address])
            ->andFilterWhere(['like', 'Magazine_Publisher_Web_Address', $this->Magazine_Publisher_Web_Address])
            ->andFilterWhere(['like', 'Magazine_Publisher_Contact_Person_Name', $this->Magazine_Publisher_Contact_Person_Name]);

        return $dataProvider;
    }
}
