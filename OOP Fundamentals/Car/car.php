<?php
class car
{
    public $price;
    public $speed;
    public $fuel;
    public $mileage;
    public $tax;


    public function __construct($car_price,$car_speed,$car_fuel,$car_mileage)
    {
        $this->price = $car_price;
        $this->speed = $car_speed . "mph";
        $this->fuel = $car_fuel;
        $this->mileage = $car_mileage . "mpg";
        if ($this->price > 10000) {
            $this->tax = .15;
        }elseif ($this->price < 10000) {
            $this->tax = .12;
        }
        $this->Display_all();
    }

    public function Display_all(){
        echo "Price: " . $this->price . "<br>";
        echo "Speed: " . $this->speed . "<br>";
        echo "Fuel: " . $this->fuel . "<br>";
        echo "Mileage: " . $this->mileage . "<br>";
        echo "Tax: " . $this->tax . "<br>";
        echo "<br>";
    }

}
$car1 = new car(2000,35,"Full",15);
$car2 = new car(2000,5,"Not Full",105);
$car3 = new car(2000,15,"Kind of Full",95);
$car4 = new car(2000,25,"Empty",25);
$car5 = new car(20000000,35,"empty",15);

?>