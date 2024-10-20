<div class="weekly2-news-area   gray-bg">
    <div class="container">
        <div class="weekly2-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>EXCLUSIVE NEWS</h3>
                        <hr style="width:30%;">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="weekly2-news-active dot-style d-flex dot-style">

                        <?php $count = 1;
                        $query = mysqli_query($conn, "select tblposts2.id,tblposts2.PostImage as PostImage,tblposts2.PostTitle as PostTitle,tblposts2.PostingDate as PostingDate, tblcategory.CategoryName as CatName from tblposts2 left join tblcategory on tblcategory.id=tblposts2.CategoryId where (tblposts2.Is_Active='1' or tblposts2.Is_Active='3') and tblposts2.PostLocation='exclusive' order by tblposts2.PostingDate desc ");
                        while ($row = mysqli_fetch_object($query)) {
                            if ($count <= 6) {
                                $newDate = date("d-m-Y", strtotime($row->PostingDate));
                        ?>
                                <!-- ------- start card -------- -->
                                <div class="weekly2-single" style="box-shadow:2px 10px 5px 3px #aaaaaa;">
                                    <div class="weekly2-img">
                                        <img src="admin/postimages/<?php echo $row->PostImage; ?>" alt="" height="200px">
                                    </div>
                                    <div class="weekly2-caption" style="padding:15px;">
                                        <span class="color1"><?php echo $row->CatName; ?></span>
                                        <p style="font-size:12px;"><?php echo $newDate; ?></p>
                                        <?php
                                         $details=$row->PostTitle ;
                                         $pt=substr($details, 0,70);
                                         ?>
                                        <p style="font-size:16px;color:black;"><?php echo $pt; ?>...<a href="single-post.php?pid=<?php echo $row->id; ?>" style="font-size:16px;color:red;"><em>continue</em></a></p>
                                    </div>
                                </div>
                                <!-- ------- end card -------- -->
                        <?php $count++;
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>