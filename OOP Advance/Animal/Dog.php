<?php
class Dog extends Animal{
    public function __construct(){
        $this->health = 150;
    }

    public function pet(){
        echo "petted . . . Happy Doggo<br>";
        $this->health += 5;
        return $this;
    }
}

?>