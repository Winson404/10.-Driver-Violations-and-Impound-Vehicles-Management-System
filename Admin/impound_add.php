
<!-- ****************************************************CREATE*********************************************************************** -->
<div class="modal fade" id="add_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header alert-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-bus"></i> Add Impound</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">

          <div class="row">

            <div class="col-lg-12 mb-3">
                <b>Violator's name</b>
                <select class="custom-select" name="violators_name" required>
                  <option selected disabled>Select violator</option>
                <?php
                    $fetch = mysqli_query($conn, "SELECT * FROM violators ORDER BY name ASC");
                    while ($r = mysqli_fetch_array($fetch)) {
                ?>
                    <option value="<?php echo $r['violator_Id']; ?>"><?php echo $r['name']; ?></option>
                <?php } ?>
                 </select>
            </div>
            <div class="col-lg-6 mb-3">
                <b>Traffic Offense Ticket</b>
                <input type="text" class="form-control"  placeholder="Traffic Offense Ticket" name="ticket" required>
            </div>
            <div class="col-lg-6 mb-3">
                <b>Chassis No</b>
                <input type="text" class="form-control"  placeholder="Chassis No" name="chassis" required>
            </div>
            <div class="col-lg-6 mb-3">
                <b>Engine No</b>
                <input type="text" class="form-control"  placeholder="Chassis No" name="engine" required>
            </div>
            <div class="col-lg-6 mb-3">
                <b>Plate No</b>
                <input type="text" class="form-control"  placeholder="Chassis No" name="plate" required>
            </div>
            <div class="col-lg-6 mb-3">
                <b>Color</b>
                <input type="text" class="form-control"  placeholder="Chassis No" name="color" required>
            </div>
            <div class="col-lg-6 mb-3">
                <b>Penalty</b>
                <input type="number" class="form-control"  placeholder="Chassis No" name="penalty" required>
            </div>
            <div class="col-lg-4 mb-3">
                <b>Date impounded</b>
                <input type="date" class="form-control"  placeholder="Date impounded" name="date_impounded" required>
            </div>
            <div class="col-lg-4 mb-3">
                <b>Type of Vehicle</b>
                <select class="custom-select" name="vehicle" required>
                    <option selected disabled value="">Select vehicle</option>
                    <option value="Car">Car</option>
                    <option value="Jeep">Jeep</option>
                    <option value="Bus">Bus</option>
                    <option value="Truck">Truck</option>
                    <option value="Filcab">Filcab</option>
                    <option value="Tricycle">Tricycle</option>
                    <option value="Motorcycle">Motorcycle</option>
                    <option value="Van">Van</option>
                 </select>
            </div>
            <div class="col-lg-4 mb-3">
                <b>Ownership</b>
                <select class="custom-select" name="ownership" required>
                    <option selected disabled value="">Select ownership</option>
                    <option value="Private">Private</option>
                    <option value="Public">Public</option>
                    <option value="Government">Government</option>
                 </select>
            </div>
            <div class="col-lg-6 mb-3">
                <b>Accident</b>
                <select class="custom-select" name="accident" required>
                    <option selected disabled value="">Select accident</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                 </select>
            </div>
            <div class="col-lg-6 mb-3">
                <b>Official Receipt</b>
                <input type="text" class="form-control"  placeholder="Official Receipt" name="official_receipt" required>
            </div>
          </div>
           
      </div>

      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn btn-primary" name="impound"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
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
<!-- ****************************************************END CREATE*********************************************************************** -->







