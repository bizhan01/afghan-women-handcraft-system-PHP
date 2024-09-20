<?php
  require("../session.php");
  if(isset($_GET["flagContact"])){
    $flagContact = 1;
    mysqli_query($conn, "UPDATE contacts SET cont_flag=$flagContact");
  }
  $select_conts = mysqli_query($conn, "SELECT * FROM contacts");
  $show_conts = mysqli_fetch_assoc($select_conts);

  $select_users = mysqli_query($conn, "SELECT * FROM users");
  $show_users = mysqli_fetch_assoc($select_users);

  require("header.php");
?>
<!-- Content -->
      <div class="content-area py-1">
        <div class="container-fluid">
          <h4>List Contacts</h4>
          <ol class="breadcrumb no-bg mb-1">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Contacts</a></li>
          </ol>
          <div class="card card-block">
            <?php if(isset($_GET["delete_contact"])){ ?>
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
											<th style="text-align:center;">Delete</th>
										</tr>
									</thead>
									<tbody>
                    <?php $i=1; do { ?>
										<tr>
											<th scope="row" style="text-align:center;"><?php echo $i++; ?></th>
                      <td style="text-align:center;"><?php echo $show_conts["contact_name"]; ?></td>
                      <td style="text-align:center;"><?php echo $show_conts["contact_email"]; ?></td>
                      <td style="text-align:center;"><?php echo $show_conts["contact_message"]; ?></td>
                      <td style="text-align:center; font-size:18px;">
                          <a href="control/delete_contact.php?contact_id=<?php echo $show_conts["contact_id"]; ?>" class="delete" style="color:red;">
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
