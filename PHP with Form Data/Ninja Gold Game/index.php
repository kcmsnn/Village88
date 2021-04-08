<?php
session_start();
if (empty($_SESSION)) { 
    $_SESSION['log'] = NULL;
    $_SESSION['gold'] = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ninja Gold Game</title>
</head>
<body>
    <div class='container'>
        <h2>Your Gold: </h2>
        <h2 class = 'gold-counter'><?= $_SESSION['gold'];?></h2>
        <div class='building-container'>
            <div class='farm-building'>
                <h3>Farm</h3>
                <p>(earns 10-20 golds)</p>
                <form action="process.php" method="post">
                    <input type="hidden" name="building" value="farm" />
                    <input type="submit" value="Find Gold!"/>
                </form>
            </div>
            <div class='cave-building'>
                <h3>Cave</h3>
                <p>(earns 5-10 golds)</p>
                <form action="process.php" method="post">
                    <input type="hidden" name="building" value="cave" />
                    <input type="submit" value="Find Gold!"/>
                </form>
            </div>
            <div class='house-building'>
                <h3>House</h3>
                <p>(earns 2-5 golds)</p>
                <form action="process.php" method="post">
                    <input type="hidden" name="building" value="house" />
                    <input type="submit" value="Find Gold!"/>
                </form>
            </div>
            <div class='casino-building'>
                <h3>Casino</h3>
                <p>(earns/takes 0-50 golds)</p>
                <form action="process.php" method="post">
                    <input type="hidden" name="building" value="casino" />
                    <input type="submit" value="Find Gold!"/>
                </form>
            </div>
        </div>
        <h2>Activities</h2>
        <div class='activities-box'>
            <?php
            if (!empty($_SESSION['log']) ) {
                foreach ($_SESSION['log'] as $key => $value) { ?>
                    <p><?= $value; ?></p>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</body>
</html>