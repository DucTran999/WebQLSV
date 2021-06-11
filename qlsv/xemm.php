<?php 
    session_start();
    if(!isset($_SESSION["user"]))
    {
        header("location:login.php");
    }
?>

<?php 
require_once('dbhelp.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sinh viên Ptit</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles1.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Quản lý đào tạo</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="sinhvien.php">Trang chủ</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="hocphan.php">Đăng kí học phần</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="xemd.php">Xem điểm</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="contact.php">Liên hệ</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="logout.php">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <br>
        <br>
        <br>
            <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <br>
                <br>
                <br>
                <h1>Đăng kí môn học</h1>
                <form method="get">
                    <input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm theo tên">
                </form>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã môn học</th>
                            <th>Tên môn học</th>
                            <th>Số tín chỉ</th>
                            <th>Đăng kí</th>

                        </tr>
                    </thead>
                    <tbody>

<?php
if (isset($_GET['s']) && $_GET['s'] != '') {
    $sql = ' SELECT * FROM  dkhp where mon like "%'.$_GET['s'].'%"';
} else {
    $sql = ' SELECT * FROM dkhp';
}

$studentList = executeResult($sql);

$index = 1;

foreach ($studentList as $std) 
{
    if($std['id_user']==2)
    {
    echo '<tr>
            <td>'.($index++).'</td>
            <td>'.$std['mon'].'</td>
            <td>'.$std['ma'].'</td>
            <td>'.$std['tin'].'</td>

            <td><button class="btn btn-info" onclick=\'window.open("xdk.php?id='.$std['id'].'","_self")\'>Đăng kí</button></td>
        </tr>';
    }
}

?>
	
            </div>
        </div>
    </div>


</div>

</body>
</html>