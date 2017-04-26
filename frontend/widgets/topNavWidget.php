<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 4/24/2017
 * Time: 11:58 AM
 */
namespace frontend\widgets;

use common\models\Category;

use yii\base\Widget;
use yii\helpers\Html;

class topNavWidget extends Widget
{


    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $cat = new Category();
        $dataCat = $cat ->getCategoryByParent();
        return $this->render('topNavWidget',['dataCat'=>$dataCat]);
    }
}
?>