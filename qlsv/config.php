<?php
	define('HOST', 'localhost');
	define('DATABASE','qlsv');
	define('USERNAME','root');
	define("PASSWORD", '');
	
	$conn = mysqli_connect("localhost","root","","qlsv");
	mysqli_set_charset($conn,"utf8");
?>