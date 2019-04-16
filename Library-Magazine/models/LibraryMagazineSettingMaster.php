<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "library_magazine_setting_master".
 *
 * @property integer $Magazine_Setting_Id
 * @property string $Magazine_Setting_Due_Date
 * @property integer $Reminder
 * @property integer $Reminder_Alert_Time_Period
 */
class LibraryMagazineSettingMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library_magazine_setting_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Magazine_Setting_Due_Date'], 'required'],
            [['Magazine_Setting_Due_Date'], 'safe'],
            [['Reminder', 'Reminder_Alert_Time_Period'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Magazine_Setting_Id' => 'Magazine  Setting  ID',
            'Magazine_Setting_Due_Date' => 'Setting  Due  Date',
            'Reminder' => 'Reminder',
            'Reminder_Alert_Time_Period' => 'Reminder  Alert  Time  Period',
        ];
    }
}
