<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo base_url(); ?>">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- title and favicon image -->
    <title>
        <?php
        if (!empty($website_title)) {
            echo $website_title;
        } else {
            echo "yumcraft";
        }
        ?>
    </title>

    <link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/logo_info/<?php if (!empty($logo_favicon)) {
                                                                                    echo $logo_favicon->manages_pages_favicon;
                                                                                } ?>">


    <link href="admin_assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="admin_assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="admin_assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="admin_assets/css/style.css" rel="stylesheet" type="text/css">




    <!-- my links -->

    <!-- Toaster Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

    <style>
        .error {
            color: red;
        }
    </style>


    <script>
        function login_failed_error_email_toaster() {
            iziToast.error({
                title: "Failed",
                message: "To Login enter valid Email.",
                timeout: 3000,
                position: "topRight",
                theme: "black",
                color: "red",
                backgroundColor: "#ff0000",
                messageColor: "white",
                titleColor: "white",
                progressBarColor: 'black',

            });
        }


        function login_failed_error_password_toaster() {
            iziToast.error({
                title: "Failed",
                message: "To Login enter valid Password.",
                timeout: 3000,
                position: "topRight",
                theme: "black",
                color: "red",
                backgroundColor: "#ff0000",
                messageColor: "white",
                titleColor: "white",
                progressBarColor: 'black',

            });
        }
    </script>

</head>

<body>



    <?php

    if (isset($_SESSION['failed_login_email'])) {
        unset($_SESSION['failed_login_email']);
        echo "<script> login_failed_error_email_toaster(); </script>";
    }


    if (isset($_SESSION['failed_login_password'])) {
        unset($_SESSION['failed_login_password']);
        echo "<script> login_failed_error_password_toaster(); </script>";
    }

    ?>







    <!-- Background -->
    <div class="account-pages"></div>
    <!-- Begin page -->
    <div class="wrapper-page">

        <div class="card">
            <div class="card-body">

                <h3 class="text-center m-0">
                    <a href="login" class="logo logo-admin"><img src="<?php echo base_url(); ?>uploads/logo_info/<?php echo $logo_info->manages_pages_logo; ?>" height="80" alt="logo"></a>
                </h3>

                <div class="p-3">
                    <h4 class="text-muted font-18 m-b-5 text-center">Welcome Back !</h4>
                    <p class="text-muted text-center">Sign in to continue to Yumcraft.</p>

                    <form id="admin_login_validation" action="<?php echo base_url(); ?>login_logic" method="post" class="form-horizontal m-t-30">

                        <div class="form-group">
                            <label for="email">Username</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                        </div>

                        <div class="form-group row m-t-20">
                            <div class="col-6" style="margin-left:17rem;">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log
                                    In</button>
                            </div>
                        </div>

                        <!-- <div class="form-group m-t-10 mb-0 row">
                            <div class="col-12 m-t-20">
                                <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot
                                    your password?</a>
                            </div>
                        </div> -->
                    </form>
                </div>

            </div>
        </div>

        <!-- <div class="m-t-40 text-center">
            <p class="text-white-50">Don't have an account ? <a href="pages-register.html" class="text-white"> Signup
                    Now </a> </p>
            <p class="text-muted">© 2018 Agroxa. Crafted with <i class="mdi mdi-heart text-primary"></i> by Themesbrand
            </p>
        </div> -->

    </div>

    <!-- END wrapper -->





    <!-- jQuery  -->
    <script src="admin_assets/js/jquery.min.js"></script>
    <script src="admin_assets/js/bootstrap.bundle.min.js"></script>
    <script src="admin_assets/js/metisMenu.min.js"></script>
    <script src="admin_assets/js/jquery.slimscroll.js"></script>
    <script src="admin_assets/js/waves.min.js"></script>

    <script src="admin_assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

    <!-- App js -->
    <script src="admin_assets/js/app.js"></script>




    <!-- my links -->






    <!-- Own backend links -->
    <!-- Own backend links -->

   <!-- jquery validation links own ad -->
   <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <!-- my script -->
    <script src="<?php echo base_url(); ?>admin_assets/js/admin_dynamic.js"></script>






</body>

</html>