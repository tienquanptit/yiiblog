<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_category".
 *
 * @property integer $id
 * @property string $cateName
 * @property integer $parent_id
 * @property string $keywords
 * @property string $description
 * @property integer $order
 * @property integer $groups_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cateName', 'order', 'groups_id', 'created_at', 'updated_at'], 'required','message'=>'{attribute} không được để trống'],
            [['parent_id', 'order', 'groups_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['cateName', 'keywords', 'description'], 'string', 'max' => 255],
            [['cateName'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cateName' => 'Tên danh mục',
            'parent_id' => 'Danh mục cha',
            'keywords' => 'Từ khóa',
            'description' => 'Mô tả',
            'order' => 'Thứ tự hiển thị',
            'groups_id' => 'Nhóm danh mục',
            'status' => 'Trạng thái',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public $data;
    public function getCategoryParent($parent=0, $level=''){
        $result = Category::find()
            ->asArray()
            ->where('parent_id = :parent', ['parent'=>$parent])
            ->all();
        $level .='-';
        foreach ($result as $key => $value){
            if($parent==0){
                $level = '';
            }
            $this->data[$value['id']] = $level.$value['cateName'];
            //de quy gọi chính nó
            self::getCategoryParent($value['id'],$level);
        }
        return $this->data;
    }


    public function getCategoryByParent($parent=0, $group=4, $status=1){
        $data = Category::find()->asArray()
            ->where('parent_id = :parent and groups_id = :group and status = :status',
                ['parent'=>$parent, 'group'=>$group, 'status'=>$status])
            ->all();

        return $data;
    }

}
