<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV</title>
<?php
    ini_set('auto_detect_line_endings', true);
    $file = fopen("us-500.csv","r") or die('Unable to open the file!');

    
    $header = null;
    $data = array();
    
    while(($content = fgetcsv($file,1000,',')) !== FALSE){
        if ($header === NULL){
            $header = $content;
            continue;
        }

        $new_row = array();
        for ($i=0; $i < count($content) ; $i++) { 
            $new_row[$header[$i]] = $content[$i];
        }

        $data[] = $new_row;
    } fclose($file);
?> 
</head>
<body>
    <h1>Employee Records</h1>
         
            <?php
            foreach ($data as $key => $value) { ?>
                <h2>Record <?= $key+1 ?></h2>
                <ul>     
                    <li><?= "First Name: " . $value['first_name']; ?></li>
                    <li><?= "Last Name: " . $value['last_name']; ?></li>
                    <li><?= "Company Name: " . $value['company_name']; ?></li>
                    <li><?= "Address: " . $value['address']; ?></li>
                    <li><?= "City: " . $value['city']; ?></li>
                    <li><?= "County: " . $value['county']; ?></li>
                    <li><?= "State: " . $value['state']; ?></li>
                    <li><?= "Zip: " . $value['zip']; ?></li>
                    <li><?= "Phone1: " . $value['phone1']; ?></li>
                    <li><?= "Phone2: " . $value['phone2']; ?></li>
                    <li><?= "Email: " . $value['email']; ?></li>
                    <li><?= "Web: " . $value['web']; ?></li>
                </ul> 
            <?php } ?>    
        </ul>
</body>
</html>