<?php
namespace app\core\widgets;
use app\core\Model;
class Form
{

    public static function begin($action, $method)
    {
       // return Sprintf('<form action="%s" method="%s">', $action, $method);
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    public static function end()
    {
        echo '</form>';

    }

    public function field(Model $model, $attribute)
    {
        return new field($model, $attribute);

    }


}