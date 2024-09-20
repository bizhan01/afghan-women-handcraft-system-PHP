
<?php

  require_once("db.php");

  $count_news_count = mysqli_query($conn,"SELECT COUNT(news_id) FROM news");
  while($news_count = mysqli_fetch_array($count_news_count)){$total_news_count = $news_count[0];}

  if($total_news_count>0){
    $news = mysqli_query($conn, "SELECT * FROM news");
    $num_of_record = mysqli_num_rows($news);
    $num_in_page = 5;
    $num_of_page = ceil($num_of_record/$num_in_page);
    if(isset($_GET["page"]) && $_GET["page"]>=1 && $_GET["page"] <= $num_of_page){
      $offset = ($_GET["page"] - 1) * $num_in_page;
    }else{
      $offset = 0;
      header("location:news.php?page=1");
    }
    $select_news = mysqli_query($conn, "SELECT * FROM files INNER JOIN news ON files.news_id=news.news_id GROUP BY files.news_id ORDER BY news.news_id DESC LIMIT $offset, $num_in_page");
    $show_news = mysqli_fetch_assoc($select_news);
  }
  $title = "News";
  require_once("header.php");
?>

    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(admin/img/about/40.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>News Post</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="mag-breadcrumb py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">News</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Post Details Area Start ##### -->
    <section class="post-details-area">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Post Details Content Area -->
                <div class="col-12 col-xl-8">
                    <!-- Related Post Area -->
                    <div class="related-post-area bg-white mb-30 px-30 pt-30 box-shadow">
                        <!-- Section Title -->
                      <?php if($total_news_count>0){ ?>
                        <div class="section-heading">
                            <h5>News</h5>
                        </div>

                        <div class="row">
                            <!-- Single Blog Post -->
                            <?php
                              do{
                            ?>
                            <div class="post-details-content bg-white mb-30 p-30">
                              <div class="blog-thumb mb-30">
                                  <img src="admin/<?php echo $show_news["file_path"]; ?>" style="width:100%; height:300px;" alt="">
                              </div>
                              <div class="blog-content">
                                  <div class="post-meta">
                                      <a href="#"><?php echo $show_news["news_date"]; ?></a>
                                      <a href="#"><?php echo $show_news["news_category"]; ?></a>
                                  </div>
                                  <h4 class="post-title"><?php echo $show_news["news_title"]; ?></h4>
                                  <?php
                                    $id = $show_news["news_id"];
                                     $count_comment = mysqli_query($conn,"SELECT COUNT(comments_id) FROM comments WHERE news_id=$id");
                                     while($comment = mysqli_fetch_array($count_comment)){$total_comment = $comment[0];}

                                     $query_view_news = mysqli_query($conn, "SELECT * FROM news WHERE news_id=$id");
                                     $select_view = mysqli_fetch_assoc($query_view_news);
                                   ?>
                                  <div class="post-meta-2">
                                      <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $select_view["news_view"]; ?></a>
                                      <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?php echo $total_comment; ?></a>
                                  </div>
                                  <p><?php echo substr($show_news["news_content"],0,220). ". " ?>
                                    <a href="news_details.php?news_id=<?php echo $show_news["news_id"]; ?>"
                                     style="color:#ed3974;"> Read more ...
                                    </a>
                                  </p>
                             </div>
                           </div>
                            <?php } while($show_news = mysqli_fetch_assoc($select_news)); ?>
                        </div><hr>
                        <div class="text-center">
                          <nav>
                              <ul class="pagination">
                               <?php if($_GET["page"] == 1){?>
                                 <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-left"></i></a></li>
                               <?php }else{ $previous = $_GET["page"] - 1; ?>
                                 <li class="page-item"><a class="page-link" href="news.php?page=<?php echo $previous ?>"><i class="ti-angle-left"></i></a></li>
                               <?php } ?>
                                 <?php for ($i=1; $i <=$num_of_page; $i++) { ?>
                                   <?php  if(isset($_GET["page"]) && $_GET["page"] == $i){ ?>
                                     <li class="page-item active"><a class="page-link" href="news.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                   <?php }else{?>
                                     <li class="page-item"><a class="page-link" href="news.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                   <?php } ?>
                                 <?php } ?>
                                 <?php if($_GET["page"] == $num_of_page){?>
                                   <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-right"></i></a></li>
                                 <?php }else{ $next = $_GET["page"] + 1; ?>
                                 <li class="page-item"><a class="page-link" href="news.php?page=<?php echo $next; ?>"><i class="ti-angle-right"></i></a></li>
                                 <?php } ?>
                               </ul>
                          </nav>
                        </div>
                        <?php } else{ ?>
                          <div class="section-heading">
                              <h5>NO NEWS TO SHOW!</h5>
                          </div>
                        <?php }  ?>
                        <br>
                    </div>
                    <!-- Comment Area Start -->

                </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                    <div class="sidebar-area bg-white mb-30 box-shadow">
                      <?php require_once("right_sidebar.php"); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Post Details Area End ##### -->

    <?php require_once("footer.php"); ?>
