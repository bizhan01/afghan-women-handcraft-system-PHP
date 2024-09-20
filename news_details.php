<?php
  require_once("db.php");
  $id = $_GET["news_id"];
  if(isset($_POST["cust_name"])){
    $name = $_POST["cust_name"];
    $email = $_POST["cust_email"];
    $message = $_POST["message"];
    $result = mysqli_query($conn, "INSERT INTO comments VALUES(NULL,'$name','$email','$message',NULL,$id,NULL)");
    if($result){
      header("location:news_details.php?news_id=$id && successfuly comment added");
    }
  }
  $title = "News Details";
  require_once("header.php");
?>

    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(admin/img/about/40.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Single News Post</h2>
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
                            <li class="breadcrumb-item active" aria-current="page">Single News</li>
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
                <?php
                  require_once("db.php");
                  $query_news = mysqli_query($conn, "SELECT * FROM files INNER JOIN news ON files.news_id=news.news_id WHERE news.news_id=$id");
                  $show_news = mysqli_fetch_assoc($query_news);
                ?>
                <div class="col-12 col-xl-8">
                    <div class="post-details-content bg-white mb-30 p-30 box-shadow">
                        <div class="blog-thumb mb-30">
                            <img src="admin/<?php echo $show_news["file_path"]; ?>" style="width:100%; height:400px;" alt="">
                        </div>
                        <div class="blog-content">
                            <div class="post-meta">
                                <a href="#"><?php echo $show_news["news_date"]; ?></a>
                                <a href="#"><?php echo $show_news["news_category"]; ?></a>
                            </div>
                            <h4 class="post-title"><?php echo $show_news["news_title"]; ?></h4>
                            <?php
                               $count_comment = mysqli_query($conn,"SELECT COUNT(comments_id) FROM comments WHERE news_id=$id");
                               while($comment = mysqli_fetch_array($count_comment)){$total_comment = $comment[0];}

                               $query_view_news = mysqli_query($conn, "SELECT * FROM news WHERE news_id=$id");
                               $select_view = mysqli_fetch_assoc($query_view_news);

                               $query_files = mysqli_query($conn, "SELECT * FROM files WHERE news_id=$id");
                               $select_files = mysqli_fetch_assoc($query_files);

                               $count_view = $select_view["news_view"];
                               $total_view = $count_view + 1;
                               mysqli_query($conn, "UPDATE news SET news_view='$total_view' WHERE news_id=$id");
                             ?>
                            <div class="post-meta-2">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $total_view; ?></a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?php echo $total_comment; ?></a>
                            </div>
                            <p><?php echo $show_news["news_content"]; ?></p>
                            <div class="container">
                              <?php do { ?>
                                  <a href="admin/<?php echo $select_files["file_path"] ?>" class="thumbnail">
                                    <img src="admin/<?php echo $select_files["file_path"] ?>" alt="Pulpit Rock" style="width:49%; height:200px; padding:10px;">
                                  </a>
                              <?php } while($select_files = mysqli_fetch_assoc($query_files)); ?>
                            </div>
                            <!-- Like Dislike Share -->
                            <div class="like-dislike-share my-5">
                                <h4 class="share">0<span>Share</span></h4>
                                <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Share on Facebook</a>
                                <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Share on Twitter</a>
                            </div>

                        </div>
                    </div>

                    <!-- Related Post Area -->
                    <div class="related-post-area bg-white mb-30 px-30 pt-30 box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Related Post</h5>
                        </div>

                        <div class="row">
                            <!-- Single Blog Post -->
                            <?php
                              $query_feature_news = mysqli_query($conn, "SELECT * FROM files INNER JOIN news ON files.news_id=news.news_id WHERE news.news_id=$id GROUP BY files.news_id ORDER BY news.news_id DESC");
                              $show_feature_news = mysqli_fetch_assoc($query_feature_news);
                              do {
                            ?>
                              <div class="col-12 col-md-6 col-lg-4">
                                  <div class="single-blog-post style-4 mb-30">
                                      <div class="post-thumbnail">
                                          <img src="admin/<?php echo $show_feature_news["file_path"]; ?>" style="width:100%; height:120px;" alt="">
                                      </div>
                                      <div class="post-content">
                                          <a href="project_details.php?project_id=<?php echo $show_feature_news["news_id"]; ?>" class="post-title"><?php echo $show_feature_news["news_title"]; ?></a>

                                      </div>
                                  </div>
                              </div>
                            <?php } while($show_feature_news = mysqli_fetch_assoc($query_feature_news)); ?>
                        </div>
                    </div>

                    <!-- Comment Area Start -->
                    <div class="comment_area clearfix bg-white mb-30 p-30 box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>COMMENTS</h5>
                        </div>
                        <ol>
                            <!-- Single Comment Area -->
                            <?php
                              $query_comments = mysqli_query($conn, "SELECT * FROM comments INNER JOIN news ON comments.news_id=news.news_id WHERE comments.news_id=$id ORDER BY comments.comments_id DESC");
                              $show_comments = mysqli_fetch_assoc($query_comments);
                              do {
                            ?>
                            <li class="single_comment_area">
                                <!-- Comment Content -->
                                <div class="comment-content d-flex">
                                    <!-- Comment Author -->
                                    <?php if($show_comments["comments_id"] >= 1){ ?>
                                      <div class="comment-author ">
                                          <i class="fa fa-user" style="font-size:70px;"></i>
                                      </div>
                                    <?php } ?>
                                    <!-- Comment Meta -->
                                    <div class="comment-meta">
                                        <a href="#" class="comment-date"><?php echo $show_comments["comment_date"]; ?></a>
                                        <h6><?php echo $show_comments["cust_name"]; ?></h6>
                                        <p><?php echo $show_comments["message"]; ?></p>
                                    </div>
                                </div>
                            </li>
                            <?php } while($show_comments = mysqli_fetch_assoc($query_comments)); ?>
                        </ol>
                    </div>

                    <!-- Post A Comment Area -->
                    <div class="post-a-comment-area bg-white mb-30 p-30 box-shadow clearfix">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>LEAVE A REPLY</h5>
                        </div>

                        <!-- Reply Form -->
                        <div class="contact-form-area">
                          <form  method="post" enctype="multipart/form-data">
                              <div class="row">
                                  <div class="col-12 col-lg-6">
                                      <input type="text" class="form-control" name="cust_name" id="cust_name" placeholder="Your Name*" required>
                                  </div>
                                  <div class="col-12 col-lg-6">
                                      <input type="email" class="form-control" name="cust_email" id="cust_email" placeholder="Your Email*" required>
                                  </div>
                                  <div class="col-12">
                                      <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message*" required></textarea>
                                  </div>
                                  <div class="col-12">
                                      <button class="btn mag-btn mt-30" type="submit">Submit Comment</button>
                                  </div>
                              </div>
                          </form>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                    <div class="sidebar-area bg-white mb-30 box-shadow">
                      <?php require_once("right_sidebar.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Post Details Area End ##### -->

    <?php require_once("footer.php"); ?>
