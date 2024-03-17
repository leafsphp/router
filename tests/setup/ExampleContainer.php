<?php

namespace App;

class ExampleContainer {
    /**
     * @param string[] handler 
     * @param array[] params
     */
    public function call($handler, $params) {
        [$controller, $method] = $handler;
        if (call_user_func_array([new $controller(), $method], $params) === false) {
            // Try to call the method as a non-static method. (the if does nothing, only avoids the notice)
            if (forward_static_call_array([$controller, $method], $params) === false);
        }
    }
}