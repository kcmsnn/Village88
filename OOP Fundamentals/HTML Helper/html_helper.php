<?php
class HTML_helper{

    public $table_array = array();
    public $select_array = array();



    public function print_table($table_array){
        echo "<table>";
        foreach ($table_array as $key => $value) {
            echo "<tr>";
            $string = "<td>" . $key . "</td>";
            $string = strtr($string, '_', ' ');
            echo $string;
            echo "<td>" . $value . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function print_select($name,$select_array){
        echo "<select name = '" . $name . "'>";
        foreach ($select_array as $value) {
            echo "<option value ='" . $value . "'>".$value."</option>";
        }
        echo "</select>";
    }
}

$helper = new HTML_helper();
$helper->table_array['first_name'] =  'Michael';
$helper->table_array['last_name'] =  'Choi';
$helper->table_array['nick_name'] =  'Senpai';
$helper->select_array = ['CA', 'WA', 'UT', 'TX', 'AZ', 'NY'];
$helper->print_table($helper->table_array);
$helper->print_select("state",$helper->select_array);

?>