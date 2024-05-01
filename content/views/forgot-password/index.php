<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<link rel=icon href="<?=PATH_URL?>public/img/favicon-chikoi-quan.png" sizes="32x32">
<title>:: Forgot password ::</title>
<!-- Custom Css -->
<link rel="stylesheet" href="admin/themes/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="admin/themes/css/style.min.css">    
</head>
<body class="theme-blush">
<div class="authentication">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <form class="card auth_form" method="POST" role="form" action="index.php?controller=forgot-password&amp;action=request">
                    <div class="header">
                        <img class="logo" src="admin/themes/images/logo.svg" alt="">
                       <h5>Forgot password?</h5>
                         <span>Enter your email address below to reset your password..</span>
                    </div>
                    <div class="body">
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" name="email" placeholder="Enter Email" autofocus>
                             <div class="input-group-append">
                                 <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                             </div>
                         </div>
                         <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Confirm</button>                 
                    </div>
                </form>
                <div class="copyright text-center">
                    &copy;
                    <script>document.write(new Date().getFullYear().toString())</script>,
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <img src="admin/themes/images/signin.svg" alt="Forgot Password"/>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Jquery Core Js -->
<script src="admin/themes/bundles/libscripts.bundle.js"></script>
<script src="admin/themes/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
</body>
</html>
