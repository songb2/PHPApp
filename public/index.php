<?php 

include_once '../sys/core/init.inc.php';

/*
* 载入1月份日历
*/
$cal = new Calendar($dbo, "2010-01-01 12:00:00");

if(is_object($cal))
{
	echo "<pre>", var_dump($cal), "</pre>";
}

?>