
<!-- ****************************************************CREATE*********************************************************************** -->
<div class="modal fade" id="add_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header alert-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-briefcase"></i> Add violation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">

            <div class="form-group mb-3">
                <b>Violation</b>
                <input type="text" class="form-control"  placeholder="Violation Name" name="violationname" required>
            </div>
            <div class="form-group mb-3">
                <b>Penalty</b>
                <input type="number" class="form-control"  placeholder="Penalty" name="penalty" required>
            </div>
         
      </div>

      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn btn-primary" name="violation"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- ****************************************************END CREATE*********************************************************************** -->







