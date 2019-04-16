<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "library_magazine_publisher_master".
 *
 * @property integer $Magazine_Publisher_Id
 * @property string $Magazine_Publisher_Name
 * @property string $Magazine_Publisher_Address
 * @property integer $Magazine_Publisher_Phone_No
 * @property integer $Magazine_Publisher_Fax_No
 * @property integer $Magazine_Publisher_Mobile_No
 * @property string $Magazine_Publisher_Email_Address
 * @property string $Magazine_Publisher_Web_Address
 * @property string $Magazine_Publisher_Contact_Person_Name
 */
class LibraryMagazinePublisherMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library_magazine_publisher_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Magazine_Publisher_Name', 'Magazine_Publisher_Address', 'Magazine_Publisher_Phone_No', 'Magazine_Publisher_Mobile_No', 'Magazine_Publisher_Contact_Person_Name'], 'required'],
            [['Magazine_Publisher_Phone_No', 'Magazine_Publisher_Fax_No', 'Magazine_Publisher_Mobile_No'], 'integer'],
            [['Magazine_Publisher_Name', 'Magazine_Publisher_Email_Address', 'Magazine_Publisher_Web_Address', 'Magazine_Publisher_Contact_Person_Name'], 'string', 'max' => 50],
            [['Magazine_Publisher_Address'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Magazine_Publisher_Id' => 'Magazine  Publisher  ID',
            'Magazine_Publisher_Name' => 'Publisher  Name',
            'Magazine_Publisher_Address' => 'Address',
            'Magazine_Publisher_Phone_No' => 'Phone  No',
            'Magazine_Publisher_Fax_No' => 'Fax  No',
            'Magazine_Publisher_Mobile_No' => 'Mobile  No',
            'Magazine_Publisher_Email_Address' => 'Email  Address',
            'Magazine_Publisher_Web_Address' => 'Web  Address',
            'Magazine_Publisher_Contact_Person_Name' => 'Contact  Person  Name',
        ];
    }
}
