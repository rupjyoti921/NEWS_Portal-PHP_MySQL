<?php
session_start();
include 'config.php';
?>
<!doctype html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/ticker-style.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loader.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader end -->

    <?php include 'includes/header.php'; ?>

    <main>
        <!-- Trending Area Start -->
        <div class="trending-area fix">
            <div class="container">
                <div class="trending-main">
                    <div class="row">
                        <!-- Latest NEWS ||  left content, sliding images and main categori -->
                        <div class="col-md-8">
                            <?php include 'includes/sliding-images.php' ?>
                        </div>
                        <!-- Riht content -->
                        <?php $query = mysqli_query($conn, "select id,PostImage,PostTitle from tblposts2 where (Is_Active='1' or Is_Active='3') and PostLocation='latest' order by PostingDate asc"); ?>
                        <div class="col-md-4" style="box-shadow:1px 10px 8px 1px #aaaaaa;">

                            <div class="w3-col m3 s12">
                                <div style="margin-top:3px; background-color:rgb(0, 0, 129);border-radius:5px; box-shadow:6px 6px 6px 2px #aaaaaa;">
                                    <h4 style="padding:5px;text-align:center;color:white; ">Latest News</h4>
                                </div>
                                <div>
                                    <div style="height:500px; padding: 10px;">
                                        <marquee direction="up" scrollamount="3" style="height:900px; color:white;" onMouseOver="stop();" onMouseOut="start();">
                                            <?php while ($row = mysqli_fetch_object($query)) { ?>
                                                <div style="height:100px; background-color:#f9fefb; border-radius:0px 5px 5px 0px;">
                                                <?php
                                                $details=$row->PostTitle ;
                                                $pt=substr($details, 0,70);
                                                ?>
                                                    <p style="color:black; font-size:14px;margin-right:5px;"><img src="admin/postimages/<?php echo $row->PostImage; ?>" height="100px" width="120px" style="float: left;margin-right:10px; border-radius:5px;">
                                                        <?php echo $pt; ?>...<a href="single-post.php?pid=<?php echo $row->id; ?>" style="color:red; font-size:14px;"><em>continue</em></a>
                                                    </p>
                                                </div>
                                                <hr>
                                            <?php } ?>
                                        </marquee>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Riht content -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Trending Area End -->
        <!--   Breaking-News start -->
        <div class="weekly-news-area pt-50">
            <div class="container">
                <div class="weekly-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>BREAKING NEWS</h3>
                                <hr style="width:30%" ;>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="weekly-news-active dot-style d-flex dot-style">
                                <?php
                                $count = 1;
                                $query = mysqli_query($conn, "select tblposts2.id,tblposts2.PostImage as PostImage,tblposts2.PostTitle as PostTitle,tblcategory.CategoryName as CatName from tblposts2 left join tblcategory on tblcategory.id=tblposts2.CategoryId where (tblposts2.Is_Active='1' or tblposts2.Is_Active='3') and tblposts2.PostLocation='breaking' order by tblposts2.PostingDate desc ");
                                while ($row = mysqli_fetch_object($query)) {
                                    if ($count <= 6) {
                                ?>

                                        <div class="weekly-single" style="box-shadow:2px 10px 5px 3px #aaaaaa;">
                                            <div class="weekly-img">
                                                <img src="admin/postimages/<?php echo $row->PostImage; ?>" alt="" height="300px">
                                            </div>
                                            <div class="weekly-caption">
                                                <span class="color2"><?php echo $row->CatName; ?></span>
                                                <h4><a href="single-post.php?pid=<?php echo $row->id; ?>"><?php echo $row->PostTitle; ?></a></h4>
                                            </div>
                                        </div>
                                <?php
                                        $count++;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breaking News -->

        <!--   Exclusive News start -->
        <?php include 'includes/exclusive.php'; ?>
        <!-- End Exclusive-News -->

        <?php

        if (isset($_GET['catid'])) {

        ?>
            <script>
                $(function() {
                    $('html, body').animate({
                        scrollTop: $("#cat").offset().top
                    }, 1);
                });
            </script>
        <?php

        }

        ?>

        <!-- categories Start -->
        <?php include 'includes/categories.php'; ?>
        <!-- categories End -->

       
    </main>

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
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
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

    <!-- Breaking New Pluging -->
    <script src="./assets/js/jquery.ticker.js"></script>
    <script src="./assets/js/site.js"></script>

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