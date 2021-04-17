<?php
class Dragon extends Animal{

    public function __construct(){
        $this->health = 170;
    }

    public function fly(){
        echo "flying . . .<br>";
        $this->health -= 10;
        return $this;
    }
}


?>