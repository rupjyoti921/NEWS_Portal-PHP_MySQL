<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
   
    // Code for restore
    if ($_GET['appid']) {
        $id = intval($_GET['appid']);
        $query = mysqli_query($conn, "update tblcomments set status='1' where id='$id'");
        $msg = "Comment approved";
    }

    // Code for deletion
    if ($_GET['action'] == 'del' && $_GET['rid']) {
        $id = intval($_GET['rid']);
        $query = mysqli_query($conn, "delete from  tblcomments  where id='$id'");
        $delmsg = "Comment deleted forever";
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title>RDJR NEWS| Unapproved Comments</title>
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
                                    <h4 class="page-title">Manage Unapproved Comments</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Comments </a>
                                        </li>
                                        <li class="active">
                                            Unapprove Comments
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-6">

                                <?php if ($msg) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                    </div>
                                <?php } ?>

                                <?php if ($delmsg) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Oh snap!</strong> <?php echo htmlentities($delmsg); ?>
                                    </div>
                                <?php } ?>


                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="demo-box m-t-20">

                                        <div class="table-responsive">
                                            <table class="table m-0 table-colored-bordered table-bordered-primary">
                                                <thead>
                                                    <tr>
                                                        <th>Sl_No</th>
                                                        <th width="100px"> Name</th>
                                                        <th width="100px">Email Id</th>
                                                        <th width="150px">Comment</th>
                                                        <th width="200px">Post</th>
                                                        <th>Posting Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $query = mysqli_query($conn, "Select tblcomments.id,  tblcomments.name,tblcomments.email,tblcomments.posting_date,tblcomments.comment,tblposts2.id as postid,tblposts2.PostTitle from  tblcomments join tblposts2 on tblposts2.id=tblcomments.post_id where tblcomments.status=0");
                                                    $cnt = 1;
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>

                                                        <tr>
                                                            <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                            <td><?php echo htmlentities($row['name']); ?></td>
                                                            <td><?php echo htmlentities($row['email']); ?></td>
                                                            <td><?php echo htmlentities($row['comment']); ?></td>
                                                          
                                                            <td><?php echo htmlentities($row['PostTitle']); ?> <a href="view-post.php?pid=<?php echo $row['postid']  ;?>">View Post</a> </td>
                                                            <?php
                                                                  $timestamp = strtotime($row['posting_date']);
                                                                  $date = date('d-m-Y', $timestamp);
                                                            ?>
                                                            <td><?php echo $date; ?></td>
                                                            <td>
                                                               <a href="unapprove-comment.php?appid=<?php echo htmlentities($row['id']); ?>" title="Approve this comment"><button class="btn btn-primary">Approve</button></a>
                                                               &nbsp;<a href="unapprove-comment.php?rid=<?php echo htmlentities($row['id']); ?>&&action=del" onclick="return confirm('Are you really want to delete ??')"> <button class="btn btn-danger">Delete</button></a>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                        $cnt++;
                                                    } ?>
                                                </tbody>

                                            </table>
                                        </div>

                                    </div>

                                </div>


                            </div>
                            <!--- end row -->



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="demo-box m-t-20">
                                        <div class="m-b-30">


                                        </div>





                                    </div>

                                </div>


                            </div>


















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