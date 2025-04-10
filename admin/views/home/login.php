<?php

global $title;
$contacts = getRecord('contacts', 1);
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive E-commerce App by RB.">
    <title><?= $title; ?></title>
    <link rel=icon href="<?= PATH_URL ?>public/img/<?= $contacts['favicon'] ?>" sizes="32x32">
    <!-- Custom Css -->
    <link rel="stylesheet" href="/admin/themes/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/themes/css/style.min.css">
</head>

<body class="theme-blush">
    <div class="authentication">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <form class="card auth_form" action="admin.php?controller=home&action=login" role="form" method="post">
                        <div class="header">
                            <img class="logo" src="https://cdni.iconscout.com/illustration/premium/thumb/admin-login-5146573-4297423.png" alt="">
                            <h5>Log in</h5>
                        </div>
                        <div class="body">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="E-mail Or Username..." name="email"
                                       autofocus>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="password"
                                       value="">
                                <div class="input-group-append">
                                    <span class="input-group-text"><a href="index.php?controller=forgot-password" class="forgot" title="Forgot password"><i class="zmdi zmdi-lock"></i></a></span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">LOG IN</button>
                            <div class="signin_with mt-3">
                               <p class="mb-0"><a href="index.php?controller=forgot-password"><i class="zmdi zmdi-lock"></i> Forgot password?</a></p>
                                 <p class="mb-0">or <a href="register.php">Register</a> to use</p>
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round facebook"><i class="zmdi zmdi-facebook"></i></button>
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round twitter"><i class="zmdi zmdi-twitter"></i></button>
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round google"><i class="zmdi zmdi-google-plus"></i></button>
                            </div>
                        </div>
                    </form>
                    <div class="copyright text-center">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear().toString())
                        </script>,
<span>Design: <a href="#">WebTrend</a></span><span> - Developed by <a href="#" >RB</a></span>                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="card">
                        <img src="/admin/themes/images/signin.svg" alt="Sign In" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery Core Js -->
    <script src="/admin/themes/bundles/libscripts.bundle.js"></script>
    <script src="/admin/themes/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
</body>

</html>
