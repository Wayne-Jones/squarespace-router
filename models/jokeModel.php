<?php

class JokeModel {

    private $id;
    private $type;
    private $setup;
    private $punchline;

    public function __construct($jokeResult){
        $this->id = $jokeResult[0]['id'];
        $this->type = $jokeResult[0]['type'];
        $this->setup = $jokeResult[0]['setup'];
        $this->punchline = $jokeResult[0]['punchline'];
    }

    public function getID(){
        return $this->id;
    }

    public function getType(){
        return $this->type;
    }
    
    public function getSetup(){
        return $this->setup;
    }

    public function getPunchline(){
        return $this->punchline;
    }
}
?>