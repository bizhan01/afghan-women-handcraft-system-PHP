
<?php
  require_once("db.php");
  $id = $_GET["project_id"];
  if(isset($_GET["flag"])){
    $flag = $_GET["flag"];
    $comments_id = $_GET["comments_id"];
    mysqli_query($conn, "UPDATE comments SET flag=$flag WHERE comments_id=$comments_id");
  }
  $query_contracts = mysqli_query($conn, "SELECT * FROM projects INNER JOIN users ON projects.user_id=users.user_id WHERE projects.publish=1 && projects.pro_id=$id");
  $show_contracts = mysqli_fetch_assoc($query_contracts);
 // add comment
 if(isset($_POST["cust_name"])){
   $name = $_POST["cust_name"];
   $email = $_POST["cust_email"];
   $message = $_POST["message"];
   $result = mysqli_query($conn, "INSERT INTO comments VALUES(NULL,'$name','$email','$message',NULL,NULL,$id)");
    if($result){
      header("location:project_details.php?project_id=$id && successfuly comment added");
    }
  }
  $title = $show_contracts["pro_title"];
  $photo_title = $show_contracts["pro_file"];
  require_once("header.php");
?>

    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(admin/img/about/40.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Product Details</h2>
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
                            <li class="breadcrumb-item"><a href="#">Product</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Single Post</li>
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
          <?php
             $count_comment = mysqli_query($conn,"SELECT COUNT(comments_id) FROM comments WHERE pro_id=$id");
             while($comment = mysqli_fetch_array($count_comment)){$total_comment = $comment[0];}
           ?>
            <div class="row">
                <div class="col-12">
                    <div class="single-video-area bg-white mb-30 box-shadow">
                      <img src="admin/<?php echo $show_contracts["pro_file"]; ?>" style="width:100%; height:40%;" alt="">
                        <!-- Video Meta Data -->
                        <div class="video-meta-data d-flex align-items-center justify-content-between">
                            <div class="like-dislike d-flex align-items-center">
                              <?php if($total_comment == 1) {?>
                                <p> <?php echo $total_comment." "; ?> Comment</p>
                              <?php }else{?>
                                <p> <?php echo $total_comment." "; ?> Comments</p>
                              <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- Post Details Content Area -->
                <div class="col-12 col-xl-8">
                    <div class="post-details-content bg-white mb-30 p-30 box-shadow">
                        <div class="blog-content">
                            <div class="post-meta">
                                <a href="#"><?php echo $show_contracts["pro_date"]; ?></a>
                                <a href="#">Product</a>
                            </div>
                            <h4 class="post-title"><?php echo $show_contracts["pro_title"]; ?></h4>
                            <p class="post-title">Address: <?php echo  $show_contracts["pro_location"]; ?></p>
                            <p class="post-title">Phone Number: <?php echo  $show_contracts["phone"]; ?></p>
                            <p class="post-title">E-mail Address: <?php echo $show_contracts["email"]; ?></p>
                            <!-- Post Meta -->

                            <div class="post-meta-2">
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?php echo $total_comment; ?></a>
                            </div>
                            <p>
                              <?php echo $show_contracts["pro_desc"]; ?>
                            </p>

                            <!-- Like Dislike Share -->
                            <div class="like-dislike-share my-5">
                                <a href="mailto:<?php echo $show_contracts["user_email"]; ?>" class="email"><i class="fa fa-envelope-o" aria-hidden="true"></i> Send Email</a>
                            </div>

                        </div>
                    </div>
                    <!-- Related Post Area -->
                    <div class="related-post-area bg-white mb-30 px-30 pt-30 box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Related Project</h5>
                        </div>

                        <div class="row">
                            <!-- Single Blog Post -->
                            <?php
                              $query_feature = mysqli_query($conn, "SELECT * FROM projects ORDER BY pro_id DESC limit 3");
                              $show_feature = mysqli_fetch_assoc($query_feature);
                              do {
                            ?>
                              <div class="col-12 col-md-6 col-lg-4">
                                  <div class="single-blog-post style-4 mb-30">
                                      <div class="post-thumbnail">
                                          <img src="admin/<?php echo $show_feature["pro_file"]; ?>" style="width:100%; height:120px;" alt="">
                                      </div>
                                      <div class="post-content">
                                          <a href="project_details.php?project_id=<?php echo $show_feature["pro_id"]; ?>" class="post-title"><?php echo $show_feature["pro_title"]; ?></a>
                                          <p><?php echo substr($show_feature["pro_desc"],0,60) ?>
                                            <a href="project_details.php?project_id=<?php echo $show_feature["pro_id"]; ?>" style="color:#ed3974;"> Read More ...</a>
                                          </p>
                                      </div>
                                  </div>
                              </div>
                            <?php } while($show_feature = mysqli_fetch_assoc($query_feature)); ?>
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

                            $query_comments = mysqli_query($conn, "SELECT * FROM comments
                              INNER JOIN projects ON comments.pro_id=projects.pro_id
                              WHERE projects.pro_id=$id ORDER BY projects.pro_id DESC");
                            $show_comments = mysqli_fetch_assoc($query_comments);


                              if(isset($_POST["reply_name"])){
                                $reply_name = $_POST["reply_name"];
                                $reply_message = $_POST["reply_message"];
                                $commentID = $_POST["comments_id"];
                                $insert_reply = mysqli_query($conn, "INSERT INTO replys VALUES(NULL,'$reply_name','$reply_message',NULL, $commentID)");
                              }
                              do {
                            ?>
                            <li class="single_comment_area">
                                <!-- Comment Content -->
                                <div class="comment-content d-flex">
                                    <!-- Comment Author -->
                                    <?php if($show_comments["pro_id"] >= 1){ ?>
                                      <div class="comment-author ">
                                          <i class="fa fa-user" style="font-size:70px;"></i>
                                      </div>
                                    <?php } ?>
                                    <!-- Comment Meta -->
                                    <div class="comment-meta">
                                        <a href="#" class="comment-date"><?php echo $show_comments["comment_date"]; ?></a>
                                        <h6><?php echo $show_comments["cust_name"]; ?></h6>
                                        <p><?php echo $show_comments["message"]; ?></p>
                                        <div class="d-flex align-items-center">
                                            <div class="panel-group">
                                              <div class="panel panel-default">
                                                <div class="panel-heading">
                                                  <?php   if($show_comments["comments_id"] >= 1){ ?>
                                                    <h4 class="panel-title">
                                                      <a data-toggle="collapse" class="reply btn"  href="#reply<?php echo $show_comments["comments_id"]; ?>">Reply</a>
                                                    </h4>
                                                  <?php } ?>
                                                </div>
                                                <div id="reply<?php echo $show_comments["comments_id"]; ?>" class="panel-collapse collapse">
                                                  <div class="panel-body">
                                                    <form  method="post" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-12 col-lg-12">
                                                                <input type="text" class="form-control" name="reply_name" id="reply_name" placeholder="Your Name*" required>
                                                                <input type="hidden" class="form-control" value="<?php echo $show_comments["comments_id"]; ?>" name="comments_id">
                                                            </div>
                                                            <div class="col-12 col-lg-12">
                                                                <textarea name="reply_message" class="form-control" id="reply_message" placeholder="Message*" required></textarea>
                                                            </div>
                                                            <div class="col-12">
                                                                <button class="btn mag-btn mt-30" type="submit">Reply</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                  </div>
                                                  <div class="panel-footer">

                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                  if($show_comments["comments_id"] >= 1){
                                    $id= $show_comments["comments_id"];
                                     $query_replys = mysqli_query($conn, "SELECT * FROM comments
                                       LEFT JOIN replys ON comments.comments_id=replys.com_id
                                       WHERE comments.comments_id=$id ORDER BY replys.reply_id DESC");
                                     $show_replys = mysqli_fetch_assoc($query_replys);
                                     do{
                                   ?>
                                   <ol class="children">
                                       <li class="single_comment_area">
                                           <!-- Comment Content -->
                                           <div class="comment-content d-flex">
                                               <!-- Comment Author -->
                                               <?php if($show_replys["reply_id"] >= 1){ ?>
                                                 <div class="comment-author ">
                                                     <i class="fa fa-user" style="font-size:50px;"></i>
                                                 </div>
                                               <?php } ?>
                                               <!-- Comment Meta -->
                                               <div class="comment-meta">
                                                   <a href="#" class="comment-date"><?php echo $show_replys["reply_date"]; ?></a>
                                                   <h6><?php echo $show_replys["reply_name"]; ?></h6>
                                                   <p><?php echo $show_replys["reply_message"]; ?></p>
                                               </div>
                                           </div>
                                       </li>
                                   </ol>
                                   <?php }
                                    while($show_replys = mysqli_fetch_assoc($query_replys));
                                  }
                                 ?>
                            </li>
                            <?php } while($show_comments = mysqli_fetch_assoc($query_comments)); ?>
                        </ol>
                    </div>

                    <!-- Post A Comment Area -->
                    <div class="post-a-comment-area bg-white mb-30 p-30 box-shadow clearfix">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>LEAVE A COMMENT</h5>
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
    </section>
    <!-- ##### Post Details Area End ##### -->

    <?php require_once("footer.php"); ?>
