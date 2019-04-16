<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "library_magazine_title_master".
 *
 * @property integer $Magazine_Id
 * @property integer $Type
 * @property integer $Magazine_Publisher_Id
 * @property string $Magazine_Title
 * @property integer $Magazine_Type
 * @property integer $Department_Id
 * @property integer $Magazine_Periodicty
 * @property string $Magazine_Remarks
 * @property string $Magazine_ISBN_No
 * @property integer $Magazine_Accession_No
 */
class LibraryMagazineTitleMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library_magazine_title_master';
    }
    public function getdepartmentName() {
        return $this->department->Department_Name;
    }

    public function getdepartment() {
        return $this->hasOne(Department::className(), ['Department_Id' => 'Department_Id']);
    }
    
    public function getpublisherName(){
        return $this->publisher->Magazine_Publisher_Name;
    }
    public function getpublisher(){
        return $this->hasOne(LibraryMagazinePublisherMaster::className(), ['Magazine_Publisher_Id' => 'Magazine_Publisher_Id']);
    }
    
    
    public function gettype(){
        $config = require('../config/esta_config.php');
        return $config['TYPE'][$this->Type];
    }
   
    public function getmagazineType(){
        $config = require('../config/esta_config.php');
        return $config['MAGAZINE_TYPE'][$this->Magazine_Type];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Type', 'Magazine_Publisher_Id', 'Magazine_Title', 'Magazine_Type', 'Department_Id', 'Magazine_Periodicty', 'Magazine_ISBN_No'], 'required'],
            [['Type', 'Magazine_Publisher_Id', 'Magazine_Type', 'Department_Id', 'Magazine_Periodicty'], 'integer'],
            [['Magazine_Title', 'Magazine_Remarks'], 'string', 'max' => 100],
            [['Magazine_ISBN_No'], 'string', 'max' => 20],
            [['Magazine_Publisher_Id'], 'exist', 'skipOnError' => true, 'targetClass' => LibraryMagazinePublisherMaster::className(), 'targetAttribute' => ['Magazine_Publisher_Id' => 'Magazine_Publisher_Id']],
            [['Department_Id'], 'exist', 'skipOnError' => true, 'targetClass' => DepartmentMaster::className(), 'targetAttribute' => ['Department_Id' => 'Department_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Magazine_Id' => 'Magazine Id',
            'Type' => 'Type',
            'Magazine_Publisher_Id' => 'Publisher  Name',
            'Magazine_Title' => 'Magazine  Title',
            'Magazine_Type' => 'Magazine  Type',
            'Department_Id' => 'Department  Name',
            'Magazine_Periodicty' => 'Periodicity',
            'Magazine_Remarks' => 'Remarks',
            'Magazine_ISBN_No' => 'ISBN  No',
          //  'Magazine_Accession_No' => 'Accession  No',
        ];
    }
}
