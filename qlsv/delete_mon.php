<?php
if (isset($_POST['id'])) {
	$id = $_POST['id'];

	require_once ('dbhelp.php');

	$sql = 'DELETE FROM  mon WHERE id = '.$id;
	execute($sql);

	echo 'Xoá môn học thành công';
}