<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LibraryMagazineSupplierMaster;

/**
 * LibraryMagazineSupplierMasterSearch represents the model behind the search form about `app\models\LibraryMagazineSupplierMaster`.
 */
class LibraryMagazineSupplierMasterSearch extends LibraryMagazineSupplierMaster
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Magazine_Supplier_Id', 'Magazine_Supplier_Phone_No', 'Magazine_Supplier_Fax_No', 'Magazine_Supplier_Mobile_No'], 'integer'],
            [['Magazine_Supplier_Name', 'Magazine_Supplier_Address', 'Magazine_Supplier_Email', 'Magazine_Supplier_Web_Address', 'Magazine_Supplier_Contact_Person_Name'], 'safe'],
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
        $query = LibraryMagazineSupplierMaster::find();

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
            'Magazine_Supplier_Id' => $this->Magazine_Supplier_Id,
            'Magazine_Supplier_Phone_No' => $this->Magazine_Supplier_Phone_No,
            'Magazine_Supplier_Fax_No' => $this->Magazine_Supplier_Fax_No,
            'Magazine_Supplier_Mobile_No' => $this->Magazine_Supplier_Mobile_No,
        ]);

        $query->andFilterWhere(['like', 'Magazine_Supplier_Name', $this->Magazine_Supplier_Name])
            ->andFilterWhere(['like', 'Magazine_Supplier_Address', $this->Magazine_Supplier_Address])
            ->andFilterWhere(['like', 'Magazine_Supplier_Email', $this->Magazine_Supplier_Email])
            ->andFilterWhere(['like', 'Magazine_Supplier_Web_Address', $this->Magazine_Supplier_Web_Address])
            ->andFilterWhere(['like', 'Magazine_Supplier_Contact_Person_Name', $this->Magazine_Supplier_Contact_Person_Name]);

        return $dataProvider;
    }
}
