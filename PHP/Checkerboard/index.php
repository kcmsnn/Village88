<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Checker Board</title>
<?php
    $board_size = 10;
?>
</head>
<body>
    <div class="board1">
        <?php
        for ($i=0; $i < $board_size; $i++) { ?>
            <div>
            <?php
                for ($j=0; $j < $board_size; $j++) { ?>
                    <div class="color_<?= ($j+$i)%2+1 ?>"></div>
            <?php } ?>
            </div>
        <?php } ?>          
    </div>
    <div class="board2">
        <?php
        for ($i=0; $i < $board_size; $i++) { ?>
            <div>
            <?php
                for ($j=0; $j < $board_size; $j++) { ?>
                    <div class="color1_<?= ($j+$i)%2+1 ?>"></div>
            <?php } ?>
            </div>
        <?php } ?>            
    </div>
</body>
</html>