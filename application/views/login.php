<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>UD. MEBEL ANUGERAH JAYA</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/Satu.png')?>">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo base_url('assets/login/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/login/css/owl.carousel.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/login/css/magnific-popup.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/login/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/login/css/themify-icons.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/login/css/nice-select.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/login/css/flaticon.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/login/css/gijgo.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/login/css/animate.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/login/css/slicknav.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/login/css/style.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/login/css/Pin.css')?>">
</head>
<body>

	<!-- form itself end-->
    <form id="test-form" class="limiter" action="<?php echo base_url('Login/aksi_login'); ?>" method="post">
        <div class="loginform">
          <div class="login_inner">
                <div class="logo text-center">
                    <a href="#">
                        <img src="<?php echo base_url('assets/images/laci.Jpg')?>" alt="" height="180" weight="150">
                    </a>
                </div>
                <h3><center>ANJAYA</center></h3>
                <form>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <input type="text" placeholder="Username" name="username" value="<?php echo set_value('username')?>">
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="Password" name="password" placeholder="Masukkan Password" value="<?php echo set_value('password')?>">
                        </div>
                        <div class="col-xl-12">
                            <input type="submit" class="boxed_btn_green" id="tombol" value="Login"></input>
                        </div>
                    </div>
                </form>
              </div>
        </div>
    </form>
    <!-- form itself end -->

</body>
</html>