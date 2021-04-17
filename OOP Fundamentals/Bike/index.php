<?php
    include_once('bike.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike</title>
</head>
<body>
<?php   $bike1 = new bike(1000,50,0);
        $bike2 = new bike(2000,80,0);
        $bike3 = new bike(3000,120,0);
?>
<h2>Bike 1 Info</h2>
<?= $bike1->drive(); ?>
<?= $bike1->drive(); ?>
<?= $bike1->drive(); ?>
<?= $bike1->reverse(); ?>
<?= $bike1->displayInfo(); ?>
<h2>Bike 2 Info</h2>
<?= $bike2->drive(); ?>
<?= $bike2->drive(); ?>
<?= $bike2->reverse(); ?>
<?= $bike2->reverse(); ?>
<?= $bike2->displayInfo(); ?>
<h2>Bike 3 Info</h2>
<?= $bike3->reverse(); ?>
<?= $bike3->reverse(); ?>
<?= $bike3->reverse(); ?>
<?= $bike3->displayInfo(); ?>
</body>
</html>