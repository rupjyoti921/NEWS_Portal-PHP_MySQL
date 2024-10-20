<?php
session_start();
include 'config.php';
error_reporting(0);
//check session
if (!isset($_SESSION['login'])) {
    echo "<script> location.href='index.php' </script>";
} else {


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
        <title>RDJR NEWS | View Post</title>

        <!-- Summernote css -->
        <link href="../plugins/summernote/summernote.css" rel="stylesheet" />

        <!-- Select2 -->
        <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- Jquery filer css -->
        <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
        <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

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
                                    <h4 class="page-title">View Post</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="dashboard.php">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#"> Posts </a>
                                        </li>
                                        <li class="active">
                                            View Post
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <?php
                        $postid = intval($_GET['pid']);
                        $query = mysqli_query($conn, "select tblposts2.PostTitle, tblposts2.PostDetails, tblposts2.PostingDate, tblposts2.UpdationDate, tblposts2.Is_Active, tblposts2.PostImage, tblposts2.PostLocation, tblcategory.CategoryName ,tblsubcategory.Subcategory, tblposts2.postedBy_idName from tblposts2 left join tblcategory on tblcategory.id=tblposts2.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts2.SubCategoryId where tblposts2.id='$postid'");
                        $row = mysqli_fetch_array($query);
                        ?>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="p-6">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th style="width:150px;">Heading</th>
                                            <th>Description</th>
                                        </thead>

                                        <tr>
                                            <td>
                                                <h4>Posted By : </h4>
                                            </td>
                                            <!-- code to show who is posted the post -->
                                            <?php
                                            $postby = $row['postedBy_idName'];
                                            if ($postby == 'admin') {
                                            ?>
                                                <td><?php echo $postby; ?></td>
                                            <?php
                                            } else {
                                                $query2 = mysqli_query($conn, "select first_name,last_name,email_add from tblreporter where id='$postby'");
                                                $result = mysqli_fetch_array($query2);
                                            ?>
                                                <td><?php echo $result['first_name'] . " " . $result['last_name'] . " (Email : " . $result['email_add'] . ")"; ?></td>
                                            <?php } ?>

                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Posting Date : </h4>
                                            </td>
                                            <td><?php echo $row['PostingDate']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Post Status : </h4>
                                            </td>
                                            <?php
                                            $status = $row['Is_Active'];
                                            ?>
                                            <td><?php if ($status == 0) { ?><p style="color:blue" ;>Pending</p><?php } else if ($status == 1 || $status == 3) { ?><p style="color:green" ;>Approved</p><?php } else { ?><p style="color:red" ;>In Trash</p><?php } ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Post Title : </h4>
                                            </td>
                                            <td><?php echo $row['PostTitle']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Post Category : </h4>
                                            </td>
                                            <td><?php echo $row['CategoryName']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Post Sub-Category : </h4>
                                            </td>
                                            <td><?php echo $row['Subcategory']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Post Location : </h4>
                                            </td>
                                            <td><?php echo $row['PostLocation']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Post Details : </h4>
                                            </td>
                                            <td><?php echo $row['PostDetails']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Post Image(s) : </h4>
                                            </td>
                                            <td>
                                                <img src="postimages/<?php echo htmlentities($row['PostImage']); ?>" width="400px" />
                                                <!-- extraction of other post images -->
                                                <?php
                                                $query3 = mysqli_query($conn, "select post_images from tbladdimage where post_id='$postid'");
                                                if (mysqli_num_rows($query3)) {
                                                    while ($row3 = mysqli_fetch_array($query3)) {
                                                ?>
                                                        </br></br>
                                                        <img src="postimages/<?php echo htmlentities($row3['post_images']); ?>" width="400px" />
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div> <!-- end p-20 -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->



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

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>
        <!-- Select 2 -->
        <script src="../plugins/select2/js/select2.min.js"></script>
        <!-- Jquery filer js -->
        <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>

        <!-- page specific js -->
        <script src="assets/pages/jquery.blog-add.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script src="../plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>



    </body>

    </html>
<?php } ?>