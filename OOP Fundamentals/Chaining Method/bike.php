<?php
class bike
{
    public $price;
    public $max_speed;
    public $miles;


    public function __construct($bike_price,$bike_speed,$bike_miles)
    {
        $this->price = $bike_price;
        $this->max_speed = $bike_speed;
        $this->miles = $bike_miles;
    }

    public function displayInfo(){
        echo "Price: " . $this->price . "<br>";
        echo "Max Speed: " . $this->max_speed . "<br>";
        echo "Miles: " . $this->miles . "<br>";
        
        return $this;
    }
    public function drive(){
        $this->miles += 10;
        echo "Driving... <br>";
        return $this;
    }
    public function reverse(){
        if ($this->miles <=0) {
            echo "Cannot reverse you have " . $this->miles . " miles driven<br>";
        }else {
            $this->miles -= 10;
            echo "Reverse... <br>";
        }        
        return $this;
    }
}
?>