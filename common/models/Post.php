<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_post".
 *
 * @property integer $id
 * @property string $postName
 * @property string $slug
 * @property string $image
 * @property string $description
 * @property string $content
 * @property integer $groups_id
 * @property integer $cate_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;

    public static function tableName()
    {
        return 'tbl_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['postName', 'slug', 'content', 'groups_id', 'cate_id', 'created_at', 'updated_at'], 'required'],
            [['content'], 'string'],
            [['groups_id', 'cate_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['postName', 'slug', 'image', 'description'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['file'],'file','extensions'=>'jpg,png,gif']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'postName' => 'Tên bài viết',
            'slug' => 'Đường dẫn tĩnh',
            'image' => 'Hình ảnh',
            'description' => 'Mô tả ngắn',
            'content' => 'Nội dung bài viết',
            'groups_id' => 'Nhóm danh mục',
            'cate_id' => 'Danh mục cha',
            'status' => 'Trạng thái',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
