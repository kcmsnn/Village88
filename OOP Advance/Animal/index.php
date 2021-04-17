<?php
require('Animal.php');
require('Dog.php');
require('Dragon.php');
$animal = new Animal();
$dog = new Dog();
$dragon = new Dragon();
$animal->walk()->walk()->walk()->run()->run()->displayHealth('Animal');
$dog->walk()->walk()->walk()->run()->run()->pet()->displayHealth('Dog');
$dragon->walk()->walk()->walk()->run()->run()->fly()->fly()->displayHealth('Dragon');

?>