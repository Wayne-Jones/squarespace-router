<?php

class Router {

    private static $availableRoutes = [];
    private static $availableControllers = [];

    public function __construct(){
        self::$availableRoutes["404"] = 'views/404.php';
        self::$availableControllers["404"] = 'NotFoundController';
    }

    public static function set($route, $viewPath, $controller){
        self::$availableRoutes[$route] = $viewPath;
        self::$availableControllers[$route] = $controller;
    }

    public function print_routes(){
        print_r($this->availableRoutes);
    }
    
    public static function get($uri, $additionalParams = null){
        if(isset(self::$availableRoutes[$uri])){
            if($additionalParams != null && !ctype_digit($additionalParams)){
                $viewPath = self::$availableRoutes["404"];
                $controllerName = self::$availableControllers["404"];
                return array($controllerName, $viewPath);
            }
            else{
                $viewPath = self::$availableRoutes[$uri];
                $controllerName = self::$availableControllers[$uri];
                return array($controllerName, $viewPath);
            }
        }
        else{
            $viewPath = self::$availableRoutes["404"];
            $controllerName = self::$availableControllers["404"];
            return array($controllerName, $viewPath);
        }

    }
}
?>