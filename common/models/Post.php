<?php

namespace common\models;

use sjaakp\taggable\TaggableBehavior;
use Yii;
use yeesoft\comments\widgets\Comments;
use yii\helpers\Html;

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
    public $tag;

    private $_oldTags;

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
            [['postName', 'slug', 'image', 'description', 'tags'], 'string', 'max' => 255],
            [['tag'], 'safe'],
            [['file'], 'file', 'extensions' => 'jpg,png,gif'],

            //tag
//            [['tags'], 'match', 'pattern' => '/^[\w\s,]+$/', 'message' => 'Tags can only contain word characters.'],
//            [['tags'], 'normalizeTags'],
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
            'tags' => 'Nhãn',
            'status' => 'Trạng thái',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getPostByCatId($id)
    {
        $data = Post::find()->asArray()
            ->where('cate_id=:cateid', ['cateid' => $id])
            ->all();
        return $data;
    }

    //cấu hình comment
    public function behaviors()
    {
        return [
            'comments' => [
                'class' => 'yeesoft\comments\behaviors\CommentsBehavior'
            ],

//            'taggable' => [
//                'class' => TaggableBehavior::className(),
//                'tagClass' => Tag::className(),
//                'junctionTable' => 'tbl_tag',
//            ]
        ];
    }


    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

//        var_dump($this->tag);die;
        foreach ($this->tag as $value) {
            $exist = Tag::find()->where(['name' => $value])->one();
            if ($exist == null) {
                $data = new Tag();
                $data->name = $value;
                $data->save(false);
            }
        }
        foreach ($this->tag as $value) {
            $tag = Tag::find()->where(['name' => $value])->one();
            $data = new PostTag();
            $data->tag_id = $tag->id;
            $data->post_id = $this->id;
            $data->save(false);

        }
        $tag = Tag::find()->all();
        foreach ($tag as $item) {
            if (count($item->postTags) == 0) {
                $item->delete();
            } else {
                $item->frequency = count($item->postTags);
                $item->save(false);
            }
        }
    }

    public function afterDelete()
    {
        parent::afterDelete();
        $tag = Tag::find()->all();
        foreach ($tag as $item) {
            if (count($item->postTags) == 0) {
                $item->delete();
            } else {
                $item->frequency = count($item->postTags);
                $item->save(false);
            }
        }
    }

    public function getPostTags()
    {
        return $this->hasMany(PostTag::className(), ['post_id' => 'id']);
    }



}
