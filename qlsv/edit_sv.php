<?php 
    session_start();
    if(!isset($_SESSION["Admin"]))
    {
        header("location:login.php");
    }
?>
<?php
require_once ('dbhelp.php');

$s_hoten = $s_lop = $s_nganh = $s_gender =$s_que =$s_birth =$s_MSV = '';

if (!empty($_POST)) {
	$s_ID = '';

	if (isset($_POST['hoten'])) {
		$s_hoten = $_POST['hoten'];
	}
	if (isset($_POST['gender'])) {
		$s_gender = $_POST['gender'];
	}
	if (isset($_POST['birth'])) {
		$s_birth = $_POST['birth'];
	}

	if (isset($_POST['lop'])) {
		$s_lop = $_POST['lop'];
	}

	if (isset($_POST['nganh'])) {
		$s_nganh = $_POST['nganh'];
	}
	if (isset($_POST['que'])) {
		$s_que = $_POST['que'];
	}
	if (isset($_POST['MSV'])) {
		$s_MSV = $_POST['MSV'];
	}

	if (isset($_POST['ID'])) {
		$s_ID = $_POST['ID'];
	}

	$s_hoten    = str_replace('\'', '\\\'', $s_hoten);
	$s_lop      = str_replace('\'', '\\\'', $s_lop);
	$s_nganh    = str_replace('\'', '\\\'', $s_nganh);
	$s_ID       = str_replace('\'', '\\\'', $s_ID);
	$s_birth    = str_replace('\'', '\\\'', $s_birth);
	$s_que      = str_replace('\'', '\\\'', $s_que);
	$s_MSV      = str_replace('\'', '\\\'', $s_MSV);
	$s_gender   = str_replace('\'', '\\\'', $s_gender);

	if ($s_ID != '') {
		//update
		$sql = "UPDATE ttsv SET hoten = '$s_hoten', gender = '$s_gender', birth = '$s_birth', lop = '$s_lop', nganh = '$s_nganh', que = '$s_que', MSV = '$s_MSV' WHERE ID = " .$s_ID;
	} else {
		//insert
		$sql = " INSERT INTO ttsv (hoten,gender,birth, lop, nganh,que,MSV) VALUES ('$s_hoten','$s_gender', '$s_birth', '$s_lop', '$s_nganh','$s_que','$s_MSV')";
	}

	// echo $sql;

	execute($sql);

	header('Location: qlsv.php');
	die();
}

$ID = '';
if (isset($_GET['ID'])) 
	{
	$ID          = $_GET['ID'];
	$sql         = 'SELECT * FROM ttsv WHERE ID = '.$ID;
	$studentList = executeResult($sql);

	if ($studentList != null && count($studentList) > 0) 
	{
		$std         = $studentList[0];
		$s_hoten     = $std['hoten'];
		$s_gender    = $std['gender'];
		$s_birth     = $std['birth'];
		$s_lop       = $std['lop'];
		$s_nganh     = $std['nganh'];
		$s_que       = $std['que'];
		$s_MSV       = $std['MSV'];
	} else {
		$ID = '';
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý sinh viên</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="admin.php"><span>Quản Trị</span> SINH VIÊN </a>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="admin.php">
                        <em class="fa fa-envelope"></em><span class="label label-danger">15</span>
                    </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box"><a href="profile.php" class="pull-left">
                                    <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                                    </a>
                                    <div class="message-body"><small class="pull-right">3 phút trước</small>
                                        <a href="#"><strong>John Doe</strong> bình luận<strong> ảnh của bạn</strong>.</a>
                                    <br /><small class="text-muted">1:24 pm - 7/5/2020</small></div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box"><a href="#" class="pull-left">
                                    <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                                    </a>
                                    <div class="message-body"><small class="pull-right">1 giờ trước</small>
                                        <a href="#">Một tin nhắn mới từ <strong> Jane Doe</strong>.</a>
                                    <br /><small class="text-muted">12:27 pm - 7/05/2020</small></div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="all-button"><a href="#">
                                    <em class="fa fa-inbox"></em> <strong> Hòm thư </strong>
                                </a></div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <em class="fa fa-bell"></em><span class="label label-info">5</span>
                    </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li><a href="admin.php">
                                <div><em class="fa fa-envelope"></em> 1 Tin nhắn mới
                                    <span class="pull-right text-muted small"> 3 phút trước </span></div>
                            </a></li>
                            <li class="divider"></li>
                            <li><a href="admin.php">
                                <div><em class="fa fa-heart"></em> 12 lượt yêu thích mới
                                    <span class="pull-right text-muted small">4 phút trước </span></div>
                            </a></li>
                            <li class="divider"></li>
                            <li><a href="admin.php">
                                <div><em class="fa fa-user"></em> 5 lượt theo dõi mới
                                    <span class="pull-right text-muted small">4 phút trước </span></div>
                            </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!-- /.container-fluid -->
    </nav>

 <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            <div class="profile-userpic">
                <img src="3.png" class="img-responsive" alt="">
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">AnhDuc</div>
                <div class="profile-usertitle-status"><span class="indicator label-success"></span>Trực tuyến</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
        <form role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Tìm kiếm">
            </div>
        </form>

		<ul class="nav menu">
			<li><a href="admin.php"><em class="fa fa-dashboard">&nbsp;</em> Thông báo </a></li>
			<li><a href="widgets.php"><em class="fa fa-calendar">&nbsp;</em> Lịch trình</a></li>
			<li><a href="charts.php"><em class="fa fa-bar-chart">&nbsp;</em> Biểu đồ </a></li>
			<li class="active"><a href="qlsv.php"><em class="fa label-default">&nbsp;</em> Danh sách sinh viên</a></li>
			
			<li><a href="panels.php"><em class="fa label-default">&nbsp;</em> Thông tin môn học </a></li>
            <li><a href="diem.php"><em class="fa label-default">&nbsp;</em> Bảng điểm </a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Thống kê <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <li><a class="" href="#">
                        <span class="fa fa-arrow-right">&nbsp;</span> Theo kì
                    </a></li>
                    <li><a class="" href="#">
                        <span class="fa fa-arrow-right">&nbsp;</span> Theo quý
                    </a></li>
                    <li><a class="" href="#">
                        <span class="fa fa-arrow-right">&nbsp;</span> Theo năm
                    </a></li>
				  </ul>
            </li>
            <li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Đăng xuất</a></li>
        </ul>
    </div><!--/.sidebar-->

     <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="admin.php">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active"> Sửa thông tin sinh viên</li>
            </ol>
        </div><!--/.row-->

	<div class="container">
		 <div id="page-wrapper">
            <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><b> THÊM SINH VIÊN </b></h1>
            </div>
        </div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="hoten">Họ và tên </label>
					  <input type="number" name="ID" value="<?=$ID?>" style="display: none;">
					  
					  <input required="true" type="text" class="form-control" id="hoten" name="hoten" value="<?=$s_hoten?>">
					</div>
					<div class="form-group">
					  <label for="gender">Giới tính</label>
					  <input type="text" class="form-control" id="gender" name="gender" value="<?=$s_gender?>">
					</div>
					<div class="form-group">
					  <label for="birth">Ngày sinh</label>
					  <input type="date" class="form-control" id="birth" name="birth" value="<?=$s_birth?>">
					</div>
					<div class="form-group">
					  <label for="lop">Lớp </label>
					  <input type="text" class="form-control" id="lop" name="lop" value="<?=$s_lop?>">
					</div>
					<div class="form-group">
					  <label for="nganh">Ngành</label>
					  <input type="text" class="form-control" id="nganh" name="nganh" value="<?=$s_nganh?>">
					</div>
					<div class="form-group">
					   <label for="que">Quê quán</label>
					  <input type="text" class="form-control" id="que" name="que" value="<?=$s_que?>">
					</div>
					<div class="form-group">
					  <label for="MSV">Mã SV</label>
					  <input type="text" class="form-control" id="MSV" name="MSV" value="<?=$s_MSV?>">
					</div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
