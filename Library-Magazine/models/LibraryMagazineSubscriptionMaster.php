<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "library_magazine_subscription_master".
 *
 * @property integer $Magazine_Subscription_Id
 * @property integer $Magazine_Title_Id
 * @property string $Magazine_Subscription_Date
 * @property integer $Magazine_Subscription_No
 * @property integer $Magazine_Subscription_Amount
 * @property string $Magazine_Subscription_From_Date
 * @property string $Magazine_Subscription_To_Date
 * @property integer $Magazine_Subscription_Volume_No
 * @property integer $Magazine_Subscription_Issue_No
 * @property integer $Magazine_Subscription_Month
 * @property integer $Magazine_Subscription_Year
 * @property integer $Subscription_Period_Month
 * @property integer $Magazine_Supplier_Id
 * @property string $Magazine_Mail_To_Send
 * @property integer $SMS_No
 * @property integer $Price_Of_Issue
 * @property integer $Magazine_Status
 */
class LibraryMagazineSubscriptionMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library_magazine_subscription_master';
    }
    
    public function getmagazineTitle(){
        return $this->magazine->Magazine_Title;
    }
    public function getmagazine(){
        return $this->hasOne(LibraryMagazineTitleMaster::className(), ['Magazine_Id' => 'Magazine_Title_Id']);
    }
    
    public function getsupplierName(){
        return $this->supplier->Magazine_Supplier_Name;
    }
    public function getsupplier(){
        return $this->hasOne(LibraryMagazineSupplierMaster::className(), ['Magazine_Supplier_Id' => 'Magazine_Supplier_Id']);
    }
    
    public function getstatus(){
        return $this->statusName->Book_Status_Description;
    }
    public function getstatusName(){
        return $this->hasOne(LibraryBookStatus::className(), ['Book_Status_Id' => 'Magazine_Status']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Magazine_Title_Id', 'Magazine_Subscription_Date', 'Magazine_Subscription_No', 'Magazine_Subscription_Amount', 'Magazine_Subscription_From_Date', 'Magazine_Subscription_To_Date', 'Magazine_Subscription_Volume_No', 'Magazine_Subscription_Issue_No', 'Magazine_Subscription_Year', 'Magazine_Supplier_Id', 'Price_Of_Issue', 'Magazine_Status','Magazine_Accession_No'], 'required'],
            [['Magazine_Title_Id', 'Magazine_Subscription_No', 'Magazine_Subscription_Amount', 'Magazine_Subscription_Volume_No', 'Magazine_Subscription_Issue_No', 'Magazine_Subscription_Month', 'Magazine_Subscription_Year', 'Subscription_Period_Month', 'Magazine_Supplier_Id', 'SMS_No', 'Price_Of_Issue', 'Magazine_Status'], 'integer'],
            [['Magazine_Subscription_Date', 'Magazine_Subscription_From_Date', 'Magazine_Subscription_To_Date'], 'safe'],
            [['Magazine_Mail_To_Send'], 'string', 'max' => 100],
            [['Magazine_Accession_No'], 'string', 'max' => 20],
            [['Magazine_Title_Id'], 'exist', 'skipOnError' => true, 'targetClass' => LibraryMagazineTitleMaster::className(), 'targetAttribute' => ['Magazine_Title_Id' => 'Magazine_Id']],
            [['Magazine_Supplier_Id'], 'exist', 'skipOnError' => true, 'targetClass' => LibraryMagazineSupplierMaster::className(), 'targetAttribute' => ['Magazine_Supplier_Id' => 'Magazine_Supplier_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Magazine_Subscription_Id' => 'Magazine  Subscription  ID',
            'Magazine_Title_Id' => 'Magazine  Title',
            'Magazine_Subscription_Date' => 'Subscription  Date',
            'Magazine_Subscription_No' => 'Subscription  No',
            'Magazine_Subscription_Amount' => 'Subscription  Amount',
            'Magazine_Subscription_From_Date' => 'From  Date',
            'Magazine_Subscription_To_Date' => 'To  Date',
            'Magazine_Subscription_Volume_No' => 'Volume  No',
            'Magazine_Subscription_Issue_No' => 'Magazine  Issue  No',
            'Magazine_Subscription_Month' => 'Subscription  Month',
            'Magazine_Subscription_Year' => 'Subscription  Year',
            'Subscription_Period_Month' => 'Period  Month',
            'Magazine_Supplier_Id' => 'Supplier  Name',
            'Magazine_Mail_To_Send' => 'Mail  To  Send',
            'SMS_No' => 'Sms  No',
            'Price_Of_Issue' => 'Price  Of  Issue',
            'Magazine_Status' => 'Status',
            'Magazine_Accession_No' => 'Accession  No',
        ];
    }
}
