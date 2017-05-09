<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_comment".
 *
 * @property integer $id
 * @property string $author
 * @property string $email
 * @property string $content
 * @property string $url
 * @property integer $created_at
 * @property integer $updated_at
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author', 'email', 'content', 'url'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['author', 'email', 'content', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'content' => 'Comment',
            'status' => 'Status',
            'author' => 'Name',
            'email' => 'Email',
            'url' => 'Website',
            'post_id' => 'Post',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function beforSave(){
        if(parent::beforeSave()){
            if($this->isNewRecord)
                $this->created_at = time();
            return true;
        }
        else
            return false;
    }
}
