<?php

namespace app\models;
use kartik\builder\TabularForm;
use kartik\grid\GridView;
use Yii;
use yii\data\ArrayDataProvider;

//use Yii;

/**
 * This is the model class for table "library_magazine_issue".
 *
 * @property integer $Magazine_Issue_Id
 * @property string $Magazine_Issue_Date
 * @property integer $Magazine_Id
 * @property integer $Magazine_Person_Id
 * @property string $Remarks
 * @property string $Magazine_Due_Date
 */
class LibraryMagazineIssue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library_magazine_issue';
    }
    public function gettitle() {
        $id = $this->titleName->Magazine_Title_Id;
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
    
        //return $this->titleName->Magazine_Title_Id;
    }

    public function gettitleName() {
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
   public $magazineName;
    public $status;
   // public $title;
    public function rules()
    {
        return [
            [['Magazine_Issue_Date', 'Magazine_Id', 'Magazine_Person_Id', 'Magazine_Due_Date'], 'required'],
            [['Magazine_Issue_Date', 'Magazine_Due_Date','magazineName','status','magazineName','title'], 'safe'],
            [['Magazine_Id', 'Magazine_Person_Id'], 'integer'],
            [['Remarks'], 'string', 'max' => 50],
            [['Magazine_Id'],'unique'],
            [['Magazine_Id'], 'exist', 'skipOnError' => true, 'targetClass' => LibraryMagazineSubscriptionMaster::className(), 'targetAttribute' => ['Magazine_Id' => 'Magazine_Subscription_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Magazine_Issue_Id' => 'Magazine  Issue  ID',
            'Magazine_Issue_Date' => 'Issue  Date',
            'Magazine_Id' => 'Magazine Name',
           'title' => 'Magazine Name',
            'Magazine_Person_Id' => 'Person Name',
            'Remarks' => 'Remarks',
            'Magazine_Due_Date' => 'Due Date',
           //'magazineName' => 'Magazine Name',
            'status'=>'Current Status',
     
        ];
    }
    public function getFormAttribs(){
    return[
        'title' =>['type' => TabularForm::INPUT_STATIC, 'label'=> 'Magazine Name' ],
        'Magazine_Issue_Date' =>['type' => TabularForm::INPUT_STATIC, 'label'=> 'Issue Date' ],
     
    ];
}

}


