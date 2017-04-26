<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 4/24/2017
 * Time: 1:27 PM
 */
namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class footerWidget extends Widget
{


    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('footerWidget');
    }
}
?>