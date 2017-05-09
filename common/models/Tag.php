<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_tag".
 *
 * @property integer $id
 * @property string $name
 * @property integer $frequency
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    private $list;
    public static function tableName()
    {
        return 'tbl_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['frequency'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'frequency' => 'Frequency',
        ];
    }

    public function getPostTags()
    {
        return $this->hasMany(PostTag::className(), ['tag_id' => 'id']);
    }

    public function getAllTag()
    {
        $data = Tag::find()->all();
        foreach ($data as $item) {
            $this->list[$item->name] = $item->name;
        }
        return $this->list;
    }
}