<?php
  require("../session.php");
  if(isset($_GET["flagEmail"])){
    $flagEmail = $_GET["flagEmail"];
    mysqli_query($conn, "UPDATE subscribers SET flag=$flagEmail");
  }
  $select_conts = mysqli_query($conn, "SELECT * FROM subscribers ORDER BY subs_id DESC");
  $show_conts = mysqli_fetch_assoc($select_conts);


  require("header.php");
?>
<!-- Content -->
      <div class="content-area py-1">
        <div class="container-fluid">
          <h4>List subscriber Email</h4>
          <ol class="breadcrumb no-bg mb-1">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="#">subscriber</a></li>
          </ol>
          <div class="card card-block">
              <table class="table table-hover table-bordered dataTable" id="table-1">
									<thead>
										<tr>
											<th style="text-align:center;">ID</th>
											<th style="text-align:center;">Email address</th>
                      <th style="text-align:center;">Subscribe Date</th>
											<th style="text-align:center;">Delete</th>
										</tr>
									</thead>
									<tbody>
                    <?php $i=1; do { ?>
										<tr>
											<th scope="row" style="text-align:center;"><?php echo $i++; ?></th>
                      <td style="text-align:center;"><?php echo $show_conts["subs_email"]; ?></td>
                      <td style="text-align:center;"><?php echo $show_conts["subs_date"]; ?></td>
                      <td style="text-align:center; font-size:18px;">
                          <a href="control/delete_subscribe.php?subs_id=<?php echo $show_conts["subs_id"]; ?>" class="delete" style="color:red;">
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
