<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "library_magazine_return".
 *
 * @property integer $Magazine_Return_Id
 * @property string $Magazine_Return_Date
 * @property integer $Magazine_Id
 * @property integer $Magazine_Person_Id
 * @property string $Magazine_Issue_Date
 * @property string $Magazine_Due_Date
 * @property string $Remarks
 */
class LibraryMagazineReturn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library_magazine_return';
    }
    
     public function getmagazineTitle(){
        $id = $this->magazine->Magazine_Title_Id;
        $d = \app\models\LibraryMagazineTitleMaster::find()
                ->select('Magazine_Id as id,Magazine_Title as name')
                ->andWhere('Magazine_Id =' . $id)
                ->asArray()
                ->all();
        if ($d) {
            return $d[0]['name'];
        } else
            return "";
        exit;
    }
    public function getmagazine(){
        return $this->hasOne(LibraryMagazineSubscriptionMaster::className(), ['Magazine_Subscription_Id' => 'Magazine_Id']);
    }
    
    public function getmemberName() {
          return $this->member == null ? '' : $this->member->Member_Code . ' || ' . $this->member->Member_First_Name . ' ' .
                $this->member->Member_Middle_Name . ' ' . $this->member->Member_Last_Name;
    }
    public function getmember() {
        return $this->hasOne(LibraryMemberMaster::className(), ['Member_Id' => 'Magazine_Person_Id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Magazine_Return_Date', 'Magazine_Id', 'Magazine_Person_Id', 'Magazine_Issue_Date', 'Magazine_Due_Date'], 'required'],
            [['Magazine_Return_Date', 'Magazine_Issue_Date', 'Magazine_Due_Date'], 'safe'],
            [['Magazine_Id', 'Magazine_Person_Id'], 'integer'],
            [['Remarks'], 'string', 'max' => 100],
            [['Magazine_Id'], 'exist', 'skipOnError' => true, 'targetClass' => LibraryMagazineSubscriptionMaster::className(), 'targetAttribute' => ['Magazine_Id' => 'Magazine_Subscription_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Magazine_Return_Id' => 'Magazine  Return  ID',
            'Magazine_Return_Date' => 'Return  Date',
            'Magazine_Id' => 'Magazine  Name',
            'Magazine_Person_Id' => 'Person  Name',
            'Magazine_Issue_Date' => 'Issue  Date',
            'Magazine_Due_Date' => 'Due  Date',
            'Remarks' => 'Remarks',
        ];
    }
}
