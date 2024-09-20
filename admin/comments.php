<?php
  require("../session.php");
  if(isset($_GET["flag"])){
    $flag = $_GET["flag"];
    $comment_id = $_GET["comment_id"];
    mysqli_query($conn, "UPDATE comments SET flag=$flag WHERE comment_id=$comment_id");
  }
  if(isset($_GET["viewAll"])){
    mysqli_query($conn, "UPDATE comments SET flag=1");
  }
  $select_conts = mysqli_query($conn, "SELECT * FROM comments INNER JOIN projects ON comments.pro_id=projects.pro_id ORDER BY comments_id DESC");
  $show_conts = mysqli_fetch_assoc($select_conts);


  require("header.php");
?>
<!-- Content -->
      <div class="content-area py-1">
        <div class="container-fluid">
          <h4>List comments</h4>
          <ol class="breadcrumb no-bg mb-1">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="#">comments</a></li>
          </ol>
          <div class="card card-block">
            <?php if(isset($_GET["delete_comment"])){ ?>
              <div class="alert alert-success alert-dismissable">
                <button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
                <h5 style="text-align:center;">Delete  <b>successfuly</b> !!!</h5>
              </div>
            <?php } ?>
              <table class="table table-hover table-bordered dataTable" id="table-1">
									<thead>
										<tr>
											<th style="text-align:center;">ID</th>
											<th style="text-align:center;">Name</th>
											<th style="text-align:center;">Email address</th>
                      <th style="text-align:center;">Message</th>
                      <th style="text-align:center;">Date</th>
                      <th style="text-align:center;">Project Name</th>
											<th style="text-align:center;">Delete</th>
										</tr>
									</thead>
									<tbody>
                    <?php $i=1; do { ?>
										<tr>
											<th scope="row" style="text-align:center;"><?php echo $i++; ?></th>
                      <td style="text-align:center;"><?php echo $show_conts["cust_name"]; ?></td>
                      <td style="text-align:center;"><?php echo $show_conts["cust_email"]; ?></td>
                      <td style="text-align:center;"><?php echo substr($show_conts["message"],0,120) ?></td>
                      <td style="text-align:center;"><?php echo $show_conts["comment_date"]; ?></td>
                      <td style="text-align:center;"><?php echo $show_conts["pro_title"]; ?></td>
                      <td style="text-align:center; font-size:18px;">
                          <a href="control/delete_comments.php?comment_id=<?php echo $show_conts["comment_id"]; ?>" class="delete" style="color:red;">
                            <i class="fa fa-remove"></i></a>&nbsp &nbsp
                      </td>
										</tr>
                    <?php }while($show_conts = mysqli_fetch_assoc($select_conts)) ?>
                  </tbody>
               </table>
          </div>
      </div>
    </div>
<?php require("footer.php"); ?>
