<?php

class MyClass
{
	public $prop1 = "I'am a public class property!";
	
	public static $count = 0;
	
	public static function plusOne()
	{
		return "The count is " . ++self::$count . ".<br />";
	}
	
	// 魔术方法，在对象被创建时自动被调用
	public function __construct()
	{
		echo 'The class "',__CLASS__,'" was initiated!<br />';
	}
	
	public function __destruct()
	{
		echo 'The class "',__CLASS__,'" was destroyed.<br />';
	}
	
	public function __toString()
	{
		echo "Using the toString method: ";
		return $this->getProperty();
	}
	
	public function setProperty($newval)
	{
		$this->prop1 = $newval;
	}
	
	public function getProperty()
	{
		return $this->prop1."<br />";
	}
}

class MyOtherClass extends MyClass
{
	public function __construct()
	{
		parent::__construct();	// 覆盖时保留被覆盖的功能
		echo "A new constructor in " . __CLASS__ . ".<br />";
	}
	
	public function newMethod()
	{
		echo "From a new method in " . __CLASS__ . ".<br />";
	}
}

$newobj = new MyOtherClass;
echo $newobj->newMethod();
echo $newobj->getProperty();

do
{
	echo MyClass::plusOne();
}while(MyClass::$count < 10);

?>