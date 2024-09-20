
<?php
  require_once("db.php");
  $title = "Afghan Women Handicraft";
  require_once("header.php");
  require_once("slider.php");
?>
    <!-- ##### Mag Posts Area Start ##### -->
    <section class="mag-posts-area d-flex flex-wrap">

        <!-- >>>>>>>>>>>>>>>>>>>>
         Post Left Sidebar Area
        <<<<<<<<<<<<<<<<<<<<< -->
        <div class="post-sidebar-area left-sidebar mt-30 mb-30 bg-white box-shadow">
            <!-- Sidebar Widget -->
            <div class="single-sidebar-widget p-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Lasted News</h5>
                </div>
                <!-- Single Blog Post -->
                <?php
                  $query_news = mysqli_query($conn,"SELECT * FROM files INNER JOIN news ON files.news_id=news.news_id GROUP BY files.news_id ORDER BY news.news_id DESC LIMIT 6");
                  $show_news = mysqli_fetch_assoc($query_news);
                  do{
                ?>
                <div class="single-blog-post d-flex">
                    <div class="post-thumbnail">
                        <img src="admin/<?php echo $show_news["file_path"]; ?>" style="width:100%; height:70px;" alt="">
                    </div>
                    <div class="post-content">
                        <a href="news_details.php?news_id=<?php echo $show_news["news_id"]; ?>" class="post-title"><?php echo $show_news["news_title"]; ?></a>
                        <div class="post-meta d-flex justify-content-between">
                        </div>
                    </div>
                </div>
                <?php } while($show_news = mysqli_fetch_assoc($query_news)); ?>
            </div>

            <!-- Sidebar Widget -->
            <div class="single-sidebar-widget">
                <a href="#" class="add-img thumbnail"><img src="img/core-img/2.jpg" alt=""></a>
            </div>

            <!-- Sidebar Widget -->
            <div class="single-sidebar-widget p-30">
                <!-- Section Title -->
                <div class="section-heading">
                  <h5>Products</h5>
                </div>
                <!-- Single Blog Post -->
                <?php
                  $query_products = mysqli_query($conn,"SELECT * FROM projects WHERE publish=1 ORDER BY pro_id DESC LIMIT 6");
                  $show_products = mysqli_fetch_assoc($query_products);
                  if($show_products["pro_id"]>0){
                  do{
                ?>
                <div class="single-youtube-channel d-flex">
                    <div class="youtube-channel-thumbnail">
                        <img src="admin/<?php echo $show_products["pro_file"]; ?>" style="width:100%; height:67px;" alt="">
                    </div>
                    <div class="youtube-channel-content">
                        <a href="#" class="post-title"><?php echo substr($show_products["pro_title"],0,40) ?></a>

                        <a href="project_details.php?project_id=<?php echo $show_products["pro_id"]; ?>" class="btn subscribe-btn"><i aria-hidden="true"></i> Read More</a>
                    </div>
                </div>
                <?php } while($show_products = mysqli_fetch_assoc($query_products)); }?>
                <!-- Single YouTube Channel -->
            </div>

        </div>

        <!-- >>>>>>>>>>>>>>>>>>>>
             Main Posts Area
        <<<<<<<<<<<<<<<<<<<<< -->
        <div class="mag-posts-content mt-30 mb-30 p-30 box-shadow">

            <!-- project list -->
            <div class="sports-videos-area">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Products List</h5>
                </div>
                <?php
                  $query_product = mysqli_query($conn, "SELECT * FROM projects WHERE publish=1 ORDER BY pro_id DESC");
                  $show_product = mysqli_fetch_assoc($query_product);
                 ?>
                <div class="sports-videos-slides owl-carousel mb-30">
                    <!-- Single Featured Post -->
                    <?php do { ?>
                    <div class="single-featured-post">
                        <!-- Thumbnail -->
                        <div class="post-thumbnail mb-50">
                            <img src="admin/<?php echo $show_product["pro_file"]; ?>" style="width:100%; height:40%;" alt="">
                        </div>
                        <!-- Post Contetnt -->
                        <div class="post-content">
                            <div class="post-meta">
                                <a href="#">Product</a>
                                <a href="#"><?php echo $show_product["pro_date"]; ?></a>
                            </div>
                            <a href="project_details.php?project_id=<?php echo $show_product["pro_id"] ?>" class="post-title"><?php echo $show_product["pro_title"]; ?></a>
                            <p><?php echo substr($show_product["pro_desc"],0,120) ?>
                              <a href="project_details.php?project_id=<?php echo $show_product["pro_id"] ?>" class="btn btn-default btn-sm;" style="color:#ed3974;"> Read more ...</a>
                            </p>
                        </div>
                        <!-- Post Share Area -->
                        <div class="post-share-area d-flex align-items-center justify-content-between">
                            <!-- Post Meta -->
                            <?php
                               $comment = $show_product["pro_id"];
                               $count_comment = mysqli_query($conn,"SELECT COUNT(comments_id) FROM comments WHERE pro_id=$comment");
                               while($comment = mysqli_fetch_array($count_comment)){
                                  $total_comment = $comment[0];
                              }

                             ?>
                            <div class="post-meta pl-3">
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?php echo $total_comment; ?></a>
                            </div>
                            <!-- Share Info -->
                            <div class="share-info">
                                <a href="#" class="sharebtn"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                <!-- All Share Buttons -->
                                <div class="all-share-btn d-flex">
                                    <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } while($show_product = mysqli_fetch_assoc($query_product)); ?>
                  </div>
                <!-- project list feature -->
                <!-- <div class="row">

                    <?php
                      $query_cont_list = mysqli_query($conn, "SELECT * FROM projects ORDER BY pro_id DESC limit 4");
                      $show_cont_list = mysqli_fetch_assoc($query_cont_list);
                     do {
                    ?>
                    <div class="col-12 col-lg-6">
                        <div class="single-blog-post d-flex style-3 mb-30">
                            <div class="post-thumbnail">
                                <img src="admin/<?php echo $show_cont_list["pro_file"]; ?>"  alt="<?php echo $show_cont_list["pro_title"]; ?>">
                            </div>
                            <div class="post-content">
                                <a href="project_details.php?project_id=<?php echo $show_cont_list["pro_id"]; ?>" class="post-title"><?php echo $show_cont_list["pro_title"]; ?></a>
                                <?php
                                    $pro_id = $show_cont_list["pro_id"];
                                    $count_comments = mysqli_query($conn,"SELECT COUNT(comments_id) FROM comments WHERE pro_id=$pro_id");
                                     while($comments = mysqli_fetch_array($count_comments)){$total_comments = $comments[0];}

                                 ?>
                                <div class="post-meta d-flex">
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?php echo $total_comments; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } while($show_cont_list = mysqli_fetch_assoc($query_cont_list)); ?>
              </div> -->

            <div class="most-viewed-videos mb-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Populer News</h5>
                </div>

                <div class="most-viewed-videos-slide owl-carousel">
                  <?php
                    $query_news_list = mysqli_query($conn, "SELECT * FROM files INNER JOIN news ON files.news_id=news.news_id GROUP BY files.news_id ORDER BY news.news_id DESC");
                    $show_news_list = mysqli_fetch_assoc($query_news_list);
                   do {
                  ?>
                    <!-- Single Blog Post -->
                    <div class="single-blog-post style-4">
                        <div class="post-thumbnail">
                            <img src="admin/<?php echo $show_news_list["file_path"]; ?>" style="width:100%; height:170px;" alt="">
                            <span class="video-duration"><?php echo $show_news_list["news_date"]; ?></span>
                        </div>
                        <div class="post-content">
                            <a href="news_details.php?news_id=<?php echo $show_news_list["news_id"]; ?>" class="post-title" style="font-size:14px;"><b><?php echo $show_news_list["news_title"]; ?></b></a>
                            <p><?php echo substr($show_news_list["news_content"],0,100) ?> <a href="news_details.php?news_id=<?php echo $show_news_list["news_id"]; ?>" style="font-size:13px; color:#ed3974;"> Read More ...</a></p>
                            <?php
                              $news_comments_id = $show_news_list["news_id"];
                              $count_comments_news = mysqli_query($conn,"SELECT COUNT(comments_id) FROM comments WHERE news_id=$news_comments_id");
                               while($comments_news = mysqli_fetch_array($count_comments_news)){$total_comments_news = $comments_news[0];}

                              $view_news = $show_news_list["news_id"];
                              $count_view_news = mysqli_query($conn,"SELECT news_view FROM news WHERE news_id=$view_news");
                              $show_view_news = mysqli_fetch_assoc($count_view_news);
                             ?>
                            <div class="post-meta d-flex">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $show_view_news["news_view"]; ?></a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?php echo $total_comments_news; ?></a>
                            </div>
                        </div>
                    </div>
                  <?php } while($show_news_list = mysqli_fetch_assoc($query_news_list)); ?>
                </div>
            </div>
          </div>
        </div>
        <div class="post-sidebar-area right-sidebar mt-30 mb-30 box-shadow">
          <?php require_once("right_sidebar.php"); ?>
        </div>
      </section>
    <!-- ##### Mag Posts Area End ##### -->
<?php require_once("footer.php"); ?>
