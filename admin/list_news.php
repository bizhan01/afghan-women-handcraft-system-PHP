<?php
  require("../session.php");
  require("header.php");
  $user = $_SESSION["user_id"];
  if($showUserType["user_type"]=='admin'){
    $select_news = mysqli_query($conn, "SELECT * FROM files RIGHT JOIN news ON files.news_id=news.news_id GROUP BY files.news_id ORDER BY news.news_id DESC");
  }else{
    $select_news = mysqli_query($conn, "SELECT * FROM files RIGHT JOIN news ON files.news_id=news.news_id WHERE author=$user GROUP BY files.news_id ORDER BY news.news_id DESC");
  }
  $show_news = mysqli_fetch_assoc($select_news);
?>
<!-- Content -->
      <div class="content-area py-1">
        <div class="container-fluid">
          <h4>List News</h4>
          <ol class="breadcrumb no-bg mb-1">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">News</a></li>
            <a href="news.php" class="btn btn-success" style="float:right;margin-top:-13px;">Post News <i class="fa fa-plus"></i></a>
          </ol>
          <div class="card card-block">
            <?php if(isset($_GET["publish_news"])){ ?>
              <div class="alert alert-success alert-dismissable">
                <button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
                <h5 style="text-align:center;">Dear user you successfuly added<b> new news</b> !!!</h5>
              </div>
            <?php } ?>
            <?php if(isset($_GET["edit_news"])){ ?>
              <div class="alert alert-success alert-dismissable">
                <button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
                <h5 style="text-align:center;">Dear user you successfuly update<b> news</b> !!!</h5>
              </div>
            <?php } ?>
            <?php if(isset($_GET["delete_news"])){ ?>
              <div class="alert alert-danger alert-dismissable">
                <button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
                <h5 style="text-align:center;">Delete <b> news</b> !!!</h5>
              </div>
            <?php } ?>
            <?php do{ ?>
            <div class="row mb-0 mb-md-1">
							<div class="col-md-12">
								<div class="box bg-white post post-2">
									<div class="p-img img-cover" style="background-image: url(<?php echo $show_news["file_path"]; ?>);"></div>
									<div class="p-content">
										<h5 class="text-truncate"><a class="text-black" href="#"><?php echo $show_news["news_title"]; ?></a></h5>
										<div class="p-text">
                      <?php
                        $num_words = 61;
                        $words = array();
                        $words = explode(" ", $show_news["news_content"], $num_words);
                        $show_string = "";
                        if(count($words) == 61){
                          $words[60] = ".";
                        }
                        $show_string = implode(" ", $words);
                       ?>
                      <p class="mb-0-5">
                        <?php echo $show_string; ?>
                      <a class="text-primary" href="#"><span class="underline">read more</span></a>
                    </p>
                    </div>
                    <div class="text-center" style="font-size:15px; padding-top:12px;">
                      <span class="small text-uppercase text-muted"><i class="fa fa-calendar"></i> <b><?php echo $show_news["news_date"]; ?></b></span>&nbsp&nbsp
                    </div>
										<div class="p-info">
  										<a class="text-danger delete" href="control/delete_news.php?news_id=<?php echo $show_news["news_id"]; ?>"><i class="fa fa-times"></i><br></a>
                      <a class="text-success" href="edit_news.php?news_id=<?php echo $show_news["news_id"]; ?>"><i class="fa fa-edit"></i><br></a>
                    </div>
									</div>
								</div>
							</div>
						</div>
            <?php }while($show_news = mysqli_fetch_assoc($select_news)) ?>
          </div>
      </div>
    </div>
<?php require("footer.php"); ?>
