<?php 
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
?>