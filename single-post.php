<?php
session_start();
include 'config.php';
if (isset($_SESSION['email_add'])) {
    $user_id = $_SESSION['user_id'];
}
//take post id
$postid = $_GET['pid'];
//code to count view
mysqli_query($conn, "update tblposts2 set viewCounter=viewCounter+1 where id='$postid'");

// code to extract post data
$query = mysqli_query($conn, "select tblposts2.PostTitle,tblcategory.CategoryName,tblsubcategory.Subcategory,tblposts2.PostDetails, tblposts2.PostingDate, tblposts2.PostImage, tblposts2.viewCounter, tblposts2.postedBy_idName from tblposts2 left join tblcategory on tblcategory.id=tblposts2.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts2.SubCategoryId where tblposts2.id='$postid' and (tblposts2.Is_Active=1 || tblposts2.Is_Active=3) ");
if (mysqli_num_rows($query) == 0) {
    echo "<script> location.href='index.php' </script>";
}

$row = mysqli_fetch_array($query);

// code to extract data of the person who posted
$postby = $row['postedBy_idName'];
if ($postby != 'admin') {
    $repid = $row['postedBy_idName'];
    $query2 = mysqli_query($conn, "select first_name,last_name from tblreporter where id='$repid'");
    $row2 = mysqli_fetch_array($query2);
    $postby = $row2['first_name'] . " " . $row2['last_name'];
} else {
    $postby = 'admin';
}

// comment data submission code
if (isset($_POST['comment_form'])) {
    $comment = mysqli_real_escape_string($conn, trim($_POST["comment"]));
    $user_id = mysqli_real_escape_string($conn, trim($_POST["user_id"]));
    $post_id = mysqli_real_escape_string($conn, trim($_POST["post_id"]));
    $name = $_SESSION['first_name'] . " " . $_SESSION['last_name'];
    $email_add = $_SESSION['email_add'];
    $status = '0';
    $query2 = mysqli_query($conn, "insert into tblcomments(post_id,user_id,name,email,comment,status) values('$post_id','$user_id','$name','$email_add','$comment','$status')");
    if ($query2) {
?> <script>
            alert("Comment inserted Successfully");
        </script> <?php
                } else {
                    ?> <script>
            alert("Failed !!");
        </script> <?php
                }
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
                <div class="col-md-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="admin/postimages/<?php echo $row['PostImage'] ?>" alt="">
                        </div>
                        <!-- showing all details of the post -->
                        <div class="blog_details">
                            <h2> <?php echo $row['PostTitle']; ?> </h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <?php
                                $timestamp = strtotime($row['PostingDate']);
                                $date = date('d-m-Y', $timestamp);
                                ?>
                                <li style="font-size:16px;"><i class="fa fa-user"></i> Posted By : <?php echo $postby; ?> on <?php echo $date; ?></li></br>
                                <li style="font-size:16px;"><i class="fa fa-list"></i>Category : <?php echo $row['CategoryName']; ?></li>
                                <li style="font-size:16px;"><i class="fa fa-bars"></i>Sub-Category : <?php echo $row['Subcategory']; ?></li>
                                <li style="font-size:16px;"><i class="fa fa-eye"></i>Views : <?php echo $row['viewCounter']; ?></li>
                            </ul>
                            <p class="excert">
                                <?php echo $row['PostDetails']; ?>
                            </p>
                            <!-- showing extra images -->
                            <div class="feature-img">
                                <?php
                                $query3 = mysqli_query($conn, "select post_images from tbladdimage where post_id='$postid'");
                                while ($row3 = mysqli_fetch_array($query3)) {
                                ?>
                                    <img class="img-fluid" src="admin/postimages/<?php echo $row3['post_images'] ?>" alt="" style="padding:10px;">
                                <?php  } ?>
                            </div>

                        </div>
                    </div>


                    <!-- code to submit a comment  -->
                    <?php
                    if (isset($_SESSION['first_name']) && ($_SESSION['email_add'])) {
                    ?>
                        <div class="comment-form">
                            <h3>Comment Section </h3>
                            <hr>
                            <h4>Leave a Comment</h4>
                            <form class="form-contact comment_form" action="" method="post" id="commentForm">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="3" placeholder="Write Comment" required></textarea>
                                        </div>
                                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                        <input type="hidden" name="post_id" value="<?php echo $postid; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="comment_form" class="button button-contactForm btn_1 boxed-btn">Send Comment</button>
                                </div>
                            </form>
                        </div>
                    <?php } else {
                    ?>
                        <div class="comment-form">
                            <h3>Comment Section </h3>
                            <hr>
                            <ol>
                                <li>
                                    <center>
                                        <a href="user-login.php">
                                            <button style="background-color:goldenrod;width:50%; height:50px;padding:5px;font-size:20px; box-shadow:5px 5px 5px 5px;border-radius:5px;">
                                                Type a comment
                                            </button></a>
                                    </center>
                                </li>
                            </ol>
                        </div>
                    <?php
                    } ?>
                    <!-- comment form end here -->

                    <!-- showing comments -->
                    <?php
                    $query4 = mysqli_query($conn, "select user_id,name,comment,posting_date from tblcomments where post_id='$postid' and status='1' order by posting_date desc");
                    $result = mysqli_num_rows($query4);
                    if ($result > 0) {
                    ?>
                        <div class="comments-area">
                            <h4><?php echo $result; ?> Comment(s)</h4>
                           
                               
                                    <?php
                                    while ($row4 = mysqli_fetch_array($query4)) {
                                        //extraction of gender of the person
                                        $user_id = $row4['user_id'];
                                        $query7 = mysqli_query($conn, "select gender from tbluser where id='$user_id'");
                                        $row7 = mysqli_fetch_array($query7);
                                        $gender = $row7['gender'];
                                    ?>
                                     <div class="comment-list">
                                     <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <!-- user image according to gender -->
                                                <?php if ($gender == 'male') { ?>
                                                    <img src="assets/man.png" alt="male">
                                                <?php } else if ($gender == 'female') {  ?>
                                                    <img src="assets/female.png" alt="female">
                                                <?php  } ?>
                                            </div>
                                            <div class="desc">
                                                <p class="comment"> <?php echo $row4['comment']; ?> </p>
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <h5>
                                                            <a href="#"> <?php echo $row4['name']; ?> </a>
                                                        </h5>
                                                        <p class="date"> <?php echo $row4['posting_date']; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <?php  }  ?>
                            
                        </div>
                    <?php } else {
                    ?> <h5>0 Comment</h5> <?php
                                            } ?> <br>
                    <hr><br>
                    <!-- showing comments is end here -->
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