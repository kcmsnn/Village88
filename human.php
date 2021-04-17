<?php
class Human 
{
  public $health;
  public $clan;
  public $strength = 3;
  public $intelligence = 3;
  public $stealth = 3;
  public function __construct() 
  {
    echo "I am alive";
    $this->health = 100;
  }
  public function trashTalk() 
  {
    echo "You want a piece of me?";
  }
  public function attack($human) 
  {
    $this->trashTalk();
    $luck = rand(0, 100);
    if($luck * $this->$intelligence > 1000 && $luck > $human->stealth) 
    {
      $human->health -= $this->strength;
      return true;
    } 
    else
    {
      return false;
    }
  }
}
class Wizard extends Human
{
    public function __construct()
    {
        parent::__construct();
        $this->clan = "Wizard";
        $this->strength = 5;
        $this->intelligence = 40;
        $this->stealth = 5;
    }
    public function heal()
    {
        $this->health += 10;
    }
    public function trashTalk()
    {
        echo "Happiness can be found even in the darkest of times";
    }
    public function attack($human)
    {
        parent::attack($human);
        $this->heal();
    }
}
class Ninja extends Human
{
    public function steal()
    {
        $this->stealth += 5;
    }
    public function trashTalk()
    {
        echo "Now you see me...";
    }
    public function attack($human)
    {
        parent::attack($human);
        $this->steal();
    }
}
class Samurai extends Human
{
    public function sacrifice()
    {
        $this->health -= 5;
        $this->strength += 10;
    }
    public function trashTalk()
    {
        echo "The flower that blooms in adversity is the most beautiful of all";
    }
    public function attack($human)
    {
        parent::attack($human);
        $this->sacrifice();
    }
}
// creating an instance of Wizard, Ninja and Samurai
$harry = new Wizard();
echo "<br>";
$rain = new Ninja();
echo "<br>";
$tom = new Samurai();
echo "<br>";
// all instances still have human properties because its class extends the Human class
echo "Harry's Health: " . $harry->health ."<br>";
echo "Rain's Health: " . $rain->health ."<br>";
echo "Tom's Health: " . $tom->health ."<br>";
// yet they are subclasses which mean they can extend the current functionality of Human class
// instances of the Wizard class can perform the heal method
$harry->heal();
echo $harry->health ."<br>";
// instances of the Ninja class can perform the steal method
$rain->steal();
echo $rain->stealth ."<br>";
// instances of the Samurai class can perform the sacrifice method
$tom->sacrifice();
echo $tom->health ."<br>";
echo $tom->strength ."<br>";
//overwrittern trashtalk
echo $harry->trashTalk() ."<br>";
echo $rain->trashTalk() ."<br>";
echo $tom->trashTalk() ."<br>";



?>