<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Table</title>
</head>
<?php
$table = 10;
?>
<style>
table{
    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;
}
table .color_1{
    background-color:white;
}
table .color_2{
    background-color:gray;
}
    tr td{
        border: 1px solid black;
        padding: 0px 40px;
    }

</style>
<body>
    <table>
    <?php 
    for ($i=0; $i < $table; $i++) { ?>
    <tr class = "color_<?= $i%2+1 ?>">
        <?php
        for ($j=0; $j < $table; $j++) { ?>
        <td>            
            <?php 
                if ($i == 0 && $j > 0) {
                    echo "<h2>" . $j . "</h2>";                 
                }else if ($j == 0 && $i > 0) {
                    echo "<h2>" . $i . "</h2>";                 
                }else if ($j > 0 && $i > 0) {
                    echo $i * $j;                 
                } ?>
        </td>
        <?php } ?> 
    </tr>  
    <?php } ?>    
    </table>
</body>
</html>