<?php
session_start();
include 'config.php';
error_reporting(0);
//check session
if (!isset($_SESSION['login'])) {
    echo "<script> location.href='index.php' </script>";
} else {

    //code to set post location
    if (isset($_POST['submit'])) {
        $postid = $_POST['postid'];
        $postlocation = $_POST['postlocation'];
        echo $postlocation;
        $result = mysqli_query($conn, "update tblposts2 set PostLocation='$postlocation' where id='$postid'");
        if ($result) {
            $msg = "Post Location updated ";
        } else {
            $error = "Something went wrong . Please try again.";
        }
    }

    //code for delete the post
    if ($_GET['pid_to_delete']) {
        $postid = intval($_GET['pid_to_delete']);
        $query = mysqli_query($conn, "update tblposts2 set Is_Active=4 where id='$postid'");
        if ($query) {
            $msg = "Post deleted ";
        } else {
            $error = "Something went wrong . Please try again.";
        }
    }
    // code for approve the post
    if ($_GET['pid_to_approve']) {
        $postid = intval($_GET['pid_to_approve']);
        // before approve check for the post location is set or not 
        $check = mysqli_query($conn, "select PostLocation from tblposts2 where id='$postid'");
        $row = mysqli_fetch_object($check);
        $pl = $row->PostLocation;
        if ($pl == NULL) {
         ?>
            <script>
                alert("Please set the Post Location before Approve!");
            </script>
         <?php
            echo "<script> location.href='pending-posts.php' </script>";
        } else {
            $query = mysqli_query($conn, "update tblposts2 set Is_Active=3 where id='$postid'");
            if ($query) {
                $msg = "Approved Successful ";
            } else {
                $error = "Something went wrong . Please try again.";
            }
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Newsportal | Pending Posts</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="../plugins/morris/morris.css">

        <!-- jvectormap -->
        <link href="../plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include('includes/topheader.php'); ?>

            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php'); ?>


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
                                    <h4 class="page-title">Pending Posts </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Posts</a>
                                        </li>
                                        <li class="active">
                                            Pending Post
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- code for message -->
                        <div class="row">
                            <div class="col-sm-6">
                                <!---Success Message--->
                                <?php if ($msg) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                    </div>
                                <?php } ?>

                                <!---Error Message--->
                                <?php if ($error) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                    </div>
                                <?php } ?>


                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">


                                    <div class="table-responsive">
                                        <table class="table table-colored table-centered table-inverse m-0">
                                            <thead>
                                                <tr>

                                                    <th>Sl_No</th>
                                                    <th>Title</th>
                                                    <th>Category</th>
                                                    <th>Post Location</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $count++;
                                                $query = mysqli_query($conn, "select tblposts2.id as postid,tblposts2.PostTitle as title,tblposts2.PostLocation as PostLocation,tblcategory.CategoryName as category from tblposts2 left join tblcategory on tblcategory.id=tblposts2.CategoryId where tblposts2.Is_Active=0 order by tblposts2.PostingDate desc");
                                                $rowcount = mysqli_num_rows($query);
                                                if ($rowcount == 0) {
                                                ?>
                                                    <tr>

                                                        <td colspan="4" align="center">
                                                            <h3 style="color:red">No record found</h3>
                                                        </td>
                                                    <tr>
                                                        <?php
                                                    } else {
                                                        while ($row = mysqli_fetch_array($query)) {
                                                        ?>
                                                    <tr>
                                                        <td><?php echo $count; ?></td>
                                                        <td style="width:30%;"> <b><?php echo htmlentities($row['title']); ?></b> <a href="view-post.php?pid=<?php echo htmlentities($row['postid']); ?>"> <b>View Post</b> </a></td>
                                                        <td><?php echo htmlentities($row['category']) ?></td>

                                                        <!-- form to set post location -->
                                                        <td>
                                                            <form method="post" class="form-inline">
                                                                <div class="form-group m-b-20">
                                                                    <select class="form-control" name="postlocation" required>
                                                                        <option value="<?php echo htmlentities($row['PostLocation']); ?>"><?php echo htmlentities($row['PostLocation']); ?></option>
                                                                        <option value="breaking">Breaking News</option>
                                                                        <option value="latest">Latest News </option>
                                                                        <option value="exclusive">Exclusive News </option>
                                                                    </select>
                                                                    <input type="hidden" value="<?php echo ($row['postid']); ?>" name="postid">
                                                                    <button class="btn btn-primary" name="submit" type="submit">Set</button>
                                                                </div>
                                                            </form>

                                                        </td>
                                                        <td><a href="add-image.php?pid=<?php echo htmlentities($row['postid']); ?>"> <button class="btn btn-primary">Add Image</button> </a>
                                                            <a href="pending-posts.php?pid_to_approve=<?php echo htmlentities($row['postid']); ?>" onclick="return confirm('Do you really want to Approve ?')"> <button class="btn btn-success">Approve</button></a>
                                                            <a href="edit-post.php?pid=<?php echo htmlentities($row['postid']); ?>"> <button class="btn btn-info">Edit</button> </a>
                                                            &nbsp;<a href="pending-posts.php?pid_to_delete=<?php echo htmlentities($row['postid']); ?>" onclick="return confirm('Do you really want to delete ?')" style="color:red" ;> <button class="btn btn-danger"> Delete </button></a> </td>
                                                    </tr>
                                            <?php $count++;
                                                        }
                                                    } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- container -->

                </div> <!-- content -->

                <?php include('includes/footer.php'); ?>

            </div>


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

        <!-- CounterUp  -->
        <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../plugins/counterup/jquery.counterup.min.js"></script>

        <!--Morris Chart-->
        <script src="../plugins/morris/morris.min.js"></script>
        <script src="../plugins/raphael/raphael-min.js"></script>

        <!-- Load page level scripts-->
        <script src="../plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../plugins/jvectormap/gdp-data.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>


        <!-- Dashboard Init js -->
        <script src="assets/pages/jquery.blog-dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>

    </html>
<?php } ?>