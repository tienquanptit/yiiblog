<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 5/1/2017
 * Time: 9:57 PM
 */
namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class slideBarWidget extends Widget
{


    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('slideBarWidget');
    }
}
?>