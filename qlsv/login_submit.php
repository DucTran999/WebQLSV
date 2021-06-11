<?php
	session_start();
	include 'config.php';
	require_once ('dbhelp.php');
	require('Classes/PHPExcel.php');


	if (isset($_POST["submit"])&& $_POST["username"] !='' && $_POST["password"]!='')
	{
		$username = $_POST["username"];
		$password = $_POST["password"];
		$password = md5($password);

		
		$user = $conn-> query(" SELECT * FROM user WHERE username ='$username' AND password ='$password'") ;

		if(mysqli_num_rows($user) > 0 )
		{	
			$row = mysqli_fetch_array($user);		
			$_SESSION["user"] = $row['username'];
			if($row['position']== 1)
			{
				$_SESSION['Admin'] = $row['username'];
				header("location:admin.php");
			}
			else
			{
				header("location:sinhvien.php");
			}
		}
		
		else
		{
		$_SESSION["thongbaoa"] = "Nhập sai tài khoản hoặc mật khẩu";
		header("location:login.php");
		}
	}
	else
	{
		$_SESSION["thongbaoa"] = "Vui lòng nhập đầy đủ thông tin";
		header("location:login.php");
	}
?>