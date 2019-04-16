<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "library_magazine_supplier_master".
 *
 * @property integer $Magazine_Supplier_Id
 * @property string $Magazine_Supplier_Name
 * @property string $Magazine_Supplier_Address
 * @property integer $Magazine_Supplier_Phone_No
 * @property integer $Magazine_Supplier_Fax_No
 * @property integer $Magazine_Supplier_Mobile_No
 * @property string $Magazine_Supplier_Email
 * @property string $Magazine_Supplier_Web_Address
 * @property string $Magazine_Supplier_Contact_Person_Name
 */
class LibraryMagazineSupplierMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library_magazine_supplier_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Magazine_Supplier_Name', 'Magazine_Supplier_Address', 'Magazine_Supplier_Phone_No', 'Magazine_Supplier_Mobile_No', 'Magazine_Supplier_Contact_Person_Name'], 'required'],
            [['Magazine_Supplier_Phone_No', 'Magazine_Supplier_Fax_No', 'Magazine_Supplier_Mobile_No'], 'integer'],
            [['Magazine_Supplier_Name'], 'string', 'max' => 100],
            [['Magazine_Supplier_Address'], 'string', 'max' => 150],
            [['Magazine_Supplier_Email', 'Magazine_Supplier_Web_Address', 'Magazine_Supplier_Contact_Person_Name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Magazine_Supplier_Id' => 'Magazine  Supplier  ID',
            'Magazine_Supplier_Name' => 'Supplier  Name',
            'Magazine_Supplier_Address' => 'Address',
            'Magazine_Supplier_Phone_No' => 'Supplier  Phone  No',
            'Magazine_Supplier_Fax_No' => 'Fax  No',
            'Magazine_Supplier_Mobile_No' => 'Mobile  No',
            'Magazine_Supplier_Email' => 'Email',
            'Magazine_Supplier_Web_Address' => 'Web  Address',
            'Magazine_Supplier_Contact_Person_Name' => 'Contact  Person  Name',
        ];
    }
}
