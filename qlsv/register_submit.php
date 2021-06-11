<?php
	session_start();
	include 'config.php';
	
	if(isset($_POST['submit']) && $_POST["username"] !='' && $_POST["password"] !='' && $_POST["repassword"] !='' && $_POST["position"] !='')
	{
		$username   = $_POST["username"];
		$password   = $_POST["password"];
		$repassword = $_POST["repassword"];
		$position   = $_POST["position"];

			if ($password != $repassword) 
			{
				$_SESSION["thongbao"] = "Mật khẩu nhập lại không chính xác";
				header("location:dangki.php");
				die();
			}

			$sql =" SELECT * FROM user WHERE username ='$username'";
			$old = mysqli_query($conn,$sql);
			$password = md5($password);
			
			if (mysqli_num_rows($old) > 0)
			{
				$_SESSION["thongbao"] ="Tên tài khoản đã tồn tại";
				header("location:register.php");
				die();
			}
			$sql = "INSERT INTO user(username,password,position) VALUES ('$username','$password',$position)";
			mysqli_query($conn,$sql);
			$_SESSION["thongbao"] ="Đã đăng kí thành công";
			header("location:register.php");
	
	}
	else
	{
		$_SESSION["thongbao"] = " Vui Lòng nhập đầy đủ thông tin!";
		header("location:dangki.php");
	}

?>