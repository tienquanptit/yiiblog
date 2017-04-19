<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_group".
 *
 * @property integer $id
 * @property string $groupName
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['groupName'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['groupName'], 'string', 'max' => 255],
            [['groupName'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'groupName' => 'Group Name',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function  getAllGroup(){
        $data = Group::find()
            ->where(['status'=> '1'])
            ->asArray()
            ->all();

        return $data;
    }
}
