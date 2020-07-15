<?php

class JokeController extends PagesController {
    
    public static function retreiveJokes($numOfJokes){
        print_r(self::query("SELECT * from `joketable` ORDER BY RAND() LIMIT $numOfJokes"));
    }

    public static function retreiveRandomJoke($viewPath){
        $jokeResult = json_decode(self::query("SELECT * from `joketable` ORDER BY RAND() LIMIT 1"), true);
        $jokeModel = new JokeModel($jokeResult);
        require_once($viewPath);
    }
}
?>