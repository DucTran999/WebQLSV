<?php 
    session_start();
    if(!isset($_SESSION["Admin"]))
    {
        header("location:login.php");
    }
?>

<?php
require_once ('dbhelp.php');
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
            <li class="active"><a href="admin.php"><em class="fa fa-dashboard">&nbsp;</em> Thông báo </a></li>
            <li><a href="widgets.php"><em class="fa fa-calendar">&nbsp;</em> Lịch trình </a></li>
            <li><a href="charts.php"><em class="fa fa-bar-chart">&nbsp;</em> Biểu đồ </a></li>
            <li><a href="qlsv.php"><em class="fa label-default">&nbsp;</em> Danh sách sinh viên </a></li>
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
                <li class="active">Thông báo</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><b>THÔNG BÁO</b></h1>
                <br>_____________________________________________________________________________________________________________________________________________________________
            </div>
        </div>

<h3><b>Ngày 01/07/2020:</b></h3>
<br>
<h4><b>Theo kế hoạch đã thông báo, hệ thống qldt đã mở từ 12h ngày 01/07 để Sinh viên đăng ký TKB học kỳ Hè:</b></h4>
<b>1.Sinh viên đã đăng ký nguyện vọng học kỳ Hè:  </b>
<br>
    Thực hiện việc đăng ký theo thời gian quy định, kết thúc trước 24h ngày 05/07/2020, trong thời gian này, Sinh viên cần đăng nhập thường xuyên cho đến khi hoàn thành việc đăng ký của cá nhân. Phòng giáo vụ sẽ thường xuyên cập nhật, điều chỉnh TKB các học phần để tạo điều kiện thuận lợi tối đa cho việc đăng ký của sinh viên.
<br>
<br>
   <b>2. Sinh viên chưa đăng ký nguyện vọng học kỳ Hè:  </b> 
   <br>   Sau ngày 06/07/2020, căn cứ theo tình hình cụ thể cũng như nguyện vọng của sinh viên, Phòng Giáo vụ sẽ có Thông báo cụ thể trên trang chủ của hệ thống qldt.ptit.edu.vn; Sinh viên cần chú ý theo dõi để biết và thực hiện.
<br>
<br>
----------------------------------------------------------------------------------------------------------------------------------------------------------
<br>


<h3><b>Ngày 26/06/2020:</b></h3>
<br>
<b>Phòng Giáo vụ thông báo về việc mở các Lớp học và đăng ký Thời khóa biểu học kỳ phụ, năm học 2019-2020. Cụ thể:</b>
<br>
<b>1.Danh sách và thời khóa biểu các học phần có bố trí mở lớp, không mở lớp; danh sách các học phần được thay thế bằng học phần tương đương khác.</b>
 
<br>
Chi tiết sinh viên xem tại:  https://portal.ptit.edu.vn/giaovu/thong-bao-vv-dang-ky-thoi-khoa-bieu-cac-lop-hoc-phan-trong-hoc-ky-phu-nam-hoc-2019-2020/
<br>
<br>
<b>2.   Đối tượng, hình thức và thời gian đăng ký:</b>

<br>

- Đối tượng: Sinh viên đã đăng ký nguyện vọng học kỳ phụ năm học 2019-2020.
<br>

- Hình thức: đăng ký trực tiếp trên hệ thống QLĐT: http://qldt.ptit.edu.vn.
<br>

- Cách đăng ký: Đăng nhập hệ thống -> Đăng ký môn học -> nhập "MÃ MÔN HỌC" phù hợp ở ô "Nhập môn học" -> chọn  Tìm kiếm -> chọn THỜI KHÓA BIỂU phù hợp -> chọn LƯU.
<br>

- Thời gian: Từ 12h00 ngày 01/07/2020 (thứ 4) đến 24h00 ngày 05/07/2020 (Chủ nhật).
<br>
<br>
<b>3.   Lưu ý:</b>
<br>

- Các sinh viên không thực hiện đăng ký nguyện vọng học hè: Không được đăng ký Thời khóa biểu nêu ở mục 2. Sau ngày 05/07/2020, căn cứ vào tình hình đăng ký, Phòng Giáo vụ sẽ có thông báo hướng dẫn, xem xét giải quyết cụ thể cho các sinh viên có nhu cầu đăng ký học sau.

<br>
-  Các học phần có mở riêng nhóm cho hệ Chất lượng cao: sinh viên hệ CLC chỉ đăng ký nhóm có mã lớp E, sinh viên hệ đại trà chỉ đăng ký nhóm có mã lớp H.
<br>
-  Đối với các học phần được học thay thế bằng các học phần khác: sinh viên thực hiện việc đăng ký thời khóa biểu học phần thay thế, đồng thời làm Đơn có xác nhận của Khoa chuyên môn (theo Mẫu đơn xin học môn thay thế) và nộp tại bộ phận 1 cửa - ô số 1 – <b>Phòng giáo vụ từ ngày 01/07 đến hết ngày 10/07/2020.</b>
<br>
<br>
<h3><b>Xem Chi Tiết</b></h3>
<br>
    Bản tin cũ 
    <br> 
Thông báo: V/v Đăng ký xét tốt nghiệp đợt 1 năm 2020 (tháng 2/2020)
... (03/02/2020)
<br>
THÔNG BÁO:  V/V ĐĂNG KÝ HỌC PHẦN THỰC TẬP TỐT NGHIỆP CÁC NGÀNH KHỐI KỸ THUẬT - KHÓA 2016
... (18/06/2020)
<br>
THÔNG BÁO:    V/v ĐĂNG KÝ THI CHUẨN ĐẦU RA TIẾNG ANH ĐỢT 1 NĂM 2020
... (05/06/2020)
<br>
Thông báo:  v/v  tổ chức đăng ký khóa luận, học các học phần tốt  nghiệp các  ngành khối kinh tế, ngành truyền thông đa phương tiện - khóa 2016
... (09/04/2020)<br>


Thông báo: v/v thay đổi giảng viên/id trans của một số nhóm học phần tiếng anh

 
... (05/04/2020)
<br>

Thông báo:  v/v  rà soát thời khóa biểu và đăng ký học ghép kỳ 2 năm học 2019 - 2020
... (10/12/2019)
<br>
Thông báo V/v: Công bố Thời khóa biểu, Danh sách lớp học lại trong học kỳ 1 năm học 2019-2020... (20/11/2019)
Thông báo: V/v Mở hệ thống cho sinh viên đăng ký thi chuẩn đầu ra tiếng anh đợt 3 năm 2019
... (16/10/2019)
<br>
Thông báo: v/v hỗ trợ đăng ký học các học phần tốt nghiệp các ngành khối kỹ thuật, khóa 2015
... (24/09/2019)
<br>
Xem tất cả
    THÔNG BÁO
    
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script>
        window.onload = function () {
    var chart1 = document.getElementById("line-chart").getContext("2d");
    window.myLine = new Chart(chart1).Line(lineChartData, {
    responsive: true,
    scaleLineColor: "rgba(0,0,0,.2)",
    scaleGridLineColor: "rgba(0,0,0,.05)",
    scaleFontColor: "#c5c7cc"
    });
};
    </script>
        
</body>
</html>