<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 5/4/2017
 * Time: 3:11 PM
 */

namespace frontend\widgets;

use common\models\Tag;
use yii\base\Widget;
use yii\helpers\Html;

class TagCloud extends Widget
{
    public $title = 'Tags';
    public $maxTags = 20;

    private $_labels = array();

    public function init()
    {
        parent::init();
        $this->_labels = array(
            '9' => 'label',
            '10' => 'label-success',
            '11' => 'label-info',
            '12' => 'label-inverse',
            '13' => 'label-important',
            '14' => 'label-warning',
        );
    }

    protected function renderContent()
    {
        $tags = Tag::findTagWeights($this->maxTags);
        foreach ($tags as $tag => $weight) {
            if($weight>14) $weight=14;
            $class = 'label ';
            if(isset($this->_labels[$weight])){
                $class .=$this->_labels[$weight];
            }
            // TODO: controller route
            echo Html::a(Html::encode($tag),array('/post/view','tag'=>$tag), array('class'=>$class))."\n";
        }
    }
}

?>