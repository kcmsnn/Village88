<?php
class MyBaseClass
{
    public function __construct($instance)
    {
        echo "I am called for object: " . $instance;
    }
    protected $base_property = "I am a base property!  woohoo.";
    public function set_the_property($prop_value)
    {
        $this->base_property = $prop_value;         //  I can always see/set all my own attributes
    }
}
class MyChildClass extends MyBaseClass
{
    public function directly_set_property($prop_value)
    {
        // 'protected' makes $base_property available to child classes.
        $this->base_property = $prop_value;    // Yes, works nicely.  
    }
}
$base = new MyBaseClass('base');
$child = new MyChildClass('child'); 
// 'protected' makes $base_property unavailable, except within self or child classes.
$base->base_property = 86;                    // Nope!  This will cause an error
$child->base_property = 68;                   // Nope!  This will cause an error
// Instead call 'public' method set_the_property(), which has access to the protected attribute
$base->set_the_property(42);                 // Yes!  This will work wondrously
$child->set_the_property(42);                // Yes!  Wow! -- works wonderfully
// Or you can call a public method on the subclass -- it can see the protected attribute as well
$base->directly_set_the_property(86);       // Fail!  MyBaseClass doesn't contain a method by this name!
$child->directly_set_the_property(42);      // Yes!  Wow! -- works wonderfully


?>