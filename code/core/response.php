<?php

namespace app\core;

classresponse
{
    public function setStatusCode(int $code)
    {
       http_response_code($code)
     }
    
}