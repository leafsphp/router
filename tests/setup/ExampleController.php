<?php

namespace App\Controllers;

use TCore;
use TRoute;

class ExampleController {
    public function puts()
    {
        TCore::$val = true;
        echo 'example controller';
    }
};
