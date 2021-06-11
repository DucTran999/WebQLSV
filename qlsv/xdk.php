<?php 
    session_start();
    if(!isset($_SESSION["user"]))
    {
        header("location:login.php");
    }
?>

<?php
require_once ('dbhelp.php');

$s_id_user = $s_mon = $s_ma = $s_tin= '';

if (!empty($_POST)) {
    $s_id = '';

    if (isset($_POST['ma'])) {
        $s_ma = $_POST['ma'];
    }
    if (isset($_POST['mon'])) {
        $s_mon = $_POST['mon'];
    }
    if (isset($_POST['tin'])) {
        $s_stin = $_POST['tin'];
    }

    if (isset($_POST['id'])) {
        $s_id = $_POST['id'];
    }
      if (isset($_POST['id_user'])) {
        $s_id_user = $_POST['id_user'];
    }

    $s_ma         = str_replace('\'', '\\\'', $s_ma);
    $s_mon       = str_replace('\'', '\\\'', $s_mon);
    $s_tin        = str_replace('\'', '\\\'', $s_tin);
    $s_id         = str_replace('\'', '\\\'', $s_id);
    $s_id_user    = str_replace('\'', '\\\'', $s_id_user);
    

       if ($s_id != '') 
    {
        //update
        $sql = "UPDATE dkhp SET id_user = '$s_id_user', mon = '$s_mon' , ma = '$s_ma',tin = '$s_tin' WHERE id = " .$s_id;
   
    } else {
        //insert
        $sql = " INSERT INTO dkhp (id_user,mon,ma,tin) VALUES ('$s_id_user','$s_mon', '$s_ma', '$s_tin')";
    }

    execute($sql);

    header('Location: hocphan.php');
    die();
}

    $id = '';

    if (isset($_GET['id'])) 
    {
    $id          = $_GET['id'];
    $sql         = 'SELECT * FROM dkhp WHERE id = '.$id;
    $monList = executeResult($sql);

    if ($monList != null && count($monList) > 0) 
    {
        $sjt        = $monList[0];
        $s_id_user  = $sjt['id_user'];
        $s_mon      = $sjt['mon'];
        $s_ma       = $sjt['ma'];
        $s_tin      = $sjt['tin'];

    } else {
        $id = '';
    }
}

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
                <h1>Xem thông tin môn học</h1>

             <div class="panel-body">
                <form method="post">
                    <div class="form-group">
                      <label for="id_user"> Mã sinh viên </label>
                      <input type="text" name="id" value="<?=$id?>" style="display: none;">
                      <input required="true" type="text" class="form-control" id="id_user" name="id_user" placeholder="Mã sinh viên của bạn" value="<?=$s_id_user?>">
                    </div>
                    <div class="form-group">
                      <label for="mon"> Môn </label>
                      <input type="text" class="form-control" id="mon" name="mon" placeholder=" Tên môn học" value="<?=$s_mon?>">
                    </div>
                    <div class="form-group">
                      <label for="ma"> Mã môn học</label>
                      <input type="text" class="form-control" id="ma" name="ma" placeholder=" Mã môn học" value="<?=$s_ma?>">
                    </div>
                    <div class="form-group">
                      <label for="cc"> Tín </label>
                      <input type="int" class="form-control" id="tin" name="tin" placeholder=" Số tín chỉ " value="<?=$s_tin?>">
                    </div>
                    
                    <button class="btn btn-success">Lưu</button>
                    <button class="btn btn-info" onclick="window.open('hocphan.php', '_self')">Về trang quản lý</button>
                </form>
            </div>
        </div>
    </div>
                        
</body>
</html>
