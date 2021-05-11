<?php
namespace app\core;
class Request
{
    public function getpath()
    {
        $path = $_SERVER['REQUEST_URI']?? '/';
        $position = Stropos($path, '?');


        if ($position === false){
            return $path;
        }

        substr($path, 0,$position)

    }

      public function getMethod()
    {
        return strtolower($_SERVER ["REQUEST_METHOD"]);
    }
}