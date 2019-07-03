<?php
class Router{
    public static function route($url){

        //controller
        $controller = (isset($url[0]) AND $url[0] != '') ? ucwords($url[0]) : DEFAULT_CONTROLLER;
        $controller_name = $controller;
        array_shift($url);

        //action
        $action = (isset($url[0]) AND $url[0] != '') ? $url[0] . 'Action' : 'indexAction';
        $action_name = count($action);
        array_shift($url);

        //params
        $queryParams = $url;

        if(class_exists($controller)){
            $dispatch = new $controller($controller_name,$action);
            if(method_exists($controller,$action)){
                call_user_func_array([$dispatch,$action],$queryParams);
            } else {
                header('Location: '.SROOT.'ooh/page_not_found');
            }
        } else {
            header('Location: '.SROOT.'ooh/page_not_found');
        }
    }
}