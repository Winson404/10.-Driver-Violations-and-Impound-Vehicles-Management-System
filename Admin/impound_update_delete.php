
<!-- ****************************************************UPDATE*********************************************************************** -->
<div class="modal fade" id="update<?php echo $row['impound_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header alert-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-bus"></i> Update Impound</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" value="<?php echo $row['impound_Id']; ?>" name="impound_Id">
          <div class="row">

            <div class="col-lg-12 mb-3">
                <b>Violator's name</b>
                <select class="custom-select" name="violators_name" required>
                  <option selected disabled>Select violator</option>
                <?php
                    $fetch = mysqli_query($conn, "SELECT * FROM violators ORDER BY name ASC");
                    while ($r = mysqli_fetch_array($fetch)) {
                ?>
                    <option value="<?php echo $r['violator_Id']; ?>" <?php if($row['impound_violator_Id'] == $r['violator_Id']) { echo 'selected'; } ?>><?php echo $r['name']; ?></option>
                <?php } ?>
                 </select>
            </div>
            <div class="col-lg-6 mb-3">
                <b>Traffic Offense Ticket</b>
                <input type="text" class="form-control"  placeholder="Traffic Offense Ticket" name="ticket" required value="<?php echo $row['ticket']; ?>">
            </div>
            <div class="col-lg-6 mb-3">
                <b>Chassis No</b>
                <input type="text" class="form-control"  placeholder="Chassis No" name="chassis" required value="<?php echo $row['chassis_no']; ?>">
            </div>
            <div class="col-lg-6 mb-3">
                <b>Engine No</b>
                <input type="text" class="form-control"  placeholder="Chassis No" name="engine" required value="<?php echo $row['engine_no']; ?>">
            </div>
            <div class="col-lg-6 mb-3">
                <b>Plate No</b>
                <input type="text" class="form-control"  placeholder="Chassis No" name="plate" required value="<?php echo $row['plate_no']; ?>">
            </div>
            <div class="col-lg-6 mb-3">
                <b>Color</b>
                <input type="text" class="form-control"  placeholder="Chassis No" name="color" required  value="<?php echo $row['color']; ?>">
            </div>
            <div class="col-lg-6 mb-3">
                <b>Penalty</b>
                <input type="number" class="form-control"  placeholder="Chassis No" name="penalty" required value="<?php echo $row['impound_penalty']; ?>">
            </div>
            <div class="col-lg-4 mb-3">
                <b>Date impounded</b>
                <input type="date" class="form-control"  placeholder="Date impounded" name="date_impounded" required value="<?php echo $row['date_impound']; ?>">
            </div>
            <div class="col-lg-4 mb-3">
                <b>Type of Vehicle</b>
                <select class="custom-select" name="vehicle" required>
                    <option selected disabled value="">Select vehicle</option>
                    <option value="Car"         <?php if($row['vehicle'] == 'Car') { echo 'selected'; } ?>>Car</option>
                    <option value="Jeep"        <?php if($row['vehicle'] == 'Jeep') { echo 'selected'; } ?>>Jeep</option>
                    <option value="Bus"         <?php if($row['vehicle'] == 'Bus') { echo 'selected'; } ?>>Bus</option>
                    <option value="Truck"       <?php if($row['vehicle'] == 'Truck') { echo 'selected'; } ?>>Truck</option>
                    <option value="Filcab"      <?php if($row['vehicle'] == 'Filcab') { echo 'selected'; } ?>>Filcab</option>
                    <option value="Tricycle"    <?php if($row['vehicle'] == 'Tricycle') { echo 'selected'; } ?>>Tricycle</option>
                    <option value="Motorcycle"  <?php if($row['vehicle'] == 'Motorcycle') { echo 'selected'; } ?>>Motorcycle</option>
                    <option value="Van"         <?php if($row['vehicle'] == 'Van') { echo 'selected'; } ?>>Van</option>
                 </select>
            </div>
            <div class="col-lg-4 mb-3">
                <b>Ownership</b>
                <select class="custom-select" name="ownership" required>
                    <option selected disabled value="">Select ownership</option>
                    <option value="Private"    <?php if($row['ownership'] == 'Private')    { echo 'selected'; } ?>>Private</option>
                    <option value="Public"     <?php if($row['ownership'] == 'Public')     { echo 'selected'; } ?>>Public</option>
                    <option value="Government" <?php if($row['ownership'] == 'Government') { echo 'selected'; } ?>>Government</option>
                 </select>
            </div>
            <div class="col-lg-6 mb-3">
                <b>Accident</b>
                <select class="custom-select" name="accident" required>
                    <option selected disabled value="">Select accident</option>
                    <option value="Yes" <?php if($row['accident'] == 'Yes')    { echo 'selected'; } ?>>Yes</option>
                    <option value="No"  <?php if($row['accident'] == 'No')    { echo 'selected'; } ?>>No</option>
                 </select>
            </div>
            <div class="col-lg-6 mb-3">
                <b>Official Receipt</b>
                <input type="text" class="form-control"  placeholder="Official Receipt" name="official_receipt" required value="<?php echo $row['official_receipt']; ?>">
            </div>
          </div>
           
      </div>

      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn btn-primary" name="update_impound"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script>
    function lettersOnly(input) {
      var regex = /[^a-z ]/gi;
      input.value = input.value.replace(regex, "");
    }
</script>
<!-- ****************************************************END UPDATE*********************************************************************** -->





<!-- ****************************************************DELETE*********************************************************************** -->
<!-- Modal -->
<div class="modal fade" id="delete<?php echo $row['impound_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header alert-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-large"></i> Archive impound</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['impound_Id']; ?>" name="impound_Id">
          <h5 class="text-center">Archive impound record?</h5>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn btn-primary" name="delete_impound"><i class="fa-solid fa-floppy-disk"></i> Confirm</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- ****************************************************END DELETE*********************************************************************** -->






<!-- ****************************************************RELEASE*********************************************************************** -->
<!-- Modal -->
<div class="modal fade" id="released<?php echo $row['impound_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header alert-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-large"></i> Mark as released</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['impound_Id']; ?>" name="impound_Id">
          <h5 class="text-center">Mark as released?</h5>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn btn-primary" name="release_impound"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- ****************************************************END RELEASE*********************************************************************** -->






<!-- ****************************************************VIEW*********************************************************************** -->
<div class="modal fade" id="view<?php echo $row['impound_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header alert-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-bus"></i> View Impound</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" value="<?php echo $row['impound_Id']; ?>" name="impound_Id">
          <div class="row">
            <div class="col-lg-12 d-flex justify-content-center mb-3">
              <?php if($row['image'] != ""): ?>
                <img src="../images-violators/<?php echo $row['image']; ?>" alt="" height="100" width="100" class="img-circle">
              <?php endif; ?>
            </div>
            <div class="col-lg-8 mb-3">
                <b>Violator's name</b>
                <select class="custom-select" name="violators_name" required disabled>
                  <option selected disabled>Select violator</option>
                <?php
                    $fetch = mysqli_query($conn, "SELECT * FROM violators ORDER BY name ASC");
                    while ($r = mysqli_fetch_array($fetch)) {
                ?>
                    <option value="<?php echo $r['violator_Id']; ?>" <?php if($row['impound_violator_Id'] == $r['violator_Id']) { echo 'selected'; } ?>><?php echo $r['name']; ?></option>
                <?php } ?>
                 </select>
            </div>
            <div class="col-lg-4 mb-3">
                <b>Gender</b>
                <input type="text" class="form-control"  placeholder="Traffic Offense Ticket" name="ticket" required value="<?php echo $row['gender']; ?>" readonly>
            </div>
            <div class="col-lg-12 mb-3">
                <b>Address</b>
                <input type="text" class="form-control"  placeholder="Traffic Offense Ticket" name="ticket" required value="<?php echo ' '.$row['province'].' '.$row['municipality'].' '.$row['barangay'].' ' ?>" readonly>
            </div>
            <div class="col-lg-6 mb-3">
                <b>Confiscated ID</b>
                <input type="text" class="form-control"  placeholder="Traffic Offense Ticket" name="ticket" required value="<?php echo ' '.$row['province'].' '.$row['municipality'].' '.$row['confiscated_Id'].' ' ?>" readonly>
            </div>
            <div class="col-lg-6 mb-3">
                <b>Traffic Offense Ticket</b>
                <input type="text" class="form-control"  placeholder="Traffic Offense Ticket" name="ticket" required value="<?php echo $row['ticket']; ?>" readonly>
            </div>
            <div class="col-lg-6 mb-3">
                <b>Chassis No</b>
                <input type="text" class="form-control"  placeholder="Chassis No" name="chassis" required value="<?php echo $row['chassis_no']; ?>" readonly>
            </div>
            <div class="col-lg-6 mb-3">
                <b>Engine No</b>
                <input type="text" class="form-control"  placeholder="Chassis No" name="engine" required value="<?php echo $row['engine_no']; ?>" readonly>
            </div>
            <div class="col-lg-6 mb-3">
                <b>Plate No</b>
                <input type="text" class="form-control"  placeholder="Chassis No" name="plate" required value="<?php echo $row['plate_no']; ?>" readonly>
            </div>
            <div class="col-lg-6 mb-3">
                <b>Color</b>
                <input type="text" class="form-control"  placeholder="Chassis No" name="color" required  value="<?php echo $row['color']; ?>" readonly>
            </div>
            <div class="col-lg-6 mb-3">
                <b>Penalty</b>
                <input type="number" class="form-control"  placeholder="Chassis No" name="penalty" required value="<?php echo $row['impound_penalty']; ?>" readonly>
            </div>
            <div class="col-lg-6 mb-3">
                <b>Date impounded</b>
                <input type="date" class="form-control"  placeholder="Date impounded" name="date_impounded" required value="<?php echo $row['date_impound']; ?>" readonly>
            </div>
            <div class="col-lg-4 mb-3">
                <b>Type of Vehicle</b>
                <select class="custom-select" name="vehicle" required disabled>
                    <option selected disabled value="">Select vehicle</option>
                    <option value="Car"         <?php if($row['vehicle'] == 'Car') { echo 'selected'; } ?>>Car</option>
                    <option value="Jeep"        <?php if($row['vehicle'] == 'Jeep') { echo 'selected'; } ?>>Jeep</option>
                    <option value="Bus"         <?php if($row['vehicle'] == 'Bus') { echo 'selected'; } ?>>Bus</option>
                    <option value="Truck"       <?php if($row['vehicle'] == 'Truck') { echo 'selected'; } ?>>Truck</option>
                    <option value="Filcab"      <?php if($row['vehicle'] == 'Filcab') { echo 'selected'; } ?>>Filcab</option>
                    <option value="Tricycle"    <?php if($row['vehicle'] == 'Tricycle') { echo 'selected'; } ?>>Tricycle</option>
                    <option value="Motorcycle"  <?php if($row['vehicle'] == 'Motorcycle') { echo 'selected'; } ?>>Motorcycle</option>
                    <option value="Van"         <?php if($row['vehicle'] == 'Van') { echo 'selected'; } ?>>Van</option>
                 </select>
            </div>
            <div class="col-lg-4 mb-3">
                <b>Ownership</b>
                <select class="custom-select" name="ownership" required disabled>
                    <option selected disabled value="">Select ownership</option>
                    <option value="Private"    <?php if($row['ownership'] == 'Private')    { echo 'selected'; } ?>>Private</option>
                    <option value="Public"     <?php if($row['ownership'] == 'Public')     { echo 'selected'; } ?>>Public</option>
                    <option value="Government" <?php if($row['ownership'] == 'Government') { echo 'selected'; } ?>>Government</option>
                 </select>
            </div>
            <div class="col-lg-4 mb-3">
                <b>Accident</b>
                <select class="custom-select" name="accident" required disabled>
                    <option selected disabled value="">Select accident</option>
                    <option value="Yes" <?php if($row['accident'] == 'Yes')    { echo 'selected'; } ?>>Yes</option>
                    <option value="No"  <?php if($row['accident'] == 'No')    { echo 'selected'; } ?>>No</option>
                 </select>
            </div>
            <div class="col-lg-6 mb-3">
                <b>Official Receipt</b>
                <input type="text" class="form-control"  placeholder="Official Receipt" name="official_receipt" required value="<?php echo $row['official_receipt']; ?>" readonly>
            </div>
          </div>
           
      </div>

      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#update<?php echo $row['impound_Id']; ?>">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>



<script>
    function lettersOnly(input) {
      var regex = /[^a-z ]/gi;
      input.value = input.value.replace(regex, "");
    }
</script>
<!-- ****************************************************END VIEW*********************************************************************** -->