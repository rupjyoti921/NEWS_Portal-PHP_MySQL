<?php
session_start();
//Database Configuration File
include 'config.php';

if (isset($_POST['login'])) {

    // Getting username/ email and password
    $email_add = mysqli_real_escape_string($conn, trim($_POST['email_add']));
    $pass = mysqli_real_escape_string($conn, trim($_POST['password']));
    $user_pass = md5($pass);
    // Fetch data from database on the basis of username/email and password
    $sql = "SELECT id,first_name,last_name,email_add FROM tbluser WHERE email_add='$email_add' && user_pass='$user_pass'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_object($result);
        $first_name = $row->first_name;
        $last_name = $row->last_name;
        $email_add = $row->email_add;
        $user_id = $row->id;

       
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['email_add'] = $email_add;
        $_SESSION['user_id'] = $user_id;
       

        echo "<script> location.href='index.php' </script>";
    } else {
        $_SESSION['status'] = "Failed!! Wrong Credentials";
        $_SESSION['status_code'] = "error";
        $_SESSION['text'] = "Try again";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="News Portal.">
    <meta name="author" content="PHPGurukul">


    <!-- App title -->
    <title>News Portal | User Login</title>

    <!-- App css -->
    <link href="assetsForLogin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assetsForLogin/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assetsForLogin/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assetsForLogin/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assetsForLogin/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assetsForLogin/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assetsForLogin/css/responsive.css" rel="stylesheet" type="text/css" />
    <script src="assetsForLogin/js/modernizr.min.js"></script>

</head>


<body class="bg-transparent">

    <!-- HOME -->
    <section>
        <div class="container-alt">
            <div class="row">
                <div class="col-sm-12">

                    <div class="wrapper-page">

                        <div class="m-b-40 account-pages">
                            <div class="text-center account-logo-box">
                                <h2 class="text-uppercase">
                                    <a href="index.php" class="text-success">
                                        <span><img src="assetsForLogin/images/userLogin.png" alt="" height="56"></span>
                                    </a>
                                </h2>
                                <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                            </div>
                            <div class="account-content">
                                <form class="form-horizontal" method="post">

                                    <div class="form-group ">
                                        <div class="col-xs-12">
                                            <label for="email_add"><b>E-mail :</b></label>
                                            <input class="form-control" type="email" required="" name="email_add" placeholder="E-mail address" autocomplete="on">
                                        </div>
                                    </div>
                                    <!-- <a href="forgot-password.php"><i class="mdi mdi-lock"></i> Forgot your password?</a>   -->
                                    <hr>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label for="password"><b>Password :</b></label>
                                            <input class="form-control" type="password" name="password" required="" placeholder="Password" autocomplete="on">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <a href="index.php"><i class="mdi mdi-home"></i> Back Home</a> <a href="user-register.php">
                                                <div style="float:right" ;><span class="mdi mdi-account-plus"></span> Register</div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="form-group text-center">
                                        <div class="col-xs-12" style="margin-top:12px;">
                                            <button class="btn w-md btn-bordered btn-primary waves-effect waves-light" style="border-radius: 5px;" type="submit" name="login">Log In</button>
                                        </div>
                                    </div>

                                </form>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- end card-box-->

                    </div>
                    <!-- end wrapper -->

                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->

    <script>
        var resizefunc = [];
    </script>

    <!-- code for sweet alert -->
    <script src="assetsForLogin/js/sweetalert.min.js"></script>
    <?php
    if (isset($_SESSION['status']) && ($_SESSION['status'] != '')) {
    ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['status']; ?>",
                text: "<?php echo $_SESSION['text']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "Done",
                // }).then(function() {
                // window.location = "index.php";
            });
        </script>
    <?php
        unset($_SESSION['status']);
        unset($_SESSION['status_code']);
        unset($_SESSION['text']);
    }
    ?>

    <!-- jQuery  -->
    <script src="assetsForLogin/js/jquery.min.js"></script>
    <script src="assetsForLogin/js/bootstrap.min.js"></script>
    <script src="assetsForLogin/js/detect.js"></script>
    <script src="assetsForLogin/js/fastclick.js"></script>
    <script src="assetsForLogin/js/jquery.blockUI.js"></script>
    <script src="assetsForLogin/js/waves.js"></script>
    <script src="assetsForLogin/js/jquery.slimscroll.js"></script>
    <script src="assetsForLogin/js/jquery.scrollTo.min.js"></script>

    <!-- App js -->
    <script src="assetsForLogin/js/jquery.core.js"></script>
    <script src="assetsForLogin/js/jquery.app.js"></script>

</body>

</html>