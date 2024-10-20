<?php
session_start();
include 'config.php';
error_reporting(0);
//check session
if (!isset($_SESSION['email_add']) && !isset($_SESSION['rep_pass'])) {
    echo "<script> location.href='index.php' </script>";
} else {

    if ($_SESSION['count'] == '0') {
        $_SESSION['status'] = "Login Successful :)";
        $_SESSION['status_code'] = "success";
        $_SESSION['text'] = "Thanks for login";
    }

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <!-- App title -->
        <title>News Portal|Reporter Dashboard</title>
        <link rel="stylesheet" href="../plugins/morris/morris.css">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/sweetalert.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="dashboard.php" class="logo"><span>NP<span>Reporter</span></span><i class="mdi mdi-layers"></i></a>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <?php include('includes/topheader.php'); ?>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php'); ?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Dashboard</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">NewsPortal</a>
                                        </li>
                                        <li>
                                            <a href="#">Reporter</a>
                                        </li>
                                        <li class="active">
                                            Dashboard
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <a href="#">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Categories Listed</p>
                                            <?php $query = mysqli_query($conn, "select * from tblcategory where Is_Active=1");
                                            $countcat = mysqli_num_rows($query);
                                            ?>

                                            <h2><?php echo htmlentities($countcat); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div>
                            </a><!-- end col -->
                            <a href="#">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="mdi mdi-layers widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Listed Subcategories</p>
                                            <?php $query = mysqli_query($conn, "select * from tblsubcategory where Is_Active=1");
                                            $countsubcat = mysqli_num_rows($query);
                                            ?>
                                            <h2><?php echo htmlentities($countsubcat); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </a>

                            <a href="#">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="mdi mdi-layers widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Pending News</p>
                                            <?php $query = mysqli_query($conn, "select * from tblposts2 where Is_Active=0 and postedBy_idName='" . $_SESSION['rep_id'] . "'");
                                            $countposts = mysqli_num_rows($query);
                                            ?>
                                            <h2><?php echo htmlentities($countposts); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </a>


                        </div>
                        <!-- end row -->

                        <div class="row">

                            <a href="trash-posts.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="mdi mdi-layers widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">APPROVED NEWS</p>
                                            <?php $query = mysqli_query($conn, "select * from tblposts2 where Is_Active=3 and postedBy_idName='" . $_SESSION['rep_id'] . "'");
                                            $countposts = mysqli_num_rows($query);
                                            ?>
                                            <h2><?php echo htmlentities($countposts); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="trash-posts.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="mdi mdi-layers widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Trash News</p>
                                            <?php $query = mysqli_query($conn, "select * from tblposts2 where Is_Active=4 || Is_Active=5 and postedBy_idName='" . $_SESSION['rep_id'] . "'");
                                            $countposts = mysqli_num_rows($query);
                                            ?>
                                            <h2><?php echo htmlentities($countposts); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div>
                            </a>

                            <!-- <a href="trash-posts.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="mdi mdi-layers widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Total Comments</p>
                                            <?php //$query = mysqli_query($conn, "select tblposts2.PostTitle as title,tblcomments.name as user_name,tblcomments.email as user_email, tblcomments.comment as user_comment, tblcomments.postingDate as pdate from tblposts2 left join tblcomments on tblcomments.postId=tblposts2.id  where tblcomments.status=1 &&  tblposts2.postedBy_idName='" . $_SESSION['rep_id'] . "'");
                                            //$countposts = mysqli_num_rows($query);
                                            ?>
                                            <h2><?php //echo htmlentities($countposts); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div>
                            </a> -->
                        </div>

                    </div> <!-- container -->

                </div> <!-- content -->

                <?php include('includes/footer.php'); ?>

            </div>
            <?php
            // <!-- code for sweet alert -->
            // if(isset($_SESSION['status'])){
            if ($_SESSION['count'] == '0') {
            ?>
                <script>
                    swal({
                        title: "<?php echo $_SESSION['status']; ?>",
                        text: "<?php echo $_SESSION['text']; ?>",
                        icon: "<?php echo $_SESSION['status_code']; ?>",
                        button: "Done",
                    });
                </script>
            <?php
                unset($_SESSION['status']);
                unset($_SESSION['status_code']);
                unset($_SESSION['text']);
                unset($_SESSION['count']);
            }
            ?>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->



        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>




        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- Counter js  -->
        <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../plugins/counterup/jquery.counterup.min.js"></script>

        <!--Morris Chart-->
        <script src="../plugins/morris/morris.min.js"></script>
        <script src="../plugins/raphael/raphael-min.js"></script>

        <!-- Dashboard init -->
        <script src="assets/pages/jquery.dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>

    </html>
<?php } ?>