<!DOCTYPE html>
<!--
BeyondAdmin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 1.6.0
Purchase: https://wrapbootstrap.com/theme/beyondadmin-adminapp-angularjs-mvc-WB06R48S4
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<!--Head-->

<head>
    <meta charset="utf-8" />
    <title>Login Page</title>

    <meta name="description" content="login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/template/assets/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="/template/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="/template/" rel="stylesheet" />
    <link href="/template/assets/css/font-awesome.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;1,300;1,400&display=swap" rel="stylesheet">

    <!--Beyond styles-->
    <link href="/template/assets/css/beyond.min.css" rel="stylesheet" />
    <link href="/template/assets/css/demo.min.css" rel="stylesheet" />
    <link href="/template/assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="/template/" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="/template/assets/js/skins.min.js"></script>
</head>
<!--Head Ends-->
<!--Body-->

<body>
    <div class="login-container animated fadeInDown">

        <?php if (session('error')) : ?>
            <div class="alert alert-danger fade in radius-bordered alert-shadowed">
                <button class="close" data-dismiss="alert">
                    ×
                </button>
                <i class="fa-fw fa fa-times"></i>
                <strong>Error!</strong> <?= session('error') ?>
            </div>
        <?php endif; ?>

        <div class="loginbox bg-white">
            <div class="loginbox-title">SIGN IN</div>
            <form action="/auth/login" method="post">
                <div class="loginbox-textbox">
                    <input type="text" class="form-control" name="username" placeholder="Username" required />
                </div>
                <div class="loginbox-textbox">
                    <input type="password" class="form-control" name="password" placeholder="Password" required />
                </div>
                <div class="loginbox-submit">
                    <input type="submit" class="btn btn-primary btn-block" value="Login">
                </div>
            </form>
        </div>
    </div>

    <!--Basic Scripts-->
    <script src="/template/assets/js/jquery.min.js"></script>
    <script src="/template/assets/js/bootstrap.min.js"></script>
    <script src="/template/assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="/template/assets/js/beyond.js"></script>


</body>
<!--Body Ends-->

</html>