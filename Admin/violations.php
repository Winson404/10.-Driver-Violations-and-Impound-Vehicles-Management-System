<title>Violations | Report Mgmt. System</title>


<?php 
  include 'navbar.php'; 
  include 'sweetalert_messages.php';
?>

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mb-5 ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Violations</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Violations</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="d-flex">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_user"><i class="bi bi-plus-circle"></i> Add</button>

                  <?php //if(isset($_SESSION['success'])) { ?> 
                      <!-- <h3 class="alert card-title position-absolute py-2 alert-success rounded p-1" role="alert" style="right: 20px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"><?php //echo $_SESSION['success']; ?></h3> -->
                  <?php //unset($_SESSION['success']); } ?>


                  <?php //if(isset($_SESSION['invalid']) && isset($_SESSION['error'])) { ?>
                      <!-- <h3 class="alert card-title position-absolute py-2 alert-danger rounded p-1" role="alert" style="right: 20px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"><?php// echo $_SESSION['invalid']; ?> <?php //echo $_SESSION['error']; ?></h3> -->
                  <?php //unset($_SESSION['invalid']);  //unset($_SESSION['error']);  } ?>


                  <?php // if(isset($_SESSION['exists'])) { ?>
                      <!-- <h3 class="alert card-title position-absolute py-2 alert-danger rounded p-1" role="alert" style="right: 20px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"><?php //echo $_SESSION['exists']; ?></h3> -->
                  <?php //unset($_SESSION['exists']); } ?>
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Violation</th>
                    <th>Penalty</th>
                    <th>Tools</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                    <tr>
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM violations");
                        if(mysqli_num_rows($sql) > 0) {
                          while ($row = mysqli_fetch_array($sql)) {

                          // TO ADD COMMA FOR PRICE
                          $price = $row['penalty'];
                          $price_text = (string)$price; // convert into a string
                          $price_text = strrev($price_text); // reverse string
                          $arr = str_split($price_text, "3"); // break string in 3 character sets

                          $price_new_text = implode(",", $arr);  // implode array with comma
                          $price_new_text = strrev($price_new_text); // reverse string back
                          //echo $price_new_text; // will output 1,234
                      ?>
                        <td><?php echo $row['violation']; ?></td>
                        <td><b>₱ <?php echo $price_new_text; ?>.00</b></td>
                        <td>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#update<?php echo $row['violation_Id']; ?>"><i class="fa-solid fa-pen"></i> Update</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $row['violation_Id']; ?>"><i class="fa-solid fa-trash"></i> Delete</button>
                        </td> 
                    </tr>

                    <?php include 'violations_update_delete.php'; } ?>
                    <?php } else { ?>

                      <tr class="text-center">
                        <td colspan="100%">No record found</td>
                      </tr> 

                    <?php } ?>

                  </tbody>
                  <!-- <tfoot>
                      <tr>
                        <th>Violation</th>
                        <th>Penalty</th>
                        <th>Tools</th>
                      </tr>
                  </tfoot> -->
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <br><br><br><br>

 <?php include 'violations_add.php';  ?>
 <?php include 'footer.php'; ?>



