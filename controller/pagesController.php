<?php

class PagesController extends Database {
    
    public static function GetView($viewPath){
        require_once($viewPath);
    }
}

?>