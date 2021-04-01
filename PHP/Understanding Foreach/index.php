<?php
/*Let's say that $x = [1,3,5,7]

1. What would be the output of the following code? Try to guess the output of the code before running it!*/
$x = array(1,3,5,7);
foreach($x as $key => $value)
{
  echo $key . " - " . $value ."<br />";
}
echo "<hr>";

#2. What would be the output of the following code? Try to guess the output of the code before running it!
$x = array(1,3,5,7);
foreach($x as $value)
{
  echo $value ."<br />";
}
echo "<hr>";

/*Let's now say that $x = [ "hi" => "Dojo", "awesome" => "game" ]

3. What would be the output of the following code? Try to guess the output of the code before running it!*/
$x = array("hi" => "Dojo", "awesome" => "game");
foreach($x as $key => $value)
{
  echo $key . " - " . $value ."<br />";
}
echo "<hr>";

#4. What would be the output of the following code? Try to guess the output of the code before running it!
$x = array("hi" => "Dojo", "awesome" => "game");
foreach($x as $key => $value)
{
  echo $value ."<br />";
}
echo "<hr>";

#5. What would be the output of the following code? Try to guess the output of the code before running it!
$x = array("hi" => "Dojo", "awesome" => "game");
foreach($x as $key => $value)
{
  echo $key ."<br />";
}
echo "<hr>";

#6. Okay. Now let's make it a little bit harder. What would be the output of the following code?
$x = array( array(1,3,5), array(2,4,6), array(3,6,9) );
foreach($x as $key => $value)
{
  echo "Key is {$key}<br />";
  echo "var_dumping value";
  var_dump($value);
  echo "<br />";
}
echo "<hr>";

#7. Now what about this? Again guess the output before running the code.
$x = array( array(1,3,5), array(2,4,6), array(3,6,9) );
foreach($x as $value)
{
  echo "var_dumping value";
  var_dump($value);
}
echo "<hr>";

#8. Okay. Now let's make it even harder. What would be the output of the following code?
$x = array( array("hi"=>"Dojo", "game"=>"awesome"), array("dude"=>"fun", "play"=>"what?"), array("no"=>"way", "i am"=>"confused?") );
foreach($x as $key => $value)
{
  echo "key is {$key}<br />";
  foreach($value as $key2=>$value2)
  {
    echo $key2 ." - " . $value2."<br />";
  }
}
echo "<hr>";

#9. Now what about this?
$x = array( array("hi"=>"Dojo", "game"=>"awesome"), array("dude"=>"fun", "play"=>"what?"), array("no"=>"way", "i am"=>"confused?") );
foreach($x as $y)
{
  foreach($y as $key=>$value)
  {
    echo $key ." - " . $value."<br />";
  }
}

?>