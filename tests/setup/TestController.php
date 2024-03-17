<?php

namespace Controllers;

use TRoute;

class TestController
{
    public function puts()
    {
        TRoute::$val = true;
        echo 'example controller';
    }
};
