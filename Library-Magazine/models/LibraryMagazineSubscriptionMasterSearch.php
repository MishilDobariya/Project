<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LibraryMagazineSubscriptionMaster;

/**
 * LibraryMagazineSubscriptionMasterSearch represents the model behind the search form about `app\models\LibraryMagazineSubscriptionMaster`.
 */
class LibraryMagazineSubscriptionMasterSearch extends LibraryMagazineSubscriptionMaster
{
    /**
     * @inheritdoc
     */
    public $magazineTitle;
    public $supplierName;
    public $status;
    public function rules()
    {
        return [
            [['Magazine_Subscription_Id', 'Magazine_Title_Id', 'Magazine_Subscription_No', 'Magazine_Subscription_Amount', 'Magazine_Subscription_Volume_No', 'Magazine_Subscription_Issue_No', 'Magazine_Subscription_Month', 'Magazine_Subscription_Year', 'Subscription_Period_Month', 'Magazine_Supplier_Id', 'SMS_No', 'Price_Of_Issue'], 'integer'],
            [['Magazine_Subscription_Date', 'Magazine_Subscription_From_Date', 'Magazine_Subscription_To_Date', 'Magazine_Mail_To_Send','magazineTitle','supplierName','Magazine_Accession_No','status'], 'safe'],
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
        $query = LibraryMagazineSubscriptionMaster::find();

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
            'Magazine_Subscription_Id' => $this->Magazine_Subscription_Id,
            'Magazine_Title_Id' => $this->magazineTitle,
            'Magazine_Subscription_Date' => $this->Magazine_Subscription_Date,
            'Magazine_Subscription_No' => $this->Magazine_Subscription_No,
            'Magazine_Subscription_Amount' => $this->Magazine_Subscription_Amount,
            'Magazine_Subscription_From_Date' => $this->Magazine_Subscription_From_Date,
            'Magazine_Subscription_To_Date' => $this->Magazine_Subscription_To_Date,
            'Magazine_Subscription_Volume_No' => $this->Magazine_Subscription_Volume_No,
            'Magazine_Subscription_Issue_No' => $this->Magazine_Subscription_Issue_No,
            'Magazine_Subscription_Month' => $this->Magazine_Subscription_Month,
            'Magazine_Subscription_Year' => $this->Magazine_Subscription_Year,
            'Subscription_Period_Month' => $this->Subscription_Period_Month,
            'Magazine_Supplier_Id' => $this->supplierName,
            'SMS_No' => $this->SMS_No,
            'Price_Of_Issue' => $this->Price_Of_Issue,
            'Magazine_Status' => $this->status,
            'Magazine_Accession_No' => $this->Magazine_Accession_No,
        ]);

        $query->andFilterWhere(['like', 'Magazine_Mail_To_Send', $this->Magazine_Mail_To_Send]);

        return $dataProvider;
    }
}
