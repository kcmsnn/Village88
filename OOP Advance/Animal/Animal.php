<?php
class Animal{

    public $health;

    public function __construct(){
        $this->health = 100;
    }
    public function walk(){
        echo "Walking. . .<br>";
        $this->health -= 1;
        return $this;
    }

    public function run(){
        echo "Running! ! !<br>";
        $this->health -= 5;
        return $this;
    }
    public function displayHealth($name){
        echo "this is a " . $name . "<br>";
        echo "Health: " . $this->health . "<br><br>";
    }
}


?>