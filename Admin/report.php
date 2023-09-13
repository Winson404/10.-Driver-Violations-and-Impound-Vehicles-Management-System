<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Violation report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Violation report</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
             
              <div class="card-body">
                <div class="row">
                  
                  <div class="col-5">
                      <div class="form-group">
                        <form method="POST" action="">
                          <label>Location:</label>
                          <select class="select2" data-placeholder="Shelf location" id="location" style="width: 100%;" onchange="myFunction()">
                          <!-- <select class="select2" multiple="multiple" data-placeholder="Shelf location" style="width: 100%;" name="shelf-location"> -->
                              <option selected>Select location</option>
                              <?php  
                                  $fetch = mysqli_query($conn, "SELECT * FROM violators");
                                  while($row = mysqli_fetch_array($fetch)) {
                              ?>
                              <option value="<?php echo $row['province']; $row['municipality']; $row['barangay'] ?>"><?php echo ' '.$row['province'].' '.$row['municipality'].' '.$row['barangay'].' '; ?></option>
                              <?php } ?>
                          </select>
                          <!-- PASSING VALUE ON CHANGE -->
                          <input type="hidden" class="form-control form-control-lg" id="as_is_location" name="location">
                          <!-- END PASSING VALUE ON CHANGE -->
                      </div>
                  </div>
               
                  <div class="col-3">
                      <div class="form-group">
                          <label>Date:</label>
                          <select class="select2" style="width: 100%;" id="theDate" onchange="myFunctionthree()">
                              <option selected>Select date</option>
                              <?php  
                                  $fetch = mysqli_query($conn, "SELECT * FROM violators");
                                  while($row = mysqli_fetch_array($fetch)) {
                              ?>
                              <option value="<?php echo $row['date_violated']; ?>" ><?php echo date("F d, Y", strtotime($row['date_violated'])); ?></option>
                              <?php } ?>
                          </select>
                          <!-- PASSING VALUE ON CHANGE -->
                          <input type="hidden" class="form-control" id="as_is_date" name="date" >
                          <!-- END PASSING VALUE ON CHANGE -->
                      </div>
                  </div>
                  <div class="col-1">
                    <div class="form-group">
                      <label class="text-white">Search:</label>
                      <button type="submit" class="btn btn-default" name="search">Search</button>
                      </form>
                    </div>
                  </div>
                  
              </div>
              <hr>

              <?php 
                if(isset($_POST['search'])) {
                  $location = $_POST['location'];
                  $date    = $_POST['date'];
              ?>
                 <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Name of Violators</th>
                        <th>Confiscated ID</th>
                        <th>Violation and Penalty</th>
                        <th>Violation date</th>
                        <th>Traffic Offense Ticket</th>
                      </tr>
                      </thead>
                      <tbody id="users_data">
                          <?php 
                            $fetch = mysqli_query($conn, "SELECT * FROM violators WHERE (province LIKE '%".$location."%' || municipality LIKE '%".$location."%' || barangay LIKE '%".$location."%') && date_violated LIKE '%".$date."%'");
                            if(mysqli_num_rows($fetch) > 0) {
                            while ($row = mysqli_fetch_array($fetch)) {
                              // $price = $row['penalty'];
                              // $price_text = (string)$price; // convert into a string
                              // $price_text = strrev($price_text); // reverse string
                              // $arr = str_split($price_text, "3"); // break string in 3 character sets

                              // $price_new_text = implode(",", $arr);  // implode array with comma
                              // $price_new_text = strrev($price_new_text); // r
                          ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['confiscated_Id']; ?></td>
                            <td><?php echo $row['violators_violation']; ?></td>
                            <td><?php echo $row['date_violated']; ?></td>
                            <td><?php echo $row['traffic_offense_ticket']; ?></td>
                        </tr>
                        <?php } } else { ?>
                        <tr>
                          <td colspan="100%" class="text-center">No record found</td>
                        </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>Name of Violators</th>
                              <th>Confiscated ID</th>
                              <th>Violation and Penalty</th>
                              <th>Violation date</th>
                              <th>Traffic Offense Ticket</th>
                          </tr>
                      </tfoot>
                    </table>
                  <?php } else { ?>
                      <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Name of Violators</th>
                        <th>Confiscated ID</th>
                        <th>Violation and Penalty</th>
                        <th>Violation date</th>
                        <th>Traffic Offense Ticket</th>
                      </tr>
                      </thead>
                      <tbody id="users_data">
                        <tr>
                          <td colspan="100%" class="text-center">Select location and date first</td>
                        </tr>
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>Name of Violators</th>
                              <th>Confiscated ID</th>
                              <th>Violation and Penalty</th>
                              <th>Violation date</th>
                              <th>Traffic Offense Ticket</th>
                          </tr>
                      </tfoot>
                    </table>
                  <?php } ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


<?php include 'footer.php';  ?>


<script>
    function myFunction() {
        var x = document.getElementById("location").value;
        document.getElementById("as_is_location").value = x;
    }

    function myFunctionthree() {
        var x = document.getElementById("theDate").value;
        document.getElementById("as_is_date").value = x;
    }
</script>