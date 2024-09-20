
    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget">
                        <!-- Logo -->
                        <a href="index.php" class="foo-logo"><span style="color:#fff; font-size:25px;"><b>AWH</b></span><i style="color:red; font-size:13px;">Afghan Women Handicraf</i></a>
                        <p style="font-size:13px; margin-top:-15px;">
                          Afghan Women Handicraf by having full ability, adequate capacity for executing operational, financial management and implementation quality, started its efforts for construction and rehabilitation of Afghanistan.
                        </p>
                        <div class="footer-social-info">
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget">
                        <h6 class="widget-title">Categories</h6>
                        <nav class="footer-widget-nav">
                            <ul>
                                <li><a href="projects.php"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Design</a></li>
                                <li><a href="projects.php"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Engineering</a></li>
                                <li><a href="projects.php"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Construction</a></li>
                                <li><a href="projects.php"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Management</a></li>
                                <li><a href="projects.php"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Finance</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget">
                        <h6 class="widget-title">Company News</h6>
                        <!-- Single Blog Post -->
                        <?php
                          $query_news_footer = mysqli_query($conn,"SELECT * FROM files INNER JOIN news ON files.news_id=news.news_id ORDER BY news.news_id DESC LIMIT 2");
                          $show_news_footer = mysqli_fetch_assoc($query_news_footer);
                          do{
                        ?>
                        <div class="single-blog-post style-2 d-flex">
                            <div class="post-thumbnail">
                                <img src="admin/<?php echo $show_news_footer["file_path"]; ?>" style="width:100%; height:70px;" alt="<?php echo $show_news_footer["news_title"]; ?>">
                            </div>
                            <div class="post-content">
                                <a href="news_details.php?news_id=<?php echo $show_news_footer["news_id"]; ?>" class="post-title"><?php echo $show_news_footer["news_title"]; ?></a>
                                <?php
                                  $news_footer_id = $show_news_footer["news_id"];
                                  $count_comments_news_footer = mysqli_query($conn,"SELECT COUNT(comments_id) FROM comments WHERE news_id=$news_footer_id");
                                   while($comments_news_footer = mysqli_fetch_array($count_comments_news_footer)){$total_comments_news_footer = $comments_news_footer[0];}

                                  $view_news_footer = $show_news_footer["news_id"];
                                  $count_view_news_footer = mysqli_query($conn,"SELECT news_view FROM news WHERE news_id=$view_news_footer");
                                  $show_view_news_footer = mysqli_fetch_assoc($count_view_news_footer);
                                 ?>
                                <div class="post-meta d-flex justify-content-between">
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $show_view_news_footer["news_view"]; ?></a>
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?php echo $total_comments_news_footer; ?></a>
                                </div>
                            </div>
                        </div>
                        <?php } while($show_news_footer = mysqli_fetch_assoc($query_news_footer)); ?>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget">
                        <h6 class="widget-title">Product List</h6>
                        <ul class="footer-tags">
                          <?php
                            $query_contracts_footer = mysqli_query($conn, "SELECT * FROM projects ORDER BY pro_id DESC LIMIT 5");
                            $show_contracts_footer = mysqli_fetch_assoc($query_contracts_footer);
                            do{
                           ?>
                            <li><a href="projects.php" style="font-size:11px;"><?php echo substr($show_contracts_footer["pro_title"],0,31) ?></a></li>
                           <?php }
                            while($show_contracts_footer = mysqli_fetch_assoc($query_contracts_footer));
                           ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copywrite Area -->
        <div class="copywrite-area">
            <div class="container">
                <div class="row">
                    <!-- Copywrite Text -->
                    <div class="col-12 col-sm-6">
                        <p class="copywrite-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                          Copyright &copy;
                          <script>document.write(new Date().getFullYear());</script> Afghan Women Handi Craft
                        </p>
                    </div>
                    <div class="col-12 col-sm-6">
                        <nav class="footer-nav">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="news.php">News</a></li>
                                <li><a href="projects.php">Products</a></li>
                                <li><a href="contact.php">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->
    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>
