<?php

if (isset($_POST['id'])) 
{
	$id = $_POST['id'];

	require_once ('dbhelp.php');

	$sql = 'DELETE FROM  dkhp WHERE id = '.$id;
	
	execute($sql);

	echo 'Đã hủy đăng kí';
}