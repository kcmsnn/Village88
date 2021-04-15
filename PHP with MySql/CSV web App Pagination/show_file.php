<?php
if (isset($_SESSION['uploaded'])){
    $upload_file = "uploads/".$_SESSION['file_name'];
    ini_set('auto_detect_line_endings', true);
    $file = fopen($upload_file,"r") or die('Unable to open the file!');
    
    
    $header = null;
    $data = array();
    
    while(($content = fgetcsv($file)) !== FALSE){
        if ($header === NULL){
            $header = $content;
            continue;
        }
    
        $new_row = array();
        for ($i=0; $i < count($content) ; $i++) { 
            $new_row[$header[$i]] = $content[$i];
        }
    
        $data[] = $new_row;
        $data1[] = $new_row;
    } fclose($file);
    
function paginate($array, $num_records) {
    global $data;
    $total_pages = count($array);

    //get page number from url
    if(isset($_GET["page"])) {
      $current_page = $_GET["page"];
    }
    else {
      $current_page = 1;
    }
    //count the number of pages
    $page_count = ceil($total_pages / $num_records);
    $param = ($current_page - 1) * $num_records;
    $data = array_slice($array, $param, $num_records);

    for($i = 1; $i<= $page_count; $i++) {
      $pages[] = $i;
    }
    return $pages;
} 
}
?>