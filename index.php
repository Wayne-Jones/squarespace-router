<?php


spl_autoload_register(function($class){
    if(file_exists('./classes/'.$class.'.php')){
        require_once('./classes/'.$class.'.php');
    }
    
    if(file_exists('./controller/'.$class.'.php')){
        require_once('./controller/'.$class.'.php');
    }

    if(file_exists('./models/'.$class.'.php')){
        require_once('./models/'.$class.'.php');
    }
});

require_once('./routes/routes.php');

if(!empty($_SERVER['REQUEST_URI'])){
    $uri = $_SERVER['REQUEST_URI'];
    if($uri === '/'){
        $routeArray = Router::get($uri);
        $controllerName = $routeArray[0];
        $viewPath = $routeArray[1];
        $controllerName::GetView($viewPath);
    }
    else{
        $uri = trim($uri, '/');
        $arr = explode('/', $uri);
        if(count($arr) == '1'){
            $uri = $arr[0];
            $routeArray = Router::get($uri);
            $controllerName = $routeArray[0];
            $viewPath = $routeArray[1];
            if($controllerName=='NotFoundController'){
                $controllerName::GetView($viewPath);
            }
            else{
                $controllerName::retreiveRandomJoke($viewPath);
            }
        }
        else{
            $uri = $arr[0];
            $additionalParams = $arr[1];
            $routeArray = Router::get($uri, $additionalParams);
            $controllerName = $routeArray[0];
            $viewPath = $routeArray[1];
            if($controllerName=='NotFoundController'){
                $controllerName::GetView($viewPath);
            }
            else{
                $controllerName::retreiveJokes($additionalParams);
            }
        }
    }
}
?>