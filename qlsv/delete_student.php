<?php
if (isset($_POST['ID'])) {
	$ID = $_POST['ID'];

	require_once ('dbhelp.php');

	$sql = 'DELETE FROM  ttsv WHERE ID = '.$ID;
	execute($sql);

	echo 'Xoá sinh viên thành công';
}