<?php
session_start();
include 'config.php';
error_reporting(0);
//check session
if (!isset($_SESSION['login'])) {
    echo "<script> location.href='index.php' </script>";
} else {

    // code for restore the post by making is active is 1 
    if ($_GET['action'] = 'restore' && $_GET['pid']) {
        $postid = intval($_GET['pid']);
        $query = mysqli_query($conn, "update tblposts2 set Is_Active=1 where id='$postid'");
        if ($query) {
            $msg = "Post restored successfully to manage section";
        } else {
            $error = "Something went wrong . Please try again.";
        }
    }


    // Code for Forever deletion of post
        if ($_GET['presid'] && $_GET['pid']) {
        $id = intval($_GET['presid']);
        // code for get the name of the image to delete
        $query2 = mysqli_query($conn, "select PostImage from tblposts2 where id='$id'");
        $row2=mysqli_fetch_array($query2);
        $file=$row2['PostImage'];

         // code to delete post and image from floder
        $query = mysqli_query($conn, "delete from  tblposts2  where id='$id'");
        if($query){
            unlink('postimages/'.$file);
            $delmsg = "Post deleted forever";
        }else{
            $error = "Something went wrong . Please try again.";
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
        <title>RDJR NEWS | Admin's Trashed</title>

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
                                    <h4 class="page-title">Admin's Trashed Posts </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="dashboard.php">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Posts</a>
                                        </li>
                                        <li class="active">
                                        Admin's Trashed Posts
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
                                <div class="col-sm-12">
                                    <div class="card-box">


                                        <div class="table-responsive">
                                            <table class="table table-colored table-centered table-inverse m-0">
                                                <thead>
                                                    <tr>

                                                        <th>Sl_No</th>
                                                        <th>Title</th>
                                                        <th>Category</th>
                                                        <th>Subcategory</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $count = 1;
                                                    $query = mysqli_query($conn, "select tblposts2.id as postid,tblposts2.PostTitle as title,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory from tblposts2 left join tblcategory on tblcategory.id=tblposts2.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts2.SubCategoryId where tblposts2.Is_Active=2 and tblposts2.postedBy_idName='admin' order by tblposts2.UpdationDate desc");
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
                                                            <td style="width:50%;"> <b><?php echo htmlentities($row['title']); ?></b> <a href="view-post.php?pid=<?php echo htmlentities($row['postid']); ?>"> <b>View Post</b> </a></td>
                                                            <td><?php echo htmlentities($row['category']) ?></td>
                                                            <td><?php echo htmlentities($row['subcategory']) ?></td>

                                                            <td>
                                                                <a href="admin-trash.php?pid=<?php echo htmlentities($row['postid']); ?>&&action=restore" onclick="return confirm('Do you really want to restore ?')"> <button class="btn btn-success">Restore</button> </a>
                                                                &nbsp;
                                                                <a href="trash-posts.php?presid=<?php echo htmlentities($row['postid']); ?>&&action=perdel" onclick="return confirm('Do you really want to delete ?')"> <button class="btn btn-danger">Permanently Delete</button> </a>
                                                            </td>
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