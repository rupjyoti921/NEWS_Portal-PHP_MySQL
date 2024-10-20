<?php

$query = mysqli_query($conn, "select id,CategoryName from tblcategory where Is_Active='1' ");

// if(isset($_GET['cid']))
// {
// $catid=$_GET['cid'];
// $result=mysqli_query($conn,"select PostTitle, PostImage from tblposts2 where CategoryId='$catid' and Is_Active='1'");

// }

?>
<div id="cat">
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-tittle mb-30">
                        <h3>CATEGORY WISE TOP NEWS</h3>
                        <hr style="width: 30%;">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-9 col-md-9">
                            <div class="properties__button">
                                <!--Nav Button  -->
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link " <?php if(!isset($_GET['catid']) || $_GET['catid']=='all'){ ?> style="background-color:skyblue;color:white;border-radius:2px 2px 25px 25px;" <?php } ?> role="tab" href="index.php?catid=all" aria-controls="nav-home" aria-selected="true">All</a>
                                        <?php
                                        while ($row = mysqli_fetch_object($query)) {
                                        if(isset($_GET['catid'])){ 
                                        $urlid=$_GET['catid'];
                                        }
                                        ?>
                                        <a class="nav-item nav-link " <?php if(isset($_GET['catid'])){ if($urlid==$row->id){ ?>  style="background-color:skyblue;color:white;border-radius:2px 2px 25px 25px;" <?php } else{} }?> href="index.php?catid=<?php echo $row->id; ?>" role="tab" aria-controls="nav-home" aria-selected="false"><?php echo $row->CategoryName; ?></a>
                                        <?php } ?>
                                    </div>
                                </nav>
                                <!--End Nav Button  -->
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-12">
                            <!-- Nav Card -->




                            <?php
                            if (isset($_GET['catid'])) {
                                $id = $_GET['catid'];
                                if ($id == "all") {
                                    $result1 = mysqli_query($conn, "select tblposts2.id,tblposts2.PostImage as PostImage,tblposts2.PostTitle as PostTitle,tblcategory.CategoryName as CatName from tblposts2 left join tblcategory on tblcategory.id=tblposts2.CategoryId where tblposts2.Is_Active='1' ");
                                } else {
                                    $result1 = mysqli_query($conn, "select tblposts2.id,tblposts2.PostImage as PostImage,tblposts2.PostTitle as PostTitle,tblcategory.CategoryName as CatName from tblposts2 left join tblcategory on tblcategory.id=tblposts2.CategoryId where tblposts2.Is_Active='1' and CategoryId='$id' ");
                                }
                            } else {
                                $result1 = mysqli_query($conn, "select tblposts2.id,tblposts2.PostImage as PostImage,tblposts2.PostTitle as PostTitle,tblcategory.CategoryName as CatName from tblposts2 left join tblcategory on tblcategory.id=tblposts2.CategoryId where tblposts2.Is_Active='1' ");
                            }

                            ?>


                            <div class="recent-articles">
                                <div class="container">
                                    <div class="recent-wrapper">
                                        <!-- section Tittle -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="recent-active dot-style d-flex dot-style">
                                                    <?php
                                                    while ($row1 = mysqli_fetch_object($result1)) {
                                                    ?>
                                                        <div class="single-recent mb-100">
                                                            <div class="what-img">
                                                                <img src="admin/postimages/<?php echo $row1->PostImage; ?>" alt="" height="250px">
                                                            </div>
                                                            <div class="what-cap">
                                                                <p><a href="single-post.php?pid=<?php echo $row1->id ;?>" style="color:black;"><?php echo $row1->PostTitle; ?></a></p>
                                                            </div>
                                                        </div>
                                                    <?php } ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>







                            <!-- End Nav Card -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>