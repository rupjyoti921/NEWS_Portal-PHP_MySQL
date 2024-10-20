<!-- Trending Top -->
<div class="trending-top mb-30">

  <!-- sssssssssssssssssssssss     -->

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <?php
      $count = 1;
      $query = mysqli_query($conn, "select PostImage,PostTitle from tblposts2 where Is_Active='1' order by PostingDate desc");
      while ($row = mysqli_fetch_object($query)) {
      ?>
        <!-- loop start from here -->
        <?php if ($count == 1) { ?>
          <div class="item active">
            <img src="admin/postimages/<?php echo $row->PostImage; ?>" alt="Chicago" style="width:100%; height:500px;border-radius:10px; ">
            <div class="carousel-caption">
              <h4><?php echo $row->PostTitle; ?></h4>
            </div>
          </div>
        <?php $count++;
        } else if ($count <= 6) {
        ?>

          <div class="item">
            <img src="admin/postimages/<?php echo $row->PostImage; ?>" alt="Los Angeles" style="width:100%; height:500px;border-radius:10px;">
            <div class="carousel-caption">
              <h4><?php echo $row->PostTitle; ?></h4>
            </div>
          </div>
          <!-- loop end here -->
      <?php $count++;
        }
      }
      ?>


    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

</div>
<!-- Trending Bottom -->
<div class="trending-bottom">
  <div class="row">
    <div class=col-md-12>
      <div class="section-tittle mb-30">
        <h3>TOP RECENT CATEGORIES</h3>
        <hr style="width:30%;">
      </div>
    </div>
  </div>
  <div class="row">
    <br>
    <div class="col-lg-4">
      <div class="single-bottom mb-35">
        <div class="trend-bottom-img mb-30">
          <img src="assets/img/trending/trending_bottom1.jpg" alt="" style="height:150px; width:100%">
        </div>
        <div class="trend-bottom-cap">
          <span class="color1">Politics</span>
          <h4><a href="details.html">Get all the NEWS of Indian Politics here</a></h4>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="single-bottom mb-35">
        <div class="trend-bottom-img mb-30">
          <img src="assets/img/trending/trending_bottom2.jpg" alt="" style="height:150px; width:100%">
        </div>
        <div class="trend-bottom-cap">
          <span class="color2">Business</span>
          <h4>
            <h4><a href="details.html">Get all the latest Business NEWS here</a></h4>
          </h4>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="single-bottom mb-35">
        <div class="trend-bottom-img mb-30">
          <img src="assets/img/trending/trending_bottom3.jpg" alt="" style="height:150px; width:100%">
        </div>
        <div class="trend-bottom-cap">
          <span class="color3">Sports</span>
          <h4><a href="details.html">Explore all the latest Sports NEWS here</a></h4>
        </div>
      </div>
    </div>
  </div>
</div>