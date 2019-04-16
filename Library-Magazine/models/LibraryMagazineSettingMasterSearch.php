<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LibraryMagazineSettingMaster;

/**
 * LibraryMagazineSettingMasterSearch represents the model behind the search form about `app\models\LibraryMagazineSettingMaster`.
 */
class LibraryMagazineSettingMasterSearch extends LibraryMagazineSettingMaster
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Magazine_Setting_Id', 'Reminder', 'Reminder_Alert_Time_Period'], 'integer'],
            [['Magazine_Setting_Due_Date'], 'safe'],
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
        $query = LibraryMagazineSettingMaster::find();

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
            'Magazine_Setting_Id' => $this->Magazine_Setting_Id,
            'Magazine_Setting_Due_Date' => $this->Magazine_Setting_Due_Date,
            'Reminder' => $this->Reminder,
            'Reminder_Alert_Time_Period' => $this->Reminder_Alert_Time_Period,
        ]);

        return $dataProvider;
    }
}
