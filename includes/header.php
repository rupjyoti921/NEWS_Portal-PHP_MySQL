 <header>
     <!-- Header Start -->
     <div class="header-area">
         <div class="main-header ">
             <!-- <div class="header-top black-bg d-none d-md-block">
                 <div class="container">
                     <div class="col-xl-12">
                         <div class="row d-flex justify-content-between align-items-center">
                             <div class="header-info-left">
                                 <ul>
                                     <li><img src="assets/img/icon/header_icon1.png" alt="">34ºc, Sunny </li>
                                     <li><img src="assets/img/icon/header_icon1.png" alt="">Tuesday, 19th July, 2022</li>
                                 </ul>
                             </div>
                             <div class="header-info-right">
                                 <ul class="header-social">
                                     <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                     <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                     <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
             </div> -->
             <div class="header-mid d-none d-md-block">
                 <div class="container">
                     <div class="row d-flex align-items-center">
                         <!-- Logo -->
                         <div class="col-xl-3 col-lg-3 col-md-3">
                             <div class="logo">
                                 <a href="index.php"><img src="assets/img/logo/logo1.png" alt="" style="height:80px;"></a>
                             </div>
                         </div>
                         <div class="col-xl-9 col-lg-9 col-md-9">
                             <div class="header-banner f-right ">
                                 <!-- <img src="assets/img/hero/header_card.jpg" alt=""> -->
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="header-bottom header-sticky">
                 <div class="container">
                     <div class="row align-items-center">
                         <div class="col-xl-12 col-lg-12 col-md-12 header-flex">
                             <!-- sticky -->
                             <div class="sticky-logo">
                                 <a href="index.php"><img src="assets/img/logo/logo1.png" alt="" style="height:80px;"></a>
                             </div>
                             <!-- Main-menu -->
                             <div class="main-menu d-none d-md-block">
                                 <nav>
                                     <ul id="navigation">
                                         <li><a href="index.php">Home</a></li>
                                        <li><a href="#">Categories</a>
                                             <ul class="submenu">
                                                 <?php $query5 = mysqli_query($conn, "select id,CategoryName from tblcategory where Is_Active='1' ");
                                                    while ($row5 = mysqli_fetch_array($query5)) { ?>
                                                     <li><a href="category.php?catid=<?php echo $row5['id']; ?>"> <?php echo $row5['CategoryName']; ?> </a></li>
                                                 <?php  }   ?>
                                             </ul>
                                         </li>
                                         <li><a href="location-news.php?Plocation=latest">Latest News</a></li>
                                         <li><a href="location-news.php?Plocation=breaking">Breaking News</a></li>
                                         <li><a href="location-news.php?Plocation=exclusive">Exclusive News</a></li>
                                         <li><a href="aboutus.php">About</a></li>
                                         <li><a href="contactus.php">Contact</a></li>
                                         <?php
                                           if (isset($_SESSION['email_add'])) {
                                            ?>
                                             <li ><a href="user-logout.php" style="color:red;">Logout</a></li>
                                         <?php
                                            }else{
                                            ?>
                                         <li ><a href="user-login.php" style="color:blue;">Login</a></li>
                                         <?php  }  ?>
                                     </ul>
                                 </nav>
                             </div>
                         </div>
                         <div class="col-12">
                             <div class="mobile_menu d-block d-md-none"></div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Header End -->
 </header>