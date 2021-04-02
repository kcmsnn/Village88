<?php
 header('Content-type: text/javascript');
?>

$(document).ready(function(){

 x = Math.floor((Math.random()*3));
 console.log(x);
 if(x == 0){
  alert('35 x 2 = 70');
 }else if(x == 1 || x == 2 || x == 3){
  alert('13 x 5 = 65');
 }
});
