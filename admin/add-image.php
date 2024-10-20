<?php
session_start();
include 'config.php';
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['update'])) {
        $postid=$_POST['postid'];
        $imgfile = $_FILES["postimage"]["name"];
        // get the image extension
        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
        // allowed extensions
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        // Validation for allowed extensions .in_array() function searches an array for a specific value.

        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {

            //rename the image file
            $imgnewfile = md5($imgfile) . $extension;
            // Code for move image into directory
            move_uploaded_file($_FILES["postimage"]["tmp_name"], "postimages/" . $imgnewfile);


            $query = mysqli_query($conn, "insert into tbladdimage(post_id,post_images) values('$postid','$imgnewfile')");
            if ($query) {
                $msg = "Post Feature Image uploaded ";
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
        <title>RDJR NEWS | Add Image</title>

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
                                    <h4 class="page-title">Add Image </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="dashboard.php">Admin</a>
                                        </li>
                                        <li>
                                            <a href="add-post.php"> Posts </a>
                                        </li>
                                        <li>
                                            <a href="edit-post.php"> Add Image</a>
                                        </li>
                                        <li class="active">
                                            Add Image
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

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
                        <form>
                            <?php
                            $postid = intval($_GET['pid']);
                            $query = mysqli_query($conn, "select PostImage,PostTitle from tblposts2 where id='$postid' ");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="p-6">
                                            <div class="">
                                                <form name="addpost">
                                                    <div class="form-group m-b-20">
                                                        <label for="exampleInputEmail1">Post Title</label>
                                                        <input type="text" class="form-control" id="posttitle" value="<?php echo htmlentities($row['PostTitle']); ?>" name="posttitle" readonly>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="card-box">
                                                                <h4 class="m-b-30 m-t-0 header-title"><b>Current Post Image(s)</b></h4>
                                                                <img src="postimages/<?php echo htmlentities($row['PostImage']); ?>" width="300" />
                                                                <br />

                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>

                                                <!-- code for previous images from add_image table -->
                                                <?php
                                                $postid = intval($_GET['pid']);
                                                $query1 = mysqli_query($conn, "select post_images from tbladdimage where post_id='$postid' ");
                                                if (mysqli_num_rows($query1) > 0) {
                                                   
                                                ?>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <?php  while ($row1 = mysqli_fetch_array($query1)) { ?>
                                                                <div class="card-box">
                                                                  <img src="postimages/<?php echo htmlentities($row1['post_images']); ?>" width="300" />
                                                                    <br />
                                                                </div>
                                                                <?php  }  ?>
                                                            </div>
                                                        </div>
                                                <?php  }  ?>

                                                </form>

                                                <!-- code or form to add images -->

                                                <form method="post" action=" " name="addpost" method="post" enctype="multipart/form-data">
                                                    <h3>Add New Image</h3>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="card-box">
                                                                <h4 class="m-b-30 m-t-0 header-title"><b>New Feature Image</b></h4>
                                                                <input type="file" class="form-control" id="postimage" name="postimage" required>
                                                            </div>
                                                            <input type="hidden" name="postid" value="<?php echo $postid; ?>">
                                                        </div>
                                                    </div>

                                                    <button type="submit" name="update" class="btn btn-success waves-effect waves-light">Upload </button>
                                                </form>


                                            </div>
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