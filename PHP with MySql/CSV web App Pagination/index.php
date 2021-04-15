<?php
session_start();
include_once('show_file.php');
$result_per_page = 50;


if (isset($_SESSION['uploaded'])) {
    $pages = paginate($data,50);
    if (!isset($_GET['page'])) {
        $page = 1;
      } else {
        $page = $_GET['page'];
      }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>CSV Pagination</title>
</head>
<body>

<div class="container">
    <form action="process.php" method="post" enctype="multipart/form-data">
        <label for="upload_csv"> Upload CSV file here:</label>
        <input type="file" name="upload_csv" id="upload_csv">
        <input type="submit" value="submit" name="submit">
    </form>
<?php   if (isset($_SESSION['uploaded'])) {?>
    <div class='records'>
    <table>
        <thead>
            <tr>
                <th>Record No.</td>
<?php   for ($i=0; $i < count($header); $i++) { ?>
                <th class="<?= $header[$i] ?>"><?= $header[$i];?></td>
<?php   } ?> 
            </tr>
        </thead>
    <?php   foreach ($data as $key => $value) { ?>                     
                <tr class="color<?=$key%2;?>">
                    <td class="no"><?= $key+1; ?></td>
                    <td><?= $value['first_name']; ?></td>
                    <td><?= $value['last_name']; ?></td>
                    <td><?= $value['company_name']; ?></td>
                    <td><?= $value['address']; ?></td>
                    <td><?= $value['city']; ?></td>
                    <td><?= $value['county']; ?></td>
                    <td><?= $value['state']; ?></td>
                    <td><?= $value['zip']; ?></td>
                    <td><?= $value['phone1']; ?></td>
                    <td><?= $value['phone2']; ?></td>
                    <td><?= $value['email']; ?></td>
                    <td><?= $value['web']; ?></td>
                </tr>          
<?php       } 
$number_of_pages = ceil(count($data1)/$result_per_page);?>     
    </table>
    </div>
<?php   } ?>  
<?php   if (isset($_SESSION['uploaded'])){
            for ($i=1;$i <= $number_of_pages; $i++){ ?>
              <a href="index.php?page=<?=$i?>"><?=$i?></a>
<?php       } ?>
<?php } ?>
</div>      
</body>
</html>
