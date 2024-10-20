<?php
session_start();
include 'config.php';
error_reporting(0);
//check session
if (!isset($_SESSION['login'])) {
    echo "<script> location.href='index.php' </script>";
} else {

    // Code for Forever deletion of users
    if ($_GET['action'] == 'del' && $_GET['deleteid']) {
        $id = intval($_GET['deleteid']);
        $query = mysqli_query($conn, "delete from  tbluser  where id='$id'");
        $delmsg = "User deleted";
        //echo "<script>alert('Reporter deleted.');</script>";
        //echo "<script type='text/javascript'> document.location = 'manage_reporter.php'; </script>";
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title>RDJR NEWS | Manage Users</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include('includes/topheader.php'); ?>

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
                                    <h4 class="page-title">Manage Users</h4>
                                    <ol class="breadcrumb p-0 m-0">

                                        <li>
                                            <a href="#">Users </a>
                                        </li>
                                        <li class="active">
                                            users
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        
                        <div class="row">
                            <div class="col-sm-6">

                            <?php if (isset($msg)) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                    </div>
                                <?php unset($msg); } ?>

                                <?php if ($delmsg) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Oh snap!</strong> <?php echo htmlentities($delmsg); ?>
                                    </div>
                                <?php } ?>


                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="demo-box m-t-20">
                                    
                                    <div class="table-responsive">
                                        <table class="table m-0 table-colored-bordered table-bordered-primary">
                                            <thead>
                                                <tr>
                                                    <th>Sl_No</th>
                                                    <th>Name</th>
                                                    <th>Gender</th>
                                                    <th>Phone Number</th>
                                                    <th>Email ID</th>
                                                    <th>Registration Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $cnt = 1;
                                                $query = mysqli_query($conn, "select * from  tbluser order by reg_date desc");
                                                $rowcount = mysqli_num_rows($query);
                                                if ($rowcount == 0) {
                                                ?>
                                                    <tr>
                                                        <td colspan="7" align="center">
                                                            <h3 style="color:red">No record found</h3>
                                                        </td>
                                                    </tr>
                                                    <?php } else {
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>

                                                        <tr>
                                                            <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                            <td><?php echo htmlentities($row['first_name'] . " " . $row['last_name']); ?></td>
                                                            <td><?php echo htmlentities($row['gender']); ?></td>
                                                            <td><?php echo htmlentities($row['phone_no']); ?></td>
                                                            <td><?php echo htmlentities($row['email_add']); ?></td>
                                                            <td><?php echo htmlentities($row['reg_date']); ?></td>
                                                            <td><a href="users.php?deleteid=<?php echo htmlentities($row['id']); ?>&&action=del" onclick="return confirm('Do you realy want to delete ?')"> <button type="button" class="btn btn-danger">Delete</button></a> </td>
                                                        </tr>
                                                <?php
                                                        $cnt++;
                                                    }
                                                }
                                                ?>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--- end row -->

                    </div> <!-- container -->


                </div> <!-- content -->

                <?php include('includes/footer.php'); ?>
            </div>

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

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
    </body>

    </html>
<?php } ?>