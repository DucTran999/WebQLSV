<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng kí</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

</head>
<body>
    
    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                <form action="register_submit.php" method="POST" accept-charset="utf-8">
                <form class="login100-form validate-form flex-sb flex-w" >
                    <span class="login100-form-title p-b-53">
                        ĐĂNG KÍ
                    </span>
                    <p>
                        
                    <?php 
                    if(isset($_SESSION["thongbao"]))
                    {
                        echo $_SESSION["thongbao"];
                        session_unset();
                    }

                    ?>
                    </p>
                    <div class="p-t-31 p-b-9">
                        <span class="txt1">
                            Tài khoản
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Phải nhập tài khoản">
                        <input class="input100" type="text" name="username" placeholder="Tài khoản" >
                        <span class="focus-input100"></span>
                    </div>
                    
                    <div class="p-t-13 p-b-9">
                        <span class="txt1">
                            Mật khẩu
                        </span>
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Phải nhập mật khẩu">
                        <input class="input100" type="password" name="password" placeholder="Mật khẩu" >
                        <span class="focus-input100"></span>
                    </div>

                    <div class="p-t-13 p-b-9">
                        <span class="txt1">
                            Nhập lại mật khẩu
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Phải nhập mật khẩu">
                        <input class="input100" type="password" name="repassword" placeholder="Nhập lại mật khẩu" >
                        <span class="focus-input100"></span>
                    </div>

                    <div class="p-t-13 p-b-9">
                        <span class="txt1">
                            Loại tài khoản
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Phải nhập mật khẩu">
                        <input class="input100" type="int" name="position" >
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-17">
                        <button class="login100-form-btn" type="submit" name="submit">
                        Đăng kí!
                        </button>       
                    </div>

                    <div class="w-full text-center p-t-55">
                        <span class="txt2">
                        Đã có tài khoản 
                        </span>

                        <a href="login.php" class="txt2 bo1">
                        Đăng nhập ngay!
                        </a>
                    </div>
                </form> 
                </form>
            </div>
        </div>
    </div>
    

    <div id="dropDownSelect1"></div>
    
<!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
</html>