<?php
session_start();
include 'config.php';
$catid = $_GET['catid'];

// code to extract post data category wise
$query = mysqli_query($conn, "select tblposts2.id,tblposts2.PostTitle,tblcategory.CategoryName,tblsubcategory.Subcategory,tblposts2.PostDetails, tblposts2.PostingDate, tblposts2.PostImage, tblposts2.viewCounter, tblposts2.postedBy_idName from tblposts2 left join tblcategory on tblcategory.id=tblposts2.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts2.SubCategoryId where tblcategory.id='$catid' and (tblposts2.Is_Active=1 || tblposts2.Is_Active=3) order by PostingDate desc ");
if (mysqli_num_rows($query) == 0) {
?><script>
        alert("No NEWS Found!!")
    </script><?php
                echo "<script> location.href='index.php' </script>";
            }



            // code to extract data of the person who posted
            $row = mysqli_fetch_array($query);
            $postby = $row['postedBy_idName'];
            if ($postby != 'admin') {
                $repid = $row['postedBy_idName'];
                $query2 = mysqli_query($conn, "select first_name,last_name from tblreporter where id='$repid'");
                $row2 = mysqli_fetch_array($query2);
                $postby = $row2['first_name'] . " " . $row2['last_name'];
            } else {
                $postby = 'admin';
            }

                ?>

<!doctype html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>RDJR NEWS | Single Post</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

</head>

<body>
    <?php include 'includes/header.php'; ?>

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area ">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <br>
                    <h3><?php echo $row['CategoryName']; ?></h3>
                    <hr>
                    <!-- code to showing news -->
                    <?php
                    while ($row = mysqli_fetch_array($query)) {
                        $pd = $row['PostDetails'];
                        $details = strip_tags($pd);

                        $timestamp = strtotime($row['PostingDate']);
                        $date = date('d-m-Y', $timestamp);
                        $details = substr($details, 0, 150); ?>
                        <div style="background-color:#f5f8f5; border-radius:7px;">
                            <p><img src="admin/postimages/<?php echo $row['PostImage']; ?>" width="40%" height="230px" style="float:left;margin:5px; margin-right:15px; border-radius:7px">
                            <h5 style="margin-right:5px;padding:10px;"><?php echo $row['PostTitle']; ?></h5>

                            <p style="font-size:14px;margin-right:10px;">
                                <i class="fa fa-user"></i> Posted By : <?php echo $postby; ?> on <?php echo $date; ?></li></br>
                                <i class="fa fa-list"></i> Category : <?php echo $row['CategoryName']; ?> | <i class="fa fa-bars"></i> Sub-Category : <?php echo $row['Subcategory']; ?> | <i class="fa fa-eye"></i> Views : <?php echo $row['viewCounter']; ?><br>
                            <p style="font-size:16px;margin-right:10px;"> <?php echo $details; ?>...
                                <a href="single-post.php?pid=<?php echo $row['id']; ?>" style="color:red; border:1px solid red;"><em>Read More</em></a>
                            </p>
                            </p>
                            </p>
                        </div>
                    <?php } ?>
                </div>

                <!-- code for showing category list -->
                <div class="col-md-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <ul class="list cat-list">
                                <?php
                                $query5 = mysqli_query($conn, "select id,CategoryName from tblcategory where Is_Active='1' ");
                                while ($row5 = mysqli_fetch_array($query5)) {
                                ?>
                                    <li>
                                        <a href="category.php?catid=<?php echo $row5['id']; ?>" class="d-flex">
                                            <p> <?php echo $row5['CategoryName']; ?></p>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </aside>
                        <!-- end of showing category list -->

                        <!-- code for showing recent post -->
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            <?php
                            $query6 = mysqli_query($conn, "select id,PostTitle,PostImage,PostingDate from tblposts2 where (Is_Active=1 or Is_Active=3) order by PostingDate desc limit 5");
                            while ($row6 = mysqli_fetch_array($query6)) {
                            ?>
                                <div class="media post_item">
                                    <img src="admin/postimages/<?php echo $row6['PostImage']; ?>" alt="post" width="100px" height="80px" style="border-radius:3px;">
                                    <div class="media-body">
                                        <a href="single-post.php?pid=<?php echo $row6['id']; ?>">
                                            <h3><?php echo $row6['PostTitle']; ?></h3>
                                        </a>
                                        <p><?php echo $row6['PostingDate']; ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Blog Area end =================-->

    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding fix">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12">
                        <div class="single-footer-caption">
                            <div class="single-footer-caption">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img src="assets/img/logo/footer.png" alt="" width="100%;"></a>
                                </div>
                                <!-- social -->
                                <div class="footer-social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-5  col-sm-12">
                        <div class="footer-tittle">
                            <div class="footer-pera">
                                <p style="float:right;">RDJR News is the online arm of RDJR News (formerly known as RDJR News) with hard news as its core offering and interactivity as its key component. Along with a plethora of mobile- and multimedia-enabled content, RDJR News is a multi-platform offering that, for the first time, provides viewers/users an opportunity to contribute to the news process and interact with editors and reporters.</p>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
        <!-- footer-bottom aera -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col-lg-6">
                            <div class="footer-copy-right">
                                <p>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved | RDJR NEWS
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="footer-menu f-right">
                                <ul>
                                    <li><a href="#">Terms of use</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </footer>

    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="./assets/js/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

</body>

</html>